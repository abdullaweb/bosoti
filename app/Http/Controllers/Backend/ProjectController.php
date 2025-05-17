<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function ProjectList()
    {
        $title = 'Project List';

        $projects = Project::latest()->get();

        return view('backend.project.list', compact('title', 'projects'));
    } // End Method

    public function ProjectAdd()
    {
        $title = 'Project Add';

        $locations = Location::latest()->get();

        return view('backend.project.add', compact('title', 'locations'));
    } // End Method

    public function ProjectStore(Request $request)
    {
         $validator = $request->validate([
        'name' => 'required|string',
        'slug' => 'required|unique:projects,slug',
        'status' => 'required|in:upcoming,ongoing,completed',
        'location_id' => 'required|exists:locations,id',
        'images.*' => 'image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $project = new Project();
            $project->name = $request->input('name');
            $project->slug = $request->input('slug');
            $project->description = $request->input('description');
            $project->status = $request->input('status');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $project->start_date = $startDate;
            $project->end_date = $endDate;
            $project->location_id = $request->input('location_id');
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keyword = $request->meta_keyword;
           

            if ($request->file('project_image')) {
                $project_image = $request->file('project_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $project_image->getClientOriginalExtension();
                $image = $manager->read($project_image);
                $image->resize(1000, 1437);
                $image->toJpeg(80)->save(base_path('public/uploads/projects/' . $name_gen));
                $project->project_image = 'uploads/projects/' . $name_gen;
            }

            $project->save();


            DB::commit();

            return redirect()->route('admin.project.list')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating Project:' . $e->getMessage() . ' Line: ' . $e->getLine() . ' in ' . __FILE__);
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProjectEdit($id)
    {
        $title = 'Project Edit';
        $project = Project::findOrFail($id);
        if (!$project) {
            abort(404);
        }
        $locations = Location::latest()->get();

        return view('backend.project.edit', compact('title', 'project', 'locations'));
    } // End Method

    public function ProjectUpdate(Request $request)
    {
         $validator = $request->validate([
        'name' => 'required|string',
        'slug' => 'required|unique:projects,slug,' . $request->id . ',id',
        'status' => 'required|in:upcoming,ongoing,completed',
        'location_id' => 'required|exists:locations,id',
        'images.*' => 'image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $project = Project::findOrFail($request->id);
            if (!$project) {
                abort(404);
            }
            $project->name = $request->input('name');
            $project->slug = $request->input('slug');
            $project->description = $request->input('description');
            $project->status = $request->input('status');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $project->start_date = $startDate;
            $project->end_date = $endDate;
            $project->location_id = $request->input('location_id');
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keyword = $request->meta_keyword;



            if ($request->file('project_image')) {
                if (file_exists(base_path('public/' . $project->project_image))) {
                    unlink(base_path('public/' . $project->project_image));
                }
                $project_image = $request->file('project_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $project_image->getClientOriginalExtension();
                $image = $manager->read($project_image);
                $image->resize(1000, 1437);
                $image->toJpeg(80)->save(base_path('public/uploads/projects/' . $name_gen));
                $project->project_image = 'uploads/projects/' . $name_gen;
            }

            $project->save();

            DB::commit();

            return redirect()->route('admin.project.list')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating Project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProjectDelete($id)
    {
        DB::beginTransaction();

        try {
            $project = Project::findOrFail($id);

            if (!$project) {
                abort(404);
            }

            $imagePath = public_path($project->project_image);
            if (is_file($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $project->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting Project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
