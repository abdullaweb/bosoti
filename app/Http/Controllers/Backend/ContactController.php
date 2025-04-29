<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function ContactList()
    {
        $title = 'Contact Message List';

        $contact_message = Contact::latest()->get();

        return view('backend.contact.list', compact('title', 'contact_message'));
    } // End Method

    public function ContactStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100',
                'email' => 'required|email|max:100',
                'phone' => 'required|max:20',
                'subject' => 'required|max:200',
                'message' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'name.max' => 'Name is too long',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'email.max' => 'Email is too long',
                'phone.required' => 'Phone is required',
                'phone.max' => 'Phone is too long',
                'subject.required' => 'Subject is required',
                'subject.max' => 'Subject is too long',
                'message.required' => 'Message is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $data = new Contact();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->subject = $request->subject;
            $data->message = $request->message;
            $data->save();

            DB::commit();

            return redirect()->back()->with('success', 'Contact Message Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating contact message: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function ContactDelete($id)
    {
        DB::beginTransaction();

        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            DB::commit();

            return redirect()->route('admin.contact.list')->with('success', 'Contact Message Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting contact message: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            Contact::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected contacts have been deleted successfully');
        }
        return redirect()->back()->with('error', 'No contacts selected for deletion');
    }
}