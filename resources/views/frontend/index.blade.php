
@extends('frontend.master')
@section('content')

<section class="section first-section">
    <div class="container-fluid">
        @if(count($featured) > 0)
        <div class="masonry-blog clearfix">
            @foreach($featured as $key=>$f)
            @if($key == 0)
            <div class="first-slot">
                <div class="masonry-box post-media">
                 <a href="{{url('post')}}/{{$f->slug}}"><img src="{{url('public/posts')}}/{{$f->image}}" alt="" class="img-fluid"></a>
                 <div class="shadoweffect">
                    <div class="shadow-desc">
                        <div class="blog-meta">
                            @foreach(explode(',', $f->category_id) as $cat)
                            <span class="bg-orange"><a href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></span>
                            @endforeach
                            <h4><a href="{{url('post')}}/{{$f->slug}}" title="">{{$f->title}}</a></h4>
                            <small><a href="{{url('post')}}/{{$f->slug}}" title="">
                                @php


                                $data1 = \Carbon\Carbon::parse($f->created_at);
                                $formatter = new IntlDateFormatter('pt_BR',
                                IntlDateFormatter::LONG,
                                IntlDateFormatter::NONE,
                                'America/Sao_Paulo',          
                                IntlDateFormatter::GREGORIAN);
                                echo $formatter->format($data1);
                                @endphp
                            </a></small>
                            <small><a href="author" title="">by bnflive10</a></small>
                        </div><!-- end meta -->
                    </div><!-- end shadow-desc -->
                </div><!-- end shadow -->
            </div><!-- end post-media -->
        </div><!-- end first-side -->
        @endif
        @endforeach

        @foreach($featured as $key=>$f)
        @if($key > 0 && $key < 5)
        <div class="second-slot">
            <div class="masonry-box post-media">
             <a href="{{url('post')}}/{{$f->slug}}"><img src="{{url('public/posts')}}/{{$f->image}}" alt="" class="img-fluid"></a>
             <div class="shadoweffect">
                <div class="shadow-desc">
                    <div class="blog-meta">

                        @foreach(explode(',', $f->category_id) as $cat)
                        <span class="bg-orange"><a href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></span>
                        @endforeach

                        <h4><a href="{{url('post')}}/{{$f->slug}}" title="">{{$f->title}}</a></h4>
                        <small><a href="post" title="">
                            @php
                            

                            $data1 = \Carbon\Carbon::parse($f->created_at);
                            $formatter = new IntlDateFormatter('pt_BR',
                            IntlDateFormatter::LONG,
                            IntlDateFormatter::NONE,
                            'America/Sao_Paulo',          
                            IntlDateFormatter::GREGORIAN);
                            echo $formatter->format($data1);
                            @endphp
                        </a></small>
                        <small><a href="author" title="">by bnflive10</a></small>
                    </div><!-- end meta -->
                </div><!-- end shadow-desc -->
            </div><!-- end shadow -->
        </div><!-- end post-media -->
    </div><!-- end second-side -->
    @endif
    @endforeach
</div><!-- end masonry -->
@endif
</div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                @if(count($data) > 0)
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">
                        @foreach($data as $key=>$dat)
                        @if($key < 3)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{url('post')}}/{{$dat->slug}}" title="">
                                        <img src="{{url('public/posts')}}/{{$dat->image}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{url('post')}}/{{$dat->slug}}" title="">{{$dat->title}}</a></h4>
                                <p>{!! \Illuminate\Support\Str::words(strip_tags($dat->description), 27, $end='...') !!}</p>

                                @foreach(explode(',', $dat->category_id) as $cat)
                                <small class="firstsmall"><a class="bg-orange" href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></small>
                                @endforeach

                                <small><a href="post" title="">A 
                                    @php
                                    $data1 = \Carbon\Carbon::parse($dat->created_at);
                                    $data2 = \Carbon\Carbon::parse(\Carbon\Carbon::now());
                                    $diff = $data2->diff($data1);
                                    $diffByType = [
                                    "Anos" => $diff->format("%y"),
                                    "Meses" => $diff->format("%m"),
                                    "dias" => $diff->format("%d"),
                                    "horas" => $diff->format("%h"),
                                    "minutos" => $diff->format("%i")
                                    ];
                                    $output = [];
                                    foreach ($diffByType as $type => $diff) {
                                        if ($diff != 0) {
                                            $output[] = $diff." ".$type;
                                        }
                                    }
                                    echo implode(", ", $output);
                                    @endphp
                                </a></small>
                                <small><a href="author" title="">by bnflive10</a></small>
                                <small><a href="post" title=""><i class="fa fa-eye"></i> 1114</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        <hr class="invis">
                        @endif
                        @endforeach

                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="{{url('public/upload/anuncio.jpg')}}" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis">

                        @foreach($data as $key=>$dat)
                        @if($key > 2 && $key <10)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{url('post')}}/{{$dat->slug}}" title="">
                                        <img src="{{url('public/posts')}}/{{$dat->image}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{url('post')}}/{{$dat->slug}}" title="">{{$dat->title}}</a></h4>
                                <p>
                                    {!! \Illuminate\Support\Str::words(strip_tags($dat->description), 27, $end='...') !!}</p>

                                    @foreach(explode(',', $dat->category_id) as $cat)
                                    <small class="firstsmall"><a class="bg-orange" href="{{url('categoria')}}/{{$cat}}" title="">{{$cat}}</a></small>
                                    @endforeach
                                    <small><a href="{{url('post')}}/{{$dat->slug}}" title="">A 
                                        @php
                                        $data1 = \Carbon\Carbon::parse($dat->created_at);
                                        $data2 = \Carbon\Carbon::parse(\Carbon\Carbon::now());
                                        $diff = $data2->diff($data1);
                                        $diffByType = [
                                        "Anos" => $diff->format("%y"),
                                        "Meses" => $diff->format("%m"),
                                        "dias" => $diff->format("%d"),
                                        "horas" => $diff->format("%h"),
                                        "minutos" => $diff->format("%i")
                                        ];
                                        $output = [];
                                        foreach ($diffByType as $type => $diff) {
                                            if ($diff != 0) {
                                                $output[] = $diff." ".$type;
                                            }
                                        }
                                        echo implode(", ", $output);
                                        @endphp
                                    </a></small>
                                    <small><a href="author" title="">by bnflive10</a></small>
                                    <small><a href="{{url('post')}}/{{$dat->slug}}" title=""><i class="fa fa-eye"></i> 4441</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                            @endif
                            @endforeach


                        </div><!-- end blog-list -->

                    </div><!-- end page-wrapper -->
                    @endif

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                {{ $data->links() }}
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
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
                            <h2 class="widget-title">Siga-nos</h2>

                            <div class="fb-page" data-href="https://web.facebook.com/mznovidades" data-tabs="timeline" data-width="" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://web.facebook.com/mznovidades" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/mznovidades"></a></blockquote></div>

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