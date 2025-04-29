<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ClientController extends Controller
{
    public function ClientList()
    {
        $title = 'Client List';

        $clients = Client::latest()->get();

        return view('backend.client.list', compact('title', 'clients'));
    } // End Method

    public function ClientAdd()
    {
        $title = 'Client Add'; 

        return view('backend.client.add', compact('title'));
    } // End Method

    public function ClientStore(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'client_image' => 'required|image|max:1024',
            ],
            [
                'client_image.required' => 'Client Image is required',
                'client_image.image' => 'Client Image must be an image',
                'client_image.max' => 'Client Image must be less than 1MB',
            ],
        );

        try {
            $data = new Client();
            $data->created_by = Auth::user()->id;
            $data->updated_by = null;

            if ($request->file('client_image')) {
                $client_image = $request->file('client_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();
                $image = $manager->read($client_image);
                $image->resize(78, 100);
                $image->toJpeg(80)->save(base_path('public/uploads/clients/' . $name_gen));
                $data->client_image = 'uploads/clients/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.client.list')->with('success', 'Client Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating Client: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function ClientEdit($id)
    {
        $title = 'Client Edit';

        $client = Client::findOrFail($id);

        return view('backend.client.edit', compact('title', 'client'));
    } // End Method

    public function ClientUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'client_image' => 'image|max:1024',
            ],
            [
                'client_image.image' => 'Client Image must be an image',
                'client_image.max' => 'Client Image must be less than 1MB',
            ],
        );

        try {
            $data = Client::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }

            $data->created_by = null;
            $data->updated_by = Auth::user()->id;

            if ($request->file('client_image')) {
                if (file_exists(base_path('public/' . $data->client_image))) {
                    unlink(base_path('public/' . $data->client_image));
                }
                $client_image = $request->file('client_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();
                $image = $manager->read($client_image);
                $image->resize(78, 100);
                $image->toJpeg(80)->save(base_path('public/uploads/clients/' . $name_gen));
                $data->client_image = 'uploads/clients/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.client.list')->with('success', 'Client Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating Client: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function ClientDelete($id)
    {
        DB::beginTransaction();

        try {
            $client = Client::find($id);
            if (file_exists(base_path('public/' . $client->client_image))) {
                unlink(base_path('public/' . $client->client_image));
            }
            $client->delete();

            DB::commit();

            return redirect()->route('admin.client.list')->with('success', 'Client Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting Client: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
