<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProjectUnitController extends Controller
{
     public function ProjectUnitList()
    {
        $title = 'Project Unit List';

        $project_units = ProjectUnit::latest()->get();

        return view('backend.project_unit.list', compact('title', 'project_units'));
    } // End Method

    public function ProjectUnitAdd()
    {
        $title = 'Project Unit Add';

        $projects = Project::get();

        return view('backend.project_unit.add', compact('title', 'projects'));
    } // End Method

    public function ProjectUnitStore(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'area_sqft' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'floor' => 'required|integer',
        ], [
            'project_id.required' => 'Project ID is required',
            'title.required' => 'Title is required',
            'unit_type.required' => 'Unit type is required',
            'price.required' => 'Price is required',
            'area_sqft.required' => 'Area in sqft is required',
            'bedrooms.required' => 'Number of bedrooms is required',
            'bathrooms.required' => 'Number of bathrooms is required',
            'floor.required' => 'Floor number is required',
        ]
    );
        

        DB::beginTransaction();

        try {
            $project_unit = new ProjectUnit();
            $project_unit->project_id = $request->input('project_id');
            $project_unit->title = $request->input('title');
            $project_unit->unit_type = $request->input('unit_type');
            $project_unit->price = $request->input('price');
            $project_unit->area_sqft = $request->input('area_sqft');
            $project_unit->bedrooms = $request->input('bedrooms');
            $project_unit->bathrooms = $request->input('bathrooms');
            $project_unit->floor = $request->input('floor');
            $project_unit->save();

            DB::commit();

            return redirect()->route('admin.project-unit.list')->with('success', 'project_unit created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating project_unit:' . $e->getMessage() . ' Line: ' . $e->getLine() . ' in ' . __FILE__);
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProjectUnitEdit($id)
    {
        $title = 'Project Unit Edit';
        $project_unit = ProjectUnit::findOrFail($id);

        $projects = Project::get();



        return view('backend.project_unit.edit', compact('title', 'project_unit', 'projects'));
    } // End Method

    public function ProjectUnitUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'area_sqft' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'floor' => 'required|integer',
        ], [
            'project_id.required' => 'Project ID is required',
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
            $project_unit = ProjectUnit::findOrFail($request->id);
            if (!$project_unit) {
                abort(404);
            }
            $project_unit = ProjectUnit::findOrFail($request->id);
            if (!$project_unit) {
                abort(404);
            }
            $project_unit->project_id = $request->input('project_id');
            $project_unit->title = $request->input('title');
            $project_unit->unit_type = $request->input('unit_type');
            $project_unit->price = $request->input('price');
            $project_unit->area_sqft = $request->input('area_sqft');
            $project_unit->bedrooms = $request->input('bedrooms');
            $project_unit->bathrooms = $request->input('bathrooms');
            $project_unit->floor = $request->input('floor');
            $project_unit->save();

            DB::commit();

            return redirect()->route('admin.project-unit.list')->with('success', 'Project Unit updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating project unit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProjectUnitDelete($id)
    {
        DB::beginTransaction();

        try {
            $project_unit = ProjectUnit::findOrFail($id);

            if (!$project_unit) {
                abort(404);
            }

            $project_unit->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Project Unit deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting project unit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
