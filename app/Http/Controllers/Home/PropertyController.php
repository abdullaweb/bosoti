<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PropertyController extends Controller
{
     public function PropertyList()
    {
        $title = 'Property List';

        $properties = Property::latest()->get();

        return view('backend.property.list', compact('title', 'properties'));
    } // End Method

    public function PropertyAdd()
    {
        $title = 'Property Add';

        $locations = Location::latest()->get();

        return view('backend.property.add', compact('title', 'locations'));
    } // End Method

    public function PropertyStore(Request $request)
    {
        // dd($request->all());
         $validator = $request->validate([
        'name' => 'required|string',
        'slug' => 'required|unique:properties,slug',
        'status' => 'required|in:upcoming,ongoing,completed',
        'location_id' => 'required|exists:locations,id',
        'images.*' => 'image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $property = new Property();
            $property->name = $request->input('name');
            $property->slug = Str::slug($request->input('name'));
            $property->description = $request->input('description');
            $property->status = $request->input('status');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $property->start_date = $startDate;
            $property->end_date = $endDate;
            $property->location_id = $request->input('location_id');
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keyword = $request->meta_keyword;
           

            if ($request->file('property_image')) {
                $property_image = $request->file('property_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $property_image->getClientOriginalExtension();
                $image = $manager->read($property_image);
                $image->resize(702, 780);
                $image->toJpeg(80)->save(base_path('public/uploads/properties/' . $name_gen));
                $property->property_image = 'uploads/properties/' . $name_gen;
            }

            $property->save();


            DB::commit();

            return redirect()->route('admin.property.list')->with('success', 'property created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating property:' . $e->getMessage() . ' Line: ' . $e->getLine() . ' in ' . __FILE__);
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function PropertyEdit($id)
    {
        $title = 'Property Edit';
        $property = Property::findOrFail($id);
        if (!$property) {
            abort(404);
        }
        $locations = Location::latest()->get();

        return view('backend.property.edit', compact('title', 'property', 'locations'));
    } // End Method

    public function PropertyUpdate(Request $request)
    {
         $validator = $request->validate([
        'name' => 'required|string',
        'slug' => 'required|unique:properties,slug,' . $request->id . ',id',
        'status' => 'required|in:upcoming,ongoing,completed',
        'location_id' => 'required|exists:locations,id',
        'images.*' => 'image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $property = Property::findOrFail($request->id);
            if (!$property) {
                abort(404);
            }
            $property->name = $request->input('name');
            $property->slug = Str::slug($request->input('name'));
            $property->description = $request->input('description');
            $property->status = $request->input('status');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $property->start_date = $startDate;
            $property->end_date = $endDate;
            $property->location_id = $request->input('location_id');
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keyword = $request->meta_keyword;



            if ($request->file('property_image')) {
                if (file_exists(base_path('public/' . $property->property_image))) {
                    unlink(base_path('public/' . $property->property_image));
                }
                $property_image = $request->file('property_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $property_image->getClientOriginalExtension();
                $image = $manager->read($property_image);
                $image->resize(702, 780);
                $image->toJpeg(80)->save(base_path('public/uploads/properties/' . $name_gen));
                $property->property_image = 'uploads/properties/' . $name_gen;
            }

            $property->save();

            DB::commit();

            return redirect()->route('admin.property.list')->with('success', 'Property updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating property: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function PropertyDelete($id)
    {
        DB::beginTransaction();

        try {
            $property = Property::findOrFail($id);

            if (!$property) {
                abort(404);
            }

            $imagePath = public_path($property->property_image);
            if (is_file($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $property->delete();

            DB::commit();
            return redirect()->back()->with('success', 'property deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting property: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
