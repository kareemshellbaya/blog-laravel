@extends('front.layouts.app')

@section('content')

        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                        <h2><i class="fa fa-leaf bg-green"></i> Category by: {{ $category->translate(LaravelLocalization::getCurrentLocale())->title }} </h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">Gardening</li>
                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">

                                @foreach ( $category->posts as $post  )

                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="garden-single.html" title="">
                                                <img src="{{ $post->image }}" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->
                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="garden-category.html" title="">{{ $post->translate(LaravelLocalization::getCurrentLocale())->title }}</a></span>
                                        <h4><a href="garden-single.html" title="">{{ $post->translate(LaravelLocalization::getCurrentLocale())->title }}</a></h4>
                                        <p>{!! $post->translate(LaravelLocalization::getCurrentLocale())->content!!}</p>
                                        <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                        <small><a href="garden-single.html" title="">{{ $post->created_at->format('M.j:s , Y') }}</a></small>
                                        <small><a href="#" title="">{{ $post->user->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            @endforeach



                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="{{ asset('front_assets/upload/banner_05.jpg') }}" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->



                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->


                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        @foreach ( $category->posts as $post  )
                                        <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="upload/garden_sq_09.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $post->translate(LaravelLocalization::getCurrentLocale())->title }}</h5>
                                                <small>{{ $post->created_at->format('M.j:s , Y')}}</small>
                                            </div>
                                        </a>
                                        @endforeach

                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->




                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    @foreach ( $categories as $cat )
                                    <ul>
                                        <li><a href=" {{ route('categories.show' , [$cat->id]) }}"> {{ $cat->translate(LaravelLocalization::getCurrentLocale())->title }} <span>({{ $cat->posts->count() }})</span></a></li>
                                    </ul>
                                    @endforeach
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection
