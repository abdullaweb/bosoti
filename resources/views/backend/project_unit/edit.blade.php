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

                                {{-- <form id="form" action="{{ route('admin.project_unit.update') }}" method="post">

                                    @csrf
                                    <input type="hidden" name="id" value="{{ $project_unit->id }}">

                                    <!-- project_unit Name -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ old('address', $project_unit->address ?? '') }}" required>
                                    </div>
                                    
                                    <!-- city -->
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" value="{{ old('city', $project_unit->city ?? '') }}" required>
                                    </div>

                                    <!-- city -->
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" name="state" class="form-control" value="{{ old('state', $project_unit->state ?? '') }}" required>
                                    </div>

                                    <!-- postal code -->
                                    <div class="mb-3">
                                        <label for="postal_code" class="form-label">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $project_unit->postal_code ?? '') }}" required>
                                    </div>

                                    <!-- country -->
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" value="{{ old('country', $project_unit->country ?? '') }}" required>
                                    </div>

                                    <!-- latitude -->
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label">Latitude</label>
                                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $project_unit->latitude ?? '') }}" required>
                                    </div>

                                    <!-- longitude -->
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $project_unit->longitude ?? '') }}" required>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </form> --}}

                                <form action="{{ route('admin.project-unit.update') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $project_unit->id }}">

                                    <!--  Name -->
                                    <div class="mb-3">
                                        <label for="project_id" class="form-label">Project</label>
                                        <select name="project_id" class="form-control select2">
                                            <option value="" selected disabled>Select Project</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}" {{ old('project_id', $project_unit->project_id ?? '') == $project->id ? 'selected' : '' }}>
                                                    {{ $project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <!-- title -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title', $project_unit->title ?? '') }}" required>
                                    </div>

                                    <!-- unit_type -->
                                    <div class="mb-3">
                                        <label for="unit_type" class="form-label">Unit Type</label>
                                        <input type="text" name="unit_type" class="form-control" placeholder="e.g., Apartment, Villa, etc." value="{{ old('unit_type', $project_unit->unit_type ?? '') }}" required>
                                    </div>

                                    <!-- price -->
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Postal Code</label>
                                        <input type="text" name="price" class="form-control" value="{{ old('price', $project_unit->price ?? '') }}" required>
                                    </div>

                                    <!-- area_sqft -->
                                    <div class="mb-3">
                                        <label for="area_sqft" class="form-label">Area Sqft</label>
                                        <input type="text" name="area_sqft" class="form-control" value="{{ old('area_sqft', $project_unit->area_sqft ?? '') }}" required>
                                    </div>

                                    <!-- bedrooms -->
                                    <div class="mb-3">
                                        <label for="bedrooms" class="form-label">Bedrooms</label>
                                        <input type="text" name="bedrooms" class="form-control" value="{{ old('bedrooms', $project_unit->bedrooms ?? '') }}" required>
                                    </div>

                                    <!-- bathrooms -->
                                    <div class="mb-3">
                                        <label for="bathrooms" class="form-label">Bathrooms</label>
                                        <input type="text" name="bathrooms" class="form-control" value="{{ old('bathrooms', $project_unit->bathrooms ?? '') }}" required>
                                    </div>

                                    <!-- floor -->
                                    <div class="mb-3">
                                        <label for="floor" class="form-label">floor</label>
                                        <input type="text" name="floor" class="form-control" value="{{ old('floor', $project_unit->floor ?? '') }}" required>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">
                                             Update Project Unit
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

    <script>
        $(document).ready(function() {
            $('#image-upload').change(function(e) {
                $('#imageShow').css('background-image', `url(${URL.createObjectURL(e.target.files[0])})`);
            });
        });
    </script>

@endsection
