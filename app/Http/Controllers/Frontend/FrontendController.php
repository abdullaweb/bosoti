<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Career;
use App\Models\Location;
use App\Models\OurTeam;
use App\Models\ProjectUnit;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function Index()
    {
        $locations = Location::distinct('city')->orderBy('city', 'asc')->get('city');

        $projectUnitDetails = ProjectUnit::distinct('unit_type')->get('unit_type');

        $projects = Project::distinct('status')->get('status');

        $latestProjects = Project::latest()->take(6)->get();

        return view('frontend.index', compact('locations', 'projectUnitDetails', 'projects', 'latestProjects'));
    } // End Method

    public function PropertyList()
    {
        // $category = NULL;
        // $products = Product::where('status', 'active')->latest()->get();
        return view('frontend.pages.property');
    } // End Method

    public function PropertyDetails($slug)
    {
        $slug = 'property-details';
        return view('frontend.details.property_details');
    }
    public function ProjectList()
    {
        $projects = Project::latest()->get();
        return view('frontend.pages.projects', compact('projects'));
    } // End Method

    public function ProjectDetails($slug)
    {
        $project = Project::where('slug', $slug)->first();
        $projectUnitDetails = ProjectUnit::where('project_id', $project->id)->first();

        return view('frontend.details.project_details', compact('projectUnitDetails', 'project'));
    } // End Method


    public function ContactUs()
    {
        return view('frontend.pages.contact_us');
    } // End Method

    public function AboutUs()
    {
        $about_us = AboutUs::where('id', 1)->latest()->get()->first();

        $about_message = AboutUs::where('id', 2)->latest()->get()->first();

        $our_team = OurTeam::where('status', 'active')->latest()->get();

        return view('frontend.pages.about_us', compact('about_us', 'about_message', 'our_team'));
    } // End Method

    public function PrivacyPolicy()
    {
        return view('frontend.pages.privacy_policy');
    } // End Method

    public function TermsConditions()
    {
        return view('frontend.pages.terms_conditions');
    } // End Method

    public function ProjectSearch(Request $request)
    {
        // dd($request->all());
        // Fetching distinct values for filters
        $city = $request->input('city');
        $unit_type = $request->input('unit_type');
        $status = $request->input('status');

       $projects = Project::with(['projectUnit', 'location'])
                   ->where('status', 'like', '%' . $status . '%')
                   ->whereHas('projectUnit', function ($query) use ($unit_type) {
                        $query->where('unit_type', 'like', '%' . $unit_type . '%');
                    })
                    ->whereHas('location', function ($query) use ($city) {
                        $query->where('city', 'like', '%' . $city . '%');
                    })
                    ->latest()
                    ->get();


        // dd($projects);

        return view('frontend.pages.project_search', compact('projects', 'city', 'unit_type', 'status'));

    } // End Method
}
