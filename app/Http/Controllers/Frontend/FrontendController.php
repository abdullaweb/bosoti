<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Location;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProjectUnit;
use App\Models\Setting;
use App\Models\PowerSolution;
use App\Models\Service;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function Index()
    {

        return view('frontend.index');
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

        // $relatedProjects = Project::where('id', '!=', $project->id)->where('unit_type',$projectUnitDetails->unit_type)
        //     ->latest()->get();

        // dd($relatedProjects);

        return view('frontend.details.project_details', compact('projectUnitDetails', 'project'));
    } // End Method



    public function CatWiseProductList($slug)
    {
        $name = Str::title(str_replace('-', ' ', $slug));
        $category = ProductCategory::where('name', $name)->first();
        $products = Product::where('status', 'active')->where('category_id', $category->id)->latest()->get();
        return view('frontend.pages.products', compact('products', 'category'));
    } // End Method



    public function ProductDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.details.product_details', compact('product'));
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

    public function AfterSales()
    {
        return view('frontend.pages.after_sales');
    } // End Method



    public function BlogList()
    {
        $blog = Blog::where('status', 'active')->latest()->get();
        return view('frontend.pages.our_blog', compact('blog'));
    } // End Method

    public function BlogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $author = User::where('id', $blog->created_by)->first()->name;
        return view('frontend.details.blog_details', compact('blog', 'author'));
    } // End Method

    public function PrivacyPolicy()
    {
        return view('frontend.pages.privacy_policy');
    } // End Method

    public function TermsConditions()
    {
        return view('frontend.pages.terms_conditions');
    } // End Method

    public function TeamList()
    {
        $team = OurTeam::where('status', 'active')->latest()->get();
        return view('frontend.pages.our_team', compact('team'));
    } // End Method

    public function CareerList()
    {
        $career = Career::where('status', 'active')->latest()->get();
        return view('frontend.pages.career', compact('career'));
    } // End Method

    public function CareerDetails($slug)
    {
        $job_application = Career::where('slug', $slug)->first();
        return view('frontend.details.job_details', compact('job_application'));
    } // End Method

    public function PowerSolutionDetails($slug)
    {
        $powerSolution = PowerSolution::where('slug', $slug)->first();
        return view('frontend.details.power_details', compact('powerSolution'));
    } // End Method

    public function PowerSolution()
    {
        $powerSolutions = PowerSolution::get();
        return view('frontend.pages.power_solution', compact('powerSolutions'));
    } // End Method
}
