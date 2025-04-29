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

                                <form id="form" action="{{ route('admin.setting.update') }}" method="post" enctype="multipart/form-data" data-parsley-validate>

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $site_setting->id }}">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Header Logo</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="header_logo" id="image-upload" />
                                                <div class="table_slider_update_image" style="background-image: url({{ asset($site_setting->header_logo) }}); background-size: cover; background-position: center;" id="imageShow"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Footer Logo</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload-footer" id="image-label">Choose File</label>
                                                <input type="file" name="footer_logo" id="image-upload-footer" />
                                                <div class="table_slider_update_image" style="background-image: url({{ asset($site_setting->footer_logo) }}); background-size: cover; background-position: center;" id="imageShowFooter"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Copyright</label>
                                            <input type="text" class="form-control @error('copyright') is-invalid @enderror" name="copyright" value="{{ $site_setting->copyright }}" data-parsley-required-message="Site Copyright is required*" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Footer Text</label>
                                            <input type="text" class="form-control @error('footer_text') is-invalid @enderror" name="footer_text" value="{{ $site_setting->footer_text }}" data-parsley-required-message="Site Footer Text is required*" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" value="{{ $site_setting->facebook }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">YouTube</label>
                                            <input type="text" class="form-control" name="youtube" value="{{ $site_setting->youtube }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Linkedin</label>
                                            <input type="text" class="form-control" name="linkedin" value="{{ $site_setting->linkedin }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" value="{{ $site_setting->instagram }}">
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">Update</button>
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

            $('#image-upload-footer').change(function(e) {
                $('#imageShowFooter').css('background-image', `url(${URL.createObjectURL(e.target.files[0])})`);
            });
        });
    </script>

@endsection
