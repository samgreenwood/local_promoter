<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css">

    <link rel="stylesheet" href="/assets/css/custom.css" type="text/css">

    <title>Local Promoter</title>

</head>

<body class="page-homepage navigation-fixed-top map-google loaded @yield('bodyclass')" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">

@yield('facebook')
<!-- Wrapper -->
<div class="wrapper">

    <div class="navigation">
     @include('template.menu')
    </div><!-- /.navigation -->
    <div id="page-content">
        @section('content')

        @show
    </div>

    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>About Us</h3>
                                <p>Vel fermentum ipsum. Suspendisse quis molestie odio. Interdum et malesuada fames ac ante ipsum
                                    primis in faucibus. Quisque aliquet a metus in aliquet. Praesent ut turpis posuere, commodo odio
                                    id, ornare tortor
                                </p>
                                <hr>
                                <a href="#" class="link-arrow">Read More</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Featured Businesses</h3>
                                @foreach ($featured as $company)
                                <div class="property small">
                                    <a href="#">
                                        <div class="property-image">
                                            <img alt="" src="https://maps.googleapis.com/maps/api/staticmap?center={{$company->getAddress()}}&zoom=13&size=100x75&maptype=roadmap&markers=color:red%7Clabel:%7C{{$company->lat}},{{$company->longitude}}&key=AIzaSyDAZv5-MhsbNQT8-5G6Z94vsMu24ubhY6E">
                                        </div>
                                    </a>
                                    <div class="info">
                                        <a href="property-detail.html"><h4>{{$company}}</h4></a>
                                        <figure>{{$company->getAddress()}}</figure>
                                        <div class="tag price">9</div>
                                    </div>
                                </div><!-- /.property -->
                               @endforeach
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Contact</h3>
                                <address>
                                    <strong>Local Promoter</strong><br>
                                    Level 1, 147 Pirie St<br>
                                    Adelaide, SA 5000
                                </address>
                                +61 (08) 7444 4899<br>
                                <a href="mailto:hello@localpromoter.com.au">hello@localpromoter.com</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Useful Links</h3>
                                <ul class="list-unstyled list-links">
                                    <li><a href="{{route('company.index')}}">All Businesses</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="{{route('login')}}">Login and Register Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="{{route('terms')}}">Terms and Conditions</a></li>
                                </ul>
                            </article>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © {{date('Y')}} Local Promoter</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
</div>

<script type="text/javascript" src="/assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="/assets/js/markerwithlabel_packed.js"></script>
<script type="text/javascript" src="/assets/js/infobox.js"></script>
<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="/assets/js/icheck.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="/assets/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="/assets/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="/assets/js/tmpl.js"></script>
<script type="text/javascript" src="/assets/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="/assets/js/draggable-0.1.js"></script>
<script type="text/javascript" src="/assets/js/jquery.slider.js"></script>
<script type="text/javascript" src="/assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript" src="/assets/js/custom-map.js"></script>
<script type="text/javascript" src="/assets/js/custom.js"></script>

@yield('javascriptFiles')
<!--[if gt IE 8]>
<script type="text/javascript" src="/assets/js/ie.js"></script>
<![endif]-->
<script type="text/javascript">
    _latitude = -34.9290;
    _longitude = 138.6010;
    createHomepageGoogleMap(_latitude,_longitude);
    $(window).load(function(){
        initializeOwl(false);
    });

    @if (!\Auth::guest())
        window.userId = '{{\Auth::user()->id}}';
    @endif

    window.token = '{{csrf_token()}}';

    @section('javascript')

    @show
</script>
</body>
</html>