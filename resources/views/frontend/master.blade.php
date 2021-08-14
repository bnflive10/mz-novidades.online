<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>MZ-Novidades</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{url('public/images/favicon.ico')}}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{url('public/images/apple-touch-icon.png')}}">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

<!-- Bootstrap core CSS -->
<link href="{{url('public/css/bootstrap.css')}}" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="{{url('public/css/font-awesome.min.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{url('public/css/style.css')}}" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="{{url('public/css/responsive.css')}}" rel="stylesheet">

<!-- Colors for this template -->
<link href="{{url('public/css/colors.css')}}" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="{{url('public/css/version/tech.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  </head>
  <body>
    <div class="loader">
        <img src="{{asset('public/images/rings.svg')}}"/>
    </div>
    
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0" nonce="Iv5LD1E4"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0" nonce="RQstHJPW"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0" nonce="OQ70kWrR"></script>
    <div id="wrapper">
        <header class="header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('')}}"><img src="{{url('public/settings')}}/{{$settings->image}}" alt="MZ-Novidades"></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notícias</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="container">
                                            <div class="mega-menu-content clearfix">
                                                <div class="tab">
                                                    <button class="tablinks active" onmouseover="openCategory(event, 'cat01')">Ciencia</button>
                                                    <button class="tablinks" onmouseover="openCategory(event, 'cat02')">Technologia</button>
                                                    <button class="tablinks" onmouseover="openCategory(event, 'cat03')">Saude</button>
                                                    <button class="tablinks" onmouseover="openCategory(event, 'cat04')">Educacao</button>
                                                    <button class="tablinks" onmouseover="openCategory(event, 'cat05')">Desporto</button>
                                                </div>

                                                <div class="tab-details clearfix">
                                                    
                                                    <div id="cat01" class="tabcontent active">
                                                        <div class="row">
                                                            @foreach($menuciencia as $key=>$ciencia)
                                                            @if($key < 4)
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="{{url('post')}}/{{$ciencia->slug}}" title="">
                                                                            <img src="{{url('public/posts')}}/{{$ciencia->image}}" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            @foreach(explode(',', $ciencia->category_id) as $cat)
                                                                            <span class="menucat">{{$cat}}</span>
                                                                            @endforeach
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="{{url('post')}}/{{$ciencia->slug}}" title="">{{$ciencia->title}}</a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>
                                                            @endif
                                                            @endforeach

                                                        </div><!-- end row -->
                                                    </div>
                                                    
                                                    <div id="cat02" class="tabcontent">
                                                        <div class="row">
                                                            @foreach($menutecnologia as $key=>$tecnologia)
                                                            @if($key < 4)
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="{{url('post')}}/{{$tecnologia->slug}}" title="">
                                                                            <img src="{{url('public/posts')}}/{{$tecnologia->image}}" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            @foreach(explode(',', $tecnologia->category_id) as $cat)
                                                                            <span class="menucat">{{$cat}}</span>
                                                                            @endforeach
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="{{url('post')}}/{{$tecnologia->slug}}" title="">{{$tecnologia->title}}</a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div><!-- end row -->
                                                    </div>
                                                    <div id="cat03" class="tabcontent">
                                                        <div class="row">
                                                            @foreach($menusaude as $key=>$saude)
                                                            @if($key < 4)
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="{{url('post')}}/{{$saude->slug}}" title="">
                                                                            <img src="{{url('public/posts')}}/{{$saude->image}}" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            @foreach(explode(',', $saude->category_id) as $cat)
                                                                            <span class="menucat">{{$cat}}</span>
                                                                            @endforeach
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="{{url('post')}}/{{$saude->slug}}" title="">{{$saude->title}}</a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>
                                                            @endif
                                                            @endforeach

                                                            
                                                        </div><!-- end row -->
                                                    </div>
                                                    <div id="cat04" class="tabcontent">
                                                        <div class="row">
                                                            @foreach($menueducacao as $key=>$educacao)
                                                            @if($key < 4)
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="{{url('post')}}/{{$educacao->slug}}" title="">
                                                                            <img src="{{url('public/posts')}}/{{$educacao->image}}" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            @foreach(explode(',', $educacao->category_id) as $cat)
                                                                            <span class="menucat">{{$cat}}</span>
                                                                            @endforeach
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="{{url('post')}}/{{$educacao->slug}}" title="">{{$educacao->title}}</a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>
                                                            @endif
                                                            @endforeach

                                                            
                                                        </div><!-- end row -->
                                                    </div>
                                                    <div id="cat05" class="tabcontent">
                                                        <div class="row">
                                                            @foreach($menudesporto->take(5) as $key=>$desporto)
                                                            
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="{{url('post')}}/{{$desporto->slug}}" title="">
                                                                            <img src="{{url('public/posts')}}/{{$desporto->image}}" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            @foreach(explode(',', $desporto->category_id) as $cat)
                                                                            <span class="menucat">{{$cat}}</span>
                                                                            @endforeach
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="{{url('post')}}/{{$desporto->slug}}" title="">{{$desporto->title}}</a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>
                                                            
                                                            @endforeach

                                                            
                                                        </div><!-- end row -->
                                                    </div>
                                                </div><!-- end tab-details -->
                                            </div><!-- end mega-menu-content -->
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('post')}}">Gadgets</a>
                            </li>                   
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('category-02')}}">Videos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('category-03')}}">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('contacto')}}">Contacto</a>
                            </li>
                        </ul>


                        <div>
                            <form class="searchbox">
        <input type="search" placeholder="Pesquisar......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
        <input type="submit" class="searchbox-submit" value="ir">
        <span class="searchbox-icon"><i class="fa fa-search"></i></span>
    </form>
                        </div>


                        <ul class="navbar-nav mr-2">
                            @foreach($settings->social as $key=>$social)
                            <li class="nav-item">
                                <a class="nav-link" href="{{$social}}"><i class="fa fa-{{$icons[$key]}}"></i></a>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->


        @yield('content')

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="footer-text text-left">
                                <a href="{{url('')}}"><img src="{{url('public/settings')}}/{{$settings->image}}" alt="" class="img-fluid"></a>
                                <p><b>MZ-Novidades</b> eh um blog de tecnologia e curiosidades , mostramos o que tem de mais recente no mercado, artigos sobre noticias e gadgets.</p>
                                <div class="social">
                                    @foreach($settings->social as $key=>$social)
                                    <a href="{{$social}}" data-toggle="tooltip" data-placement="bottom" title="{{$icons[$key]}}"><i class="fa fa-{{$icons[$key]}}"></i></a>
                                    @endforeach
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-left">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Categorias</h2>
                            @foreach($categories as $key=>$cat)
                            @if($key < 5)
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">{{$cat->title}}<span></span></a></li>
                                    </ul>
                            </div><!-- end link-widget -->
                            @endif
                            @endforeach
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Copyrights</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">Sobre Nos</a></li>
                                    <li><a href="#">Contacto</a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">&copy; Bnflive10 <a href="http://html.design">bnf-dev</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div ><a class="dmtop"><i class="fa fa-chevron-up"></i></a></div>


        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
        ================================================== -->
        <script src="{{url('public/js/jquery.min.js')}}"></script>
        <script src="{{url('public/js/tether.min.js')}}"></script>
        <script src="{{url('public/js/bootstrap.min.js')}}"></script>
        <script src="{{url('public/js/custom.js')}}"></script>
<script id="dsq-count-scr" src="//mz-novidades.disqus.com/count.js" async></script>

    </body>
    </html>