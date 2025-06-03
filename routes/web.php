<?php

use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\OurTeamController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectUnitController;
use App\Http\Controllers\Backend\Settings\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Home\PropertyController;
use App\Http\Controllers\Home\PropertyUnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// ############################## Routes for frontend ##############################
Route::group(
    [
        'middleware' => ['web'],
    ],
    function () {
        // Home Route
        Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
        // Contact Message Store Route
        Route::post('/admin/contact/store', [ContactController::class, 'ContactStore'])->name('admin.contact.store');

        Route::group(
            [
                'prefix' => '',
                'controller' => FrontendController::class,
                'as' => 'frontend.',
            ],
            function () {
                Route::get('/property', 'PropertyList')->name('property.list');
                Route::get('/details/{slug}', 'PropertyDetails')->name('property.details');
                Route::get('/project', 'ProjectList')->name('project.list');
                //project details
                Route::get('/project-details/{slug}', 'ProjectDetails')->name('project.details');

                //project search
                Route::get('/project-search', 'ProjectSearch')->name('project.search');
                Route::get('/contact-us', 'ContactUs')->name('contact-us');
                Route::get('/about-us', 'AboutUs')->name('about-us');
                Route::get('/privacy-policy', 'PrivacyPolicy')->name('privacy.policy');
                Route::get('/terms-conditions', 'TermsConditions')->name('terms.conditions');
            },
        );
    },
);

