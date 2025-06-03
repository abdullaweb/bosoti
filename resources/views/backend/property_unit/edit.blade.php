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

                                <form action="{{ route('admin.property-unit.update') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $property_unit->id }}">

                                    <!--  Name -->
                                    <div class="mb-3">
                                        <label for="property_id" class="form-label">Property</label>
                                        <select name="property_id" class="form-control select2">
                                            <option value="" selected disabled>Select property</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}" {{ old('property_id', $property_unit->property_id ?? '') == $property->id ? 'selected' : '' }}>
                                                    {{ $property->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <!-- title -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title', $property_unit->title ?? '') }}" required>
                                    </div>

                                    <!-- unit_type -->
                                    <div class="mb-3">
                                        <label for="unit_type" class="form-label">Unit Type</label>
                                        <input type="text" name="unit_type" class="form-control" placeholder="e.g., Apartment, Villa, etc." value="{{ old('unit_type', $property_unit->unit_type ?? '') }}" required>
                                    </div>

                                    <!-- price -->
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Postal Code</label>
                                        <input type="text" name="price" class="form-control" value="{{ old('price', $property_unit->price ?? '') }}" required>
                                    </div>

                                    <!-- area_sqft -->
                                    <div class="mb-3">
                                        <label for="area_sqft" class="form-label">Area Sqft</label>
                                        <input type="text" name="area_sqft" class="form-control" value="{{ old('area_sqft', $property_unit->area_sqft ?? '') }}" required>
                                    </div>

                                    <!-- bedrooms -->
                                    <div class="mb-3">
                                        <label for="bedrooms" class="form-label">Bedrooms</label>
                                        <input type="text" name="bedrooms" class="form-control" value="{{ old('bedrooms', $property_unit->bedrooms ?? '') }}" required>
                                    </div>

                                    <!-- bathrooms -->
                                    <div class="mb-3">
                                        <label for="bathrooms" class="form-label">Bathrooms</label>
                                        <input type="text" name="bathrooms" class="form-control" value="{{ old('bathrooms', $property_unit->bathrooms ?? '') }}" required>
                                    </div>

                                    <!-- floor -->
                                    <div class="mb-3">
                                        <label for="floor" class="form-label">floor</label>
                                        <input type="text" name="floor" class="form-control" value="{{ old('floor', $property_unit->floor ?? '') }}" required>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">
                                             Update property Unit
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
