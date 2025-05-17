<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
    public function LocationList()
    {
        $title = 'Location List';

        $locations = Location::latest()->get();

        return view('backend.location.list', compact('title', 'locations'));
    } // End Method

    public function LocationAdd()
    {
        $title = 'Location Add';

        return view('backend.location.add', compact('title'));
    } // End Method

    public function LocationStore(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'address' => 'required|max:255',
                'city' => 'required|max:100',
                'state' => 'required|max:100',
                'postal_code' => 'required|max:20',
                'country' => 'required|max:100',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
            ],
            [
                'address.required' => 'Address is required',
                'city.required' => 'City is required',
                'state.required' => 'State is required',
                'postal_code.required' => 'Postal code is required',
                'country.required' => 'Country is required',
            ],
        );
        

        DB::beginTransaction();

        try {
            $location = new Location();
            $location->address = $request->input('address');
            $location->city = $request->input('city');
            $location->state = $request->input('state');
            $location->postal_code = $request->input('postal_code');
            $location->country = $request->input('country');
            $location->latitude = $request->input('latitude');
            $location->longitude = $request->input('longitude');
            $location->save();


            DB::commit();

            return redirect()->route('admin.location.list')->with('success', 'Location created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating Location:' . $e->getMessage() . ' Line: ' . $e->getLine() . ' in ' . __FILE__);
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function LocationEdit($id)
    {
        $title = 'Location Edit';
        $location = Location::findOrFail($id);

        return view('backend.location.edit', compact('title', 'location'));
    } // End Method

    public function LocationUpdate(Request $request)
    {
         $validator = Validator::make(
            $request->all(),
            [
                'address' => 'required|max:255',
                'city' => 'required|max:100',
                'state' => 'required|max:100',
                'postal_code' => 'required|max:20',
                'country' => 'required|max:100',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
            ],
            [
                'address.required' => 'Address is required',
                'city.required' => 'City is required',
                'state.required' => 'State is required',
                'postal_code.required' => 'Postal code is required',
                'country.required' => 'Country is required',
            ],
        );

        DB::beginTransaction();

        try {
            $Location = Location::findOrFail($request->id);
            if (!$Location) {
                abort(404);
            }
            $location = Location::findOrFail($request->id);
            if (!$location) {
                abort(404);
            }
            $location->address = $request->input('address');
            $location->city = $request->input('city');
            $location->state = $request->input('state');
            $location->postal_code = $request->input('postal_code');
            $location->country = $request->input('country');
            $location->latitude = $request->input('latitude');
            $location->longitude = $request->input('longitude');
            $location->save();

            DB::commit();

            return redirect()->route('admin.location.list')->with('success', 'Location updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating Location: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function LocationDelete($id)
    {
        DB::beginTransaction();

        try {
            $location = Location::findOrFail($id);

            if (!$location) {
                abort(404);
            }

            $location->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Location deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting Location: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
