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


                                <form action="{{ isset($location) ? route('admin.location.update', $location) : route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- location Name -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ old('address', $location->address ?? '') }}" required>
                                    </div>
                                    
                                    <!-- city -->
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" value="{{ old('city', $location->city ?? '') }}" required>
                                    </div>

                                    <!-- city -->
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" name="state" class="form-control" value="{{ old('state', $location->state ?? '') }}" required>
                                    </div>

                                    <!-- postal code -->
                                    <div class="mb-3">
                                        <label for="postal_code" class="form-label">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $location->postal_code ?? '') }}" required>
                                    </div>

                                    <!-- country -->
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" value="{{ old('country', $location->country ?? '') }}" required>
                                    </div>

                                    <!-- latitude -->
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label">Latitude</label>
                                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $location->latitude ?? '') }}" required>
                                    </div>

                                    <!-- longitude -->
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $location->longitude ?? '') }}" required>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">
                                                {{ isset($location) ? 'Update location' : 'Create location' }}
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
