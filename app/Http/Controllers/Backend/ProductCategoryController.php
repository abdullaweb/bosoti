<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductCategoryController extends Controller
{
    public function ProductCategoryList()
    {
        $title = 'Product Category List';

        $product_categories = ProductCategory::latest()->get();

        return view('backend.product.product_category.list', compact('title', 'product_categories'));
    } // End Method

    public function ProductCategoryAdd()
    {
        $title = 'Product Category Add';

        return view('backend.product.product_category.add', compact('title'));
    } // End Method

    public function ProductCategoryStore(Request $request)
    {
    //    dd( $request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100',
                'cat_image' => 'required',
                'short_description' => 'required|string|max:250',
            ],
            [
                'name.required' => 'Name is required',
                'name.max' => 'Name is too long',
                'cat_image' => 'Category Image is required',
                'short_description.required' => 'Short description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $data = new ProductCategory();
            $data->name = $request->name;
            $data->short_description = $request->short_description;

            if ($request->file('cat_image')) {
                $cat_image = $request->file('cat_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $cat_image->getClientOriginalExtension();
                $image = $manager->read($cat_image);
                $image->resize(200, 300);
                $image->toJpeg(80)->save(base_path('public/uploads/category/' . $name_gen));
                $data->cat_image = 'uploads/category/' . $name_gen;
            }
            $data->save();

            DB::commit();

            return redirect()->route('admin.product-category.list')->with('success', 'product Category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating product category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProductCategoryEdit($id)
    {
        $title = 'Product Category Edit';

        $product_category = ProductCategory::findOrFail($id);

        return view('backend.product.product_category.edit', compact('title', 'product_category'));
    } // End Method

    public function ProductCategoryUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'name' => 'required|max:100',
            ],
            [
                'id.required' => 'ID is required',
                'name.required' => 'Name is required',
                'name.max' => 'Name is too long',
            ],
        );

        try {
            $data = ProductCategory::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }
            $data->name = $request->name;
            $data->short_description = $request->short_description;

            if ($request->file('cat_image')) {
                if (file_exists(base_path('public/' . $data->cat_image))) {
                    unlink(base_path('public/' . $data->cat_image));
                }
                $cat_image = $request->file('cat_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $cat_image->getClientOriginalExtension();
                $image = $manager->read($cat_image);
                $image->resize(200, 300);
                $image->toJpeg(80)->save(base_path('public/uploads/category/' . $name_gen));
                $data->cat_image = 'uploads/category/' . $name_gen;
            }
            $data->save();

            DB::commit();

            return redirect()->route('admin.product-category.list')->with('success', 'product Category Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating product category: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function ProductCategoryDelete($id)
    {
        DB::beginTransaction();

        try {
            $category = productCategory::findOrFail($id);
            $productDetails = $category->productDetails;

            foreach ($productDetails as $detail) {
                $product = Product::find($detail->product_id);

                if ($product) {
                    $imagePath = public_path($detail->product_image);
                    if (is_file($imagePath) && file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                    $product->delete();
                }

                $detail->delete();
            }

            $category->delete();

            DB::commit();
            return redirect()->route('admin.product-category.list')->with('success', 'product Category and related products deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting product category: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong!');
        }
    } // End Method
}
