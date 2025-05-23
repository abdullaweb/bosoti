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
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark"> <i class="fas fa-arrow-left"></i> Back</a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')

                                <form id="form" action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data" data-parsley-validate>

                                    @csrf

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Image</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="slider_image" id="image-upload" data-parsley-required-message="Slider Image is required*" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" data-parsley-required-message="Slider Title is required*" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Sub Title</label>
                                            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" data-parsley-required-message="Slider Sub Title is required*" required>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row mb-4">
                                        <label class="col-form-label">Status</label>
                                        <div class="col-md-8">
                                            <select class="form-control selectric" name="status">
                                                <option value="">- SELECT STATUS -</option>
                                                @if (is_array(App\Inc\Settings::getGlobalStatus()))
                                                    @foreach (App\Inc\Settings::getGlobalStatus() as $statusKey => $statusName)
                                                        <option value="{{ $statusKey }}" {{ old('status') == $statusKey ? 'selected' : '' }}>
                                                            {{ $statusName }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">Create</button>
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
