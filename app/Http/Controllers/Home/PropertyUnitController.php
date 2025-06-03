<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PropertyUnitController extends Controller
{
     public function PropertyUnitList()
    {
        $title = 'Property Unit List';

        $property_units = PropertyUnit::latest()->get();

        return view('backend.property_unit.list', compact('title', 'property_units'));
    } // End Method

    public function PropertyUnitAdd()
    {
        $title = 'Property Unit Add';

        $properties = Property::get();

        return view('backend.property_unit.add', compact('title', 'properties'));
    } // End Method

    public function PropertyUnitStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'title' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'area_sqft' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'floor' => 'required|integer',
        ], [
            'property_id.required' => 'Property ID is required',
            'title.required' => 'Title is required',
            'unit_type.required' => 'Unit type is required',
            'price.required' => 'Price is required',
            'area_sqft.required' => 'Area in sqft is required',
            'bedrooms.required' => 'Number of bedrooms is required',
            'bathrooms.required' => 'Number of bathrooms is required',
            'floor.required' => 'Floor number is required',
        ]);

        DB::beginTransaction();

        try {
            $property_unit = new PropertyUnit();
            $property_unit->property_id = $request->input('property_id');
            $property_unit->title = $request->input('title');
            $property_unit->unit_type = $request->input('unit_type');
            $property_unit->price = $request->input('price');
            $property_unit->area_sqft = $request->input('area_sqft');
            $property_unit->bedrooms = $request->input('bedrooms');
            $property_unit->bathrooms = $request->input('bathrooms');
            $property_unit->floor = $request->input('floor');
            $property_unit->save();

            DB::commit();

            return redirect()->route('admin.property-unit.list')->with('success', 'Property Unit created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating property_unit:' . $e->getMessage() . ' Line: ' . $e->getLine() . ' in ' . __FILE__);
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function PropertyUnitEdit($id)
    {
        $title = 'Property Unit Edit';
        $property_unit = PropertyUnit::findOrFail($id);

        $properties = Property::get();

        return view('backend.property_unit.edit', compact('title', 'property_unit', 'properties'));
    } // End Method

    public function PropertyUnitUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'title' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'area_sqft' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'floor' => 'required|integer',
        ], [
            'property_id.required' => 'Property ID is required',
            'title.required' => 'Title is required',
            'unit_type.required' => 'Unit type is required',
            'price.required' => 'Price is required',
            'area_sqft.required' => 'Area in sqft is required',
            'bedrooms.required' => 'Number of bedrooms is required',
            'bathrooms.required' => 'Number of bathrooms is required',
            'floor.required' => 'Floor number is required',
        ]);

        DB::beginTransaction();

        try {
            $property_unit = PropertyUnit::findOrFail($request->id);
            if (!$property_unit) {
                abort(404);
            }
            $property_unit->property_id = $request->input('property_id');
            $property_unit->title = $request->input('title');
            $property_unit->unit_type = $request->input('unit_type');
            $property_unit->price = $request->input('price');
            $property_unit->area_sqft = $request->input('area_sqft');
            $property_unit->bedrooms = $request->input('bedrooms');
            $property_unit->bathrooms = $request->input('bathrooms');
            $property_unit->floor = $request->input('floor');
            $property_unit->save();

            DB::commit();

            return redirect()->route('admin.property-unit.list')->with('success', 'Property Unit updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating property unit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function PropertyUnitDelete($id)
    {
        DB::beginTransaction();

        try {
            $property_unit = PropertyUnit::findOrFail($id);

            if (!$property_unit) {
                abort(404);
            }

            $property_unit->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Property Unit deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting property unit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
