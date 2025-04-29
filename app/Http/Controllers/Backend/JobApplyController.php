<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use JobApply as GlobalJobApply;

class JobApplyController extends Controller
{
    public function JobApplyList()
    {
        $title = 'Job Application List';

        $job_applications = JobApply::latest()->get();

        return view('backend.job_application.list', compact('title', 'job_applications'));
    } // End Method

    public function JobApplyStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100',
                'email' => 'email|max:100',
                'phone' => 'required|max:20',
                'interested_in' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'name.max' => 'Name is too long',
                'email.email' => 'Email is not valid',
                'email.max' => 'Email is too long',
                'phone.required' => 'Phone is required',
                'phone.max' => 'Phone is too long',
                'interested_in.required' => 'Subject is required',
                'message.required' => 'Message is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $data = new JobApply();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->interested_in = $request->interested_in;
            $data->message = $request->message;
            $data->save();

            DB::commit();

            return redirect()->back()->with('success', 'Job Application Submitted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating job application: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function JobApplyDelete($id)
    {
        DB::beginTransaction();

        try {
            $data = JobApply::findOrFail($id);
            $data->delete();

            DB::commit();

            return redirect()->route('admin.job_apply.list')->with('success', 'Job Application Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting job application: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            JobApply::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected job applications have been deleted successfully');
        }
        return redirect()->back()->with('error', 'No job applications selected for deletion');
    }
}
