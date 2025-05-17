@extends('backend.admin.master')

@section('admin_title', $title . ' | Bosoti Real Estate')

@section('admin_content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ $title }}</h4>
                                <h4>
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')


                                <form action="{{ route('admin.project-unit.store') }}" method="POST">
                                    @csrf

                                    <!--  Name -->
                                    <div class="mb-3">
                                        <label for="project_id" class="form-label">Project</label>
                                        <select name="project_id" class="form-control select2">
                                            <option value="" selected disabled>Select Project</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">
                                                    {{ $project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <!-- title -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title', $location->title ?? '') }}" required>
                                    </div>

                                    <!-- unit_type -->
                                    <div class="mb-3">
                                        <label for="unit_type" class="form-label">Unit Type</label>
                                        <input type="text" name="unit_type" class="form-control" placeholder="e.g., Apartment, Villa, etc." value="{{ old('unit_type', $location->unit_type ?? '') }}" required>
                                    </div>

                                    <!-- price -->
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Postal Code</label>
                                        <input type="text" name="price" class="form-control" value="{{ old('price', $location->price ?? '') }}" required>
                                    </div>

                                    <!-- area_sqft -->
                                    <div class="mb-3">
                                        <label for="area_sqft" class="form-label">Area Sqft</label>
                                        <input type="text" name="area_sqft" class="form-control" value="{{ old('area_sqft', $location->area_sqft ?? '') }}" required>
                                    </div>

                                    <!-- bedrooms -->
                                    <div class="mb-3">
                                        <label for="bedrooms" class="form-label">Bedrooms</label>
                                        <input type="text" name="bedrooms" class="form-control" value="{{ old('bedrooms', $location->bedrooms ?? '') }}" required>
                                    </div>

                                    <!-- bathrooms -->
                                    <div class="mb-3">
                                        <label for="bathrooms" class="form-label">Bathrooms</label>
                                        <input type="text" name="bathrooms" class="form-control" value="{{ old('bathrooms', $location->bathrooms ?? '') }}" required>
                                    </div>

                                    <!-- floor -->
                                    <div class="mb-3">
                                        <label for="floor" class="form-label">floor</label>
                                        <input type="text" name="floor" class="form-control" value="{{ old('floor', $location->floor ?? '') }}" required>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">
                                             Create Project Unit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