// ############################## Routes for admins ##############################
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', RoleMiddleware::class . ':admin'],
        'as' => 'admin.',
    ],
    function () {
        // Admin Dashboard
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'AdminDashboard')->name('dashboard');
            Route::get('/logout', 'AdminLogout')->name('logout');
            Route::get('/profile', 'AdminProfile')->name('profile');
            Route::post('/profile/update', 'AdminProfileUpdate')->name('profile.update');
            Route::post('/password/update', 'AdminPasswordUpdate')->name('password.update');
        });

        // Slider All Routes
        Route::group(
            [
                'prefix' => 'slider',
                'controller' => SliderController::class,
                'as' => 'slider.',
            ],
            function () {
                Route::get('/list', 'SliderList')->name('list');
                Route::get('/add', 'SliderAdd')->name('add');
                Route::post('/store', 'SliderStore')->name('store');
                Route::get('/edit/{id}', 'SliderEdit')->name('edit');
                Route::post('/update', 'SliderUpdate')->name('update');
                Route::get('/delete/{id}', 'SliderDelete')->name('delete');
            },
        );

        // Projects All Routes
        Route::group(
            [
                'prefix' => 'project',
                'controller' => ProjectController::class,
                'as' => 'project.',
            ],
            function () {
                Route::get('/list', 'ProjectList')->name('list');
                Route::get('/add', 'ProjectAdd')->name('add');
                Route::post('/store', 'ProjectStore')->name('store');
                Route::get('/edit/{id}', 'ProjectEdit')->name('edit');
                Route::post('/update', 'ProjectUpdate')->name('update');
                Route::get('/delete/{id}', 'ProjectDelete')->name('delete');
            },
        );

        // Location All Routes
        Route::group(
            [
                'prefix' => 'location',
                'controller' => LocationController::class,
                'as' => 'location.',
            ],
            function () {
                Route::get('/list', 'LocationList')->name('list');
                Route::get('/add', 'LocationAdd')->name('add');
                Route::post('/store', 'LocationStore')->name('store');
                Route::get('/edit/{id}', 'LocationEdit')->name('edit');
                Route::post('/update', 'LocationUpdate')->name('update');
                Route::get('/delete/{id}', 'LocationDelete')->name('delete');
            },
        );

        // Project Unit All Routes
        Route::group(
            [
                'prefix' => 'project-unit',
                'controller' => ProjectUnitController::class,
                'as' => 'project-unit.',
            ],
            function () {
                Route::get('/list', 'ProjectUnitList')->name('list');
                Route::get('/add', 'ProjectUnitAdd')->name('add');
                Route::post('/store', 'ProjectUnitStore')->name('store');
                Route::get('/edit/{id}', 'ProjectUnitEdit')->name('edit');
                Route::post('/update', 'ProjectUnitUpdate')->name('update');
                Route::get('/delete/{id}', 'ProjectUnitDelete')->name('delete');
            },
        );


         // Property All Routes
        Route::group(
            [
                'prefix' => 'property',
                'controller' => PropertyController::class,
                'as' => 'property.',
            ],
            function () {
                Route::get('/list', 'PropertyList')->name('list');
                Route::get('/add', 'PropertyAdd')->name('add');
                Route::post('/store', 'PropertyStore')->name('store');
                Route::get('/edit/{id}', 'PropertyEdit')->name('edit');
                Route::post('/update', 'PropertyUpdate')->name('update');
                Route::get('/delete/{id}', 'PropertyDelete')->name('delete');
            },
        );

         // Property Unit All Routes
        Route::group(
            [
                'prefix' => 'property-unit',
                'controller' => PropertyUnitController::class,
                'as' => 'property-unit.',
            ],
            function () {
                Route::get('/list', 'PropertyUnitList')->name('list');
                Route::get('/add', 'PropertyUnitAdd')->name('add');
                Route::post('/store', 'PropertyUnitStore')->name('store');
                Route::get('/edit/{id}', 'PropertyUnitEdit')->name('edit');
                Route::post('/update', 'PropertyUnitUpdate')->name('update');
                Route::get('/delete/{id}', 'PropertyUnitDelete')->name('delete');
            },
        );


        // Client All Routes
        Route::group(
            [
                'prefix' => 'client',
                'controller' => ClientController::class,
                'as' => 'client.',
            ],
            function () {
                Route::get('/list', 'ClientList')->name('list');
                Route::get('/add', 'ClientAdd')->name('add');
                Route::post('/store', 'ClientStore')->name('store');
                Route::get('/edit/{id}', 'ClientEdit')->name('edit');
                Route::post('/update', 'ClientUpdate')->name('update');
                Route::get('/delete/{id}', 'ClientDelete')->name('delete');
            },
        );


        // Setting All Routes
        Route::group(
            [
                'prefix' => 'setting',
                'controller' => SettingController::class,
                'as' => 'setting.',
            ],
            function () {
                Route::get('/font-awesome', 'FontAwesome')->name('font-awesome');
                Route::get('/search-icons', 'searchIcons')->name('search-icons');
                Route::get('/edit/{id}', 'SettingEdit')->name('edit');
                Route::post('/update', 'SettingUpdate')->name('update');
            },
        );

        // Contact Message All Routes
        Route::group(
            [
                'prefix' => 'contact',
                'controller' => ContactController::class,
                'as' => 'contact.',
            ],
            function () {
                Route::get('/list', 'ContactList')->name('list');
                Route::get('/delete/{id}', 'ContactDelete')->name('delete');
                Route::post('/contact/delete-selected', 'deleteSelected')->name('deleteSelected');
            },
        );

        // About Us All Routes
        Route::group(
            [
                'prefix' => 'about-us',
                'controller' => AboutUsController::class,
                'as' => 'about-us.',
            ],
            function () {
                Route::get('/list', 'AboutUsList')->name('list');
                Route::get('/edit/{id}', 'AboutUsEdit')->name('edit');
                Route::post('/update', 'AboutUsUpdate')->name('update');
            },
        );

        // Chairman Message All Routes
        Route::group(
            [
                'prefix' => 'about-message',
                'controller' => AboutUsController::class,
                'as' => 'about-message.',
            ],
            function () {
                Route::get('/list', 'AboutMessageList')->name('list');
                Route::get('/edit/{id}', 'AboutMessageEdit')->name('edit');
                Route::post('/update', 'AboutMessageUpdate')->name('update');
            },
        );

        // Our Team All Routes
        Route::group(
            [
                'prefix' => 'our-team',
                'controller' => OurTeamController::class,
                'as' => 'our-team.',
            ],
            function () {
                Route::get('/list', 'OurTeamList')->name('list');
                Route::get('/add', 'OurTeamAdd')->name('add');
                Route::post('/store', 'OurTeamStore')->name('store');
                Route::get('/edit/{id}', 'OurTeamEdit')->name('edit');
                Route::post('/update', 'OurTeamUpdate')->name('update');
                Route::get('/delete/{id}', 'OurTeamDelete')->name('delete');
            },
        );
    },
);

require __DIR__ . '/auth.php';
