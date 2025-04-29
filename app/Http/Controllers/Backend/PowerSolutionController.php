<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PowerSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PowerSolutionController extends Controller
{
    public function PowerSolutionList()
    {
        $title = 'Power Solution List';

        $powerSolutions = PowerSolution::latest()->get();

        return view('backend.power.list', compact('title', 'powerSolutions'));
    } // End Method

    public function PowerSolutionAdd()
    {
        $title = 'Power Solution Add';

        return view('backend.power.add', compact('title'));
    } // End Method

    public function PowerSolutionStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'slug' => 'required|max:100',
                'power_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'description' => 'required|string',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'slug.required' => 'Slug is required',
                'slug.max' => 'Slug is too long',
                'power_image.required' => 'PowerSolution image is required',
                'power_image.image' => 'PowerSolution image must be an image',
                'power_image.mimes' => 'PowerSolution image must be a file of type: jpeg, png, jpg, gif, svg',
                'power_image.max' => 'PowerSolution image must be less than 1MB',
                'description.required' => 'Description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $powerSolution = new PowerSolution();
            $powerSolution->title = $request->title;
            $powerSolution->description = $request->description;
            $powerSolution->meta_title = $request->meta_title;
            $powerSolution->meta_description = $request->meta_description;
            $powerSolution->meta_keyword = $request->meta_keyword;
            $powerSolution->slug = strtolower(str_replace(' ', '-', $request->slug));
            $powerSolution->created_by = Auth::user()->id;

            if ($request->file('power_image')) {
                $power_image = $request->file('power_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $power_image->getClientOriginalExtension();
                $image = $manager->read($power_image);
                $image->resize(612, 409);
                $image->toJpeg(80)->save(base_path('public/uploads/PowerSolutions/' . $name_gen));
                $powerSolution->power_image = 'uploads/PowerSolutions/' . $name_gen;
            }

            $powerSolution->save();

            DB::commit();

            return redirect()->route('admin.power.list')->with('success', 'Power Solution created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while creating PowerSolution: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function PowerSolutionEdit($id)
    {
        $title = 'Power Solution Edit';
        $powerSolution = PowerSolution::findOrFail($id);

        return view('backend.power.edit', compact('title', 'powerSolution'));
    } // End Method

    public function PowerSolutionUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'slug' => 'required|max:100',
                'power_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'description' => 'required|string',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'slug.required' => 'Slug is required',
                'slug.max' => 'Slug is too long',
                'power_image.required' => 'PowerSolution image is required',
                'power_image.image' => 'PowerSolution image must be an image',
                'power_image.mimes' => 'PowerSolution image must be a file of type: jpeg, png, jpg, gif, svg',
                'power_image.max' => 'PowerSolution image must be less than 1MB',
                'description.required' => 'Description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $powerSolution = PowerSolution::findOrFail($request->id);
            if (!$powerSolution) {
                abort(404);
            }
            $powerSolution->title = $request->title;
            $powerSolution->slug = strtolower(str_replace(' ', '-', $request->slug));
            $powerSolution->description = $request->description;
            $powerSolution->meta_title = $request->meta_title;
            $powerSolution->meta_description = $request->meta_description;
            $powerSolution->meta_keyword = $request->meta_keyword;
            $powerSolution->updated_by = Auth::user()->id;

            if ($request->file('power_image')) {
                if (file_exists(base_path('public/' . $powerSolution->power_image))) {
                    unlink(base_path('public/' . $powerSolution->power_image));
                }
                $power_image = $request->file('power_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $power_image->getClientOriginalExtension();
                $image = $manager->read($power_image);
                $image->resize(612, 409);
                $image->toJpeg(80)->save(base_path('public/uploads/PowerSolutions/' . $name_gen));
                $powerSolution->power_image = 'uploads/PowerSolutions/' . $name_gen;
            }

            $powerSolution->save();

            DB::commit();

            return redirect()->route('admin.power.list')->with('success', 'Power Solution updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating PowerSolution: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function PowerSolutionDelete($id)
    {
        DB::beginTransaction();

        try {
            $powerSolution = PowerSolution::findOrFail($id);

            if (!$powerSolution) {
                abort(404);
            }

            $imagePath = public_path($powerSolution->power_image);
            if (is_file($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $powerSolution->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Power Solution deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting Power Solution: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method
}
