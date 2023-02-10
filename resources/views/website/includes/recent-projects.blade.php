<!-- Recent Projects Carousel Start -->
@if(!$recent_projects->isEmpty())
<section class="projects section_padding" style="background: #e8e8e8;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="section_tittle">
                    <h2>Recent Completed Project</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="owl-items" class="owl-carousel">
                    @foreach($recent_projects as $project)
                        <div class="item">
                            <div class="projects_item m-1">
                                <img src="{{ asset($project->resize_image_path.$project->image) }}" alt="project">
                                <div class="projects_item_content">
                                    <h3 class="title">{{ $project->project_name }}</h3>
                                    <span class="post">{{ $project->address }}</span>
                                </div>
                                <ul class="icon">
                                    <li><a href="{{ asset($project->original_image_path.$project->image) }}" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                    </li>
                                    <li><a href="{{ url('/project/'.$project->id) }}"><i class="fa fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Recent Projects Carousel Start -->
