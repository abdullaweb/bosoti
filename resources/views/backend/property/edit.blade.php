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

                                <form action="{{ isset($property) ? route('admin.property.update', $property) : route('admin.property.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $property->id }}">

                                    <!-- property Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">property Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $property->name ?? '') }}" required>
                                    </div>

                                    <!-- Slug -->
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $property->slug ?? '') }}" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-3">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Long Description</label>
                                                <textarea class="summernote" name="description" required data-parsley-required-message="property Long Description is required*">{{ old('description') ?? $property->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="">
                                            <option value="upcoming" {{ old('status', $property->status ?? '') == 'upcoming' ? 'selected' : '' }}>
                                                Upcoming
                                            </option>
                                            <option value="ongoing" {{ old('status', $property->status ?? '') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                            <option value="completed" {{ old('status', $property->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>

                                    <!-- Dates -->
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" name="start_date" class="form-control date_picker" value="{{ old('start_date', $property->start_date ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" name="end_date" class="form-control date_picker" value="{{ old('end_date', $property->end_date ?? '') }}">
                                    </div>

                                    <!-- Location -->
                                    <div class="mb-3">
                                        <label for="location_id" class="form-label">Location</label>
                                        <select name="location_id" class="form-control select2" required>
                                            <option value="" disabled>Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}" {{ old('location_id', $property->location_id ?? '') == $location->id ? 'selected' : '' }}>
                                                    {{ $location->address }}, {{ $location->city }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <!-- Images -->
                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Image</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="property_image" id="image-upload" data-parsley-required-message="property Image is required*" />

                                                <div class="table_slider_update_image" style="background-image: url({{ asset($property->property_image) }}); background-size: cover; background-position: center;" id="imageShow"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-4" style="border: 1px solid #000">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') ?? $property->meta_title }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Meta Description</label>
                                            <textarea name="meta_description" rows="4" class="form-control">{{ old('meta_description') ?? $property->meta_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Meta Keyword</label>
                                            <input type="text" class="form-control" name="meta_keyword" value="{{ old('meta_keyword') ?? $property->meta_keyword }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">
                                                {{ isset($property) ? 'Update property' : 'Create property' }}
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
