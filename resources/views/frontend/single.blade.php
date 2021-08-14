@extends('frontend.master')
@section('content')

<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">{{$data->slug}}</li>
                        </ol>
                        @foreach(explode(',', $data->category_id) as $cat)
                        @endforeach
                        <span class="color-orange"><a href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></span>
                        <h3>{{$data->title}}</h3>

                        <div class="blog-meta big-meta">
                            <small><a href="single" title="">
                                @php


                                $data1 = \Carbon\Carbon::parse($data->created_at);
                                $formatter = new IntlDateFormatter('pt_BR',
                                IntlDateFormatter::LONG,
                                IntlDateFormatter::NONE,
                                'America/Sao_Paulo',          
                                IntlDateFormatter::GREGORIAN);
                                echo $formatter->format($data1);
                                @endphp
                            </a></small>
                            <small><a href="author" title="">by Jessica</a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><div class="fb-share-button" data-href="{{url('post')}}/{{$data->slug}}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('post')}}/{{$data->slug}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a></div></li>
                                <!-- <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li> -->
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <div class="blog-content">  
                        <div class="pp">
                            {!!($data->description)!!}

                        </div><!-- end pp -->

                    </div><!-- end content -->
                    </div><!-- end media -->

                    

                    <div class="blog-title-area">
                        <div class="tag-cloud-single">
                            <span>Tags</span>
                            @foreach(explode(',', $data->category_id) as $cat)
                            <small><a href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></small>
                            @endforeach
                            
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><div class="fb-share-button" data-href="{{url('post')}}/{{$data->slug}}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('post')}}/{{$data->slug}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a></div></li>
                                <!-- <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li> -->
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->
                    <div class="custombox authorbox clearfix">
                        <h4 class="small-title">About author</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <img src="{{url('public/upload/author.jpg')}}" alt="" class="img-fluid rounded-circle"> 
                            </div><!-- end col -->

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <h4><a href="#">Jessica</a></h4>
                                <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                <div class="topsocial">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                </div><!-- end social -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{url('public/upload/anuncio.jpg')}}" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">
                    <!--<div class="custombox clearfix">
                        <h4 class="small-title">Comentarios</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="fb-comments" data-href="{{url('post')}}/{{$data->slug}}" data-width="" data-numposts="5"></div>
                                
                            </div>
                        </div>
                    </div>-->

                    <div id="disqus_thread"></div>
<script>
    
    var disqus_config = function () {
    this.page.url = "{{url('post')}}/{{$data->slug}}";  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://mz-novidades.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <div class="custombox prevnextpost clearfix">
                        <div class="row">
                            @if(isset($prev->pid))
                            <div class="col-lg-6">
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="{{url('post')}}/{{$prev->slug}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{url('public/posts')}}/{{$prev->image}}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$prev->title}}</h5>
                                                <small>Post Anterior</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endif
                            @if(isset($next->pid))
                            <div class="col-lg-6">
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="{{url('post')}}/{{$next->slug}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{url('public/posts')}}/{{$next->image}}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$next->title}}</h5>
                                                <small>Proximo Post</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endif
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    

                    <div class="custombox clearfix">
                        <h4 class="small-title">Posts relacionados</h4>
                        <div class="row">
                            @foreach($related->take(2) as $key=>$rel)
                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{url('post')}}/{{$rel->slug}}" title="">
                                            <img src="{{url('public/posts')}}/{{$rel->image}}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="{{url('post')}}/{{$rel->slug}}" title="">{{$rel->title}}</a></h4>
                                        @foreach(explode(',', $rel->category_id) as $cat)
                                        <small><a href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></small>
                                        @endforeach
                                        <small><a href="blog-category-01" title="">21 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    

                    <hr class="invis1">

                    
                </div><!-- end page-wrapper -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="{{url('public/upload/clique-aqui.png')}}" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Posts Populares</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($populares->take(5) as $key=>$popular)

                                <a href="{{url('post')}}/{{$popular->slug}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{url('public/posts')}}/{{$popular->image}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{$popular->title}}</h5>
                                        <small>
                                            @php
                                            $data1 = \Carbon\Carbon::parse($popular->created_at);
                                            $formatter = new IntlDateFormatter('pt_BR',
                                            IntlDateFormatter::LONG,
                                            IntlDateFormatter::NONE,
                                            'America/Sao_Paulo',          
                                            IntlDateFormatter::GREGORIAN);
                                            echo $formatter->format($data1);
                                            @endphp
                                        </small>
                                    </div>
                                </a>

                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->



                    <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>

                        <div class="row text-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                    <p>27k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                    <p>98k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button google-button">
                                    <i class="fa fa-google-plus"></i>
                                    <p>17k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                    <p>22k</p>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->

                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="{{url('public/upload/Banner-anuncie-aqui.jpg')}}" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@stop