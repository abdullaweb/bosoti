<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    public function ProductList()
    {
        $title = 'Product List';

        $products = Product::latest()->get();

        return view('backend.product.list', compact('title', 'products'));
    } // End Method

    public function ProductAdd()
    {
        $title = 'Product Add';
        $categories = ProductCategory::all();

        return view('backend.product.add', compact('title', 'categories'));
    } // End Method

    public function ProductStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'category_id' => 'required|integer|exists:product_categories,id',
                'product_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'short_description' => 'required|string|max:250',
                'long_description' => 'required|string',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'category_id.required' => 'Product category is required',
                'category_id.integer' => 'Product category must be an integer',
                'product_category_id.exists' => 'Product category is not found',
                'product_image.required' => 'Product image is required',
                'product_image.image' => 'Product image must be an image',
                'product_image.mimes' => 'Product image must be a file of type: jpeg, png, jpg, gif, svg',
                'product_image.max' => 'Product image must be less than 1MB',
                'short_description.required' => 'Short description is required',
                'short_description.max' => 'Short description is too long',
                'long_description.required' => 'Long description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $product = new Product();
            $product->title = $request->title;
            $product->slug = strtolower(str_replace(' ', '-', $request->title));
            $product->date = now()->format('Y-m-d');
            $product->category_id = $request->category_id;
            $product->created_by = Auth::user()->id;
            $product->save();

            $productDetails = new ProductDetail();
            $productDetails->product_id = $product->id;
            $productDetails->short_description = $request->short_description;
            $productDetails->long_description = $request->long_description;
            $productDetails->meta_title = $request->meta_title;
            $productDetails->meta_description = $request->meta_description;
            $productDetails->meta_keyword = $request->meta_keyword;

            if ($request->file('product_image')) {
                $product_image = $request->file('product_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $product_image->getClientOriginalExtension();
                $image = $manager->read($product_image);
                $image->resize(370, 370);
                $image->toJpeg(80)->save(base_path('public/uploads/products/' . $name_gen));
                $productDetails->product_image = 'uploads/products/' . $name_gen;
            }

            $productDetails->save();

            DB::commit();

            return redirect()->route('admin.product.list')->with('success', 'product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProductEdit($id)
    {
        $title = 'Product Edit';
        $categories = ProductCategory::all();
        $product = Product::findOrFail($id);
        $productDetails = $product->productDetail ?? new ProductDetail();

        return view('backend.product.edit', compact('title', 'categories', 'product', 'productDetails'));
    } // End Method

    public function ProductUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'title' => 'required|max:100',
                'category_id' => 'required|integer|exists:product_categories,id',
                'product_image' => 'image|mimes:jpeg,png,jpg|max:1024',
                'short_description' => 'required|string|max:250',
                'long_description' => 'required|string',
                'status' => 'required',
            ],
            [
                'id.required' => 'Product ID is required',
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'category_id.required' => 'Product category is required',
                'category_id.integer' => 'Product category must be an integer',
                'category_id.exists' => 'Product category is not found',
                'product_image.image' => 'Product image must be an image',
                'product_image.mimes' => 'Product image must be a file of type: jpeg, png, jpg, gif, svg',
                'product_image.max' => 'Product image must be less than 1MB',
                'short_description.required' => 'Short description is required',
                'short_description.max' => 'Short description is too long',
                'long_description.required' => 'Long description is required',
                'status.required' => 'Status is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($request->id);
            if (!$product) {
                abort(404);
            }
            $product->title = $request->title;
            $product->slug = strtolower(str_replace(' ', '-', $request->title));
            $product->date = now()->format('Y-m-d');
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            $product->updated_by = Auth::user()->id;
            $product->save();

            $productDetails = ProductDetail::where('product_id', $product->id)->first();
            if (!$productDetails) {
                $productDetails = new ProductDetail();
                $productDetails->product_id = $product->id;
            }
            $productDetails->short_description = $request->short_description;
            $productDetails->long_description = $request->long_description;
            $productDetails->meta_title = $request->meta_title;
            $productDetails->meta_description = $request->meta_description;
            $productDetails->meta_keyword = $request->meta_keyword;

            if ($request->file('product_image')) {
                if (file_exists(base_path('public/' . $productDetails->product_image))) {
                    unlink(base_path('public/' . $productDetails->product_image));
                }
                $product_image = $request->file('product_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $product_image->getClientOriginalExtension();
                $image = $manager->read($product_image);
                $image->resize(370, 370);
                $image->toJpeg(80)->save(base_path('public/uploads/products/' . $name_gen));
                $productDetails->product_image = 'uploads/products/' . $name_gen;
            }

            $productDetails->save();

            DB::commit();

            return redirect()->route('admin.product.list')->with('success', 'product updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProductDelete($id)
    {
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);
            $productDetails = ProductDetail::where('product_id', $id)->first();

            if (!$product || !$productDetails) {
                abort(404);
            }

            $imagePath = public_path($productDetails->product_image);
            if (is_file($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $product->delete();
            $productDetails->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting Product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
