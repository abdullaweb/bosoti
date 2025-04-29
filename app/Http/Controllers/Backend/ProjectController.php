<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

        return view('backend.project.add', compact('title'));
    } // End Method

    public function ProjectStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'project_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'description' => 'required|string',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'project_image.required' => 'Project image is required',
                'project_image.image' => 'Project image must be an image',
                'project_image.mimes' => 'Project image must be a file of type: jpeg, png, jpg, gif, svg',
                'project_image.max' => 'Project image must be less than 1MB',
                'description.required' => 'Long description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $project = new Project();
            $project->project_title = $request->title;
            $project->project_description = $request->description;
            $project->created_by = Auth::user()->id;
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keyword = $request->meta_keyword;


            if ($request->file('project_image')) {
                $project_image = $request->file('project_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $project_image->getClientOriginalExtension();
                $image = $manager->read($project_image);
                // $image->resize(1600, 500);
                $image->toJpeg(80)->save(base_path('public/uploads/projects/' . $name_gen));
                $project->project_image = 'uploads/projects/' . $name_gen;
            }

            $project->save();


            DB::commit();

            return redirect()->route('admin.project.list')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating Project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function ProjectEdit($id)
    {
        $title = 'Project Edit';
        $project = Project::findOrFail($id);

        return view('backend.Project.edit', compact('title', 'project'));
    } // End Method

    public function ProjectUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'project_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'description' => 'required|string',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'project_image.required' => 'Project image is required',
                'project_image.image' => 'Project image must be an image',
                'project_image.mimes' => 'Project image must be a file of type: jpeg, png, jpg, gif, svg',
                'project_image.max' => 'Project image must be less than 1MB',
                'description.required' => 'Description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $project = Project::findOrFail($request->id);
            if (!$project) {
                abort(404);
            }
            $project->project_title = $request->title;
            $project->project_description = $request->description;
            $project->updated_by = Auth::user()->id;
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
                // $image->resize(1600, 500);
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
