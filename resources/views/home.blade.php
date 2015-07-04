@extends('template.base')

@section('content')

    <div class="container">
        <div class="geo-location-wrapper">
            <span class="btn geo-location"><i class="fa fa-map-marker"></i><span class="text">Find My Position</span></span>
        </div>
    </div>

    <!-- Map -->
    <div id="map" class="has-parallax"></div>
    <!-- end Map -->

    <!-- Search Box -->
    <div class="search-box-wrapper">
        <div class="search-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="search-box map">
                            <form role="form" id="form-map" class="form-map form-search">
                                <h2>Promote Local Business</h2>
                                <div class="form-group">
                                    <input type="text" name="postcode" placeholder="Postcode"/>
                                </div><!-- /.form-group -->


                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Search Now</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </div><!-- /.search-box.map -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.search-box-inner -->
    </div>
    <!-- end Search Box -->

    <!-- Page Content -->
    <div id="page-content">
        <section id="banner">
            <div class="block has-dark-background background-color-default-darker center text-banner">
                <div class="container">
                    <h1 class="no-bottom-margin no-border">Local Promoter - Promoting Local Business</a>!</h1>
                </div>
            </div>
        </section><!-- /#banner -->

        <section id="our-services" class="block">
            <div class="container">
                <header class="section-title"><h2>Recent Rewards</h2></header>
                <div class="row">
                    @foreach ($userRewards as $reward)
                        <div class="col-md-4 col-sm-4">
                            <div class="feature-box equal-height">
                                <figure class="icon"><i class="fa fa-money"></i></figure>
                                <aside class="description">
                                    <header><h3>{{$reward->company}}</h3></header>
                                    <ps>{{$reward->reward}}</p>
                                    <a href="#" class="link-arrow">{{$reward->user}}</a>
                                </aside>
                            </div><!-- /.feature-box -->
                        </div><!-- /.col-md-4 -->

                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#our-services -->

        <aside id="advertising" class="block">
            <div class="container">
                <a href="{{URL::route('company.create')}}">
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">Do you want your business to be listed here?</span>
                            <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>
                        </div>
                    </div><!-- /.banner-->
                </a>
            </div>
        </aside><!-- /#adveritsing-->

        <section id="new-properties" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>Local Businesses around you</h2>
                    <a href="/search" class="link-arrow">Search</a>
                </header>
                <div class="row">
                    @foreach ($companies as $company)
                    <div class="col-md-3 col-sm-6">
                        <div class="property">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-09.jpg">
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <div class="tag price">{{$company}}</div>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            {{$company->getAddress()}}
                                        </li>

                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
                    @endforeach

                </div><!-- /.row-->
            </div><!-- /.container-->
        </section><!-- /#new-properties-->
        <section id="testimonials" class="block">
            <div class="container">
                <header class="section-title"><h2>Testimonials</h2></header>
                <div class="owl-carousel testimonials-carousel">
                    <blockquote class="testimonial">
                        <figure>
                            <div class="image">
                                <img alt="" src="assets/img/client-01.jpg">
                            </div>
                        </figure>
                        <aside class="cite">
                            <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                            <footer>Natalie Jenkins</footer>
                        </aside>
                    </blockquote>
                    <blockquote class="testimonial">
                        <figure>
                            <div class="image">
                                <img alt="" src="assets/img/client-01.jpg">
                            </div>
                        </figure>
                        <aside class="cite">
                            <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                            <footer>Natalie Jenkins</footer>
                        </aside>
                    </blockquote>
                </div><!-- /.testimonials-carousel -->
            </div><!-- /.container -->
        </section><!-- /#testimonials -->
        <section id="partners" class="block">
            <div class="container">
                <header class="section-title"><h2>Our Partners</h2></header>
                <div class="logos">
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
    </div>
    <!-- end Page Content -->
    <!-- Page Footer -->
@stop