@php
    $projects = App\Models\Project::get();
@endphp
<style>
    .hover-text span, p{
        color: #fff !important;
    }
</style>
<section class="project-style-two" style="background: #fff">
    <div class="container">
        <div class="sec-title centred">
            <h1>Industry Project</h1>
        </div>
        <div class="row">
            @foreach ($projects as $key => $project)
            <div class="col-lg-4 col-md-6 col-sm-12 project-block">
                <div class="project-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset($project->project_image) }}" alt="{{ $project->project_title }}">
                            </figure>
                            <a href="{{ asset($project->project_image) }}" class="lightbox-image"
                                data-fancybox="gallery"><i class="flaticon-add"></i></a>
                        </div>
                        <div class="lower-content">
                            <div class="count-number">{{ $key + 1 }}</div>
                            <h3><a href="#">{{ $project->project_title }}</a></h3>
                            <div class="text-light text-justify hover-text">
                                {!! $project->project_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>