@extends('template.base')

@section('javascriptFiles')
<script type="text/javascript" src="assets/js/company.js"></script>
@stop

@section('content')
<!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Business Listing</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                        <header><h1>Business Listing</h1></header>
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Search Results:</h3>
                                <span class="search-count">{{$companies->total()}}</span>
                                <div class="sorting">
                                    <div class="form-group">
                                        <select name="sorting">
                                            <option value="">Sort By</option>
                                            <option value="1">Distance</option>
                                            <option value="2">Rating</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                            </figure>
                        </section>
                        <section id="properties" class="display-lines">
                        @foreach ($companies as $company)
                            <div class="property" data-companyid="{{$company->id}}">
                                <!--<figure class="tag status">For Sale</figure>-->
                                <figure class="type js-hide" title="Hide for today"><i class="fa fa-times"></i>&nbsp;&nbsp;</figure>
                                <div class="property-image">
                                    <!--<figure class="ribbon">In Hold</figure>-->
                                    <a href="property-detail.html">
                                        <img alt="" src="assets/img/properties/property-01.jpg">
                                    </a>
                                </div>
                                <div class="info">
                                    <header>
                                        <a href="property-detail.html"><h3>{{$company}}</h3></a>
                                        <figure>{{$company->getAddress()}}</figure>
                                    </header>
                                    <!--<div class="tag price">$ 38,000</div>-->
                                    <aside class="actions-holder">
                                        <div class="row">
                                            <div class="col-md-12">
                                            How likely are you to recommend {{$company}} to a friend or colleague?
                                            </div>
                                        </div>

                                        <br/>
                                        <div class="rating-holder">
                                            <div class="rating">0</div>
                                            <div class="rating">1</div>
                                            <div class="rating">2</div>
                                            <div class="rating">3</div>
                                            <div class="rating">4</div>
                                            <div class="rating">5</div>
                                            <div class="rating">6</div>
                                            <div class="rating">7</div>
                                            <div class="rating">8</div>
                                            <div class="rating">9</div>
                                            <div class="rating">10</div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col-xs-6 text-left">0 - Not likely</div>
                                            <div class="col-xs-6 text-right">10 - Very likely</div>
                                        </div>
                                    </aside>
                                    <!--<a href="property-detail.html" class="link-arrow">Read More</a>-->
                                </div>
                            </div><!-- /.property -->
                            @endforeach







                            <!-- Pagination -->
                            <div class="center">
                                {!! $companies->render() !!}
                            </div><!-- /.center-->
                        </section><!-- /#properties-->
                    </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
                <!-- end Results -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h3>Search Businesses</h3></header>
                            <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                                <div class="form-group">
                                    <select name="type">
                                        <option value="">Status</option>
                                        <option value="1">Rent</option>
                                        <option value="2">Sale</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="country">
                                        <option value="">Country</option>
                                        <option value="1">France</option>
                                        <option value="2">Great Britain</option>
                                        <option value="3">Spain</option>
                                        <option value="4">Russia</option>
                                        <option value="5">United States</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="city">
                                        <option value="">City</option>
                                        <option value="1">New York</option>
                                        <option value="2">Los Angeles</option>
                                        <option value="3">Chicago</option>
                                        <option value="4">Houston</option>
                                        <option value="5">Philadelphia</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="district">
                                        <option value="">District</option>
                                        <option value="1">Manhattan</option>
                                        <option value="2">The Bronx</option>
                                        <option value="3">Brooklyn</option>
                                        <option value="4">Queens</option>
                                        <option value="5">Staten Island</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="property-type">
                                        <option value="">Property Type</option>
                                        <option value="1">Apartment</option>
                                        <option value="2">Condominium</option>
                                        <option value="3">Cottage</option>
                                        <option value="4">Flat</option>
                                        <option value="5">House</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <div class="price-range">
                                        <input id="price-input" type="text" name="price" value="0;10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Search Now</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->
                        <aside id="featured-properties">
                            <header><h3>Featured Businesses</h3></header>
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/properties/property-06.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>2186 Rinehart Road</h4></a>
                                    <figure>Doral, FL 33178 </figure>
                                    <div class="tag price">$ 72,000</div>
                                </div>
                            </div><!-- /.property -->
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/properties/property-09.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>2479 Murphy Court</h4></a>
                                    <figure>Minneapolis, MN 55402</figure>
                                    <div class="tag price">$ 36,000</div>
                                </div>
                            </div><!-- /.property -->
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/properties/property-03.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>1949 Tennessee Avenue</h4></a>
                                    <figure>Minneapolis, MN 55402</figure>
                                    <div class="tag price">$ 128,600</div>
                                </div>
                            </div><!-- /.property -->
                        </aside><!-- /#featured-properties -->
                        <aside id="our-guides">
                            <header><h3>Our Guides</h3></header>
                            <a href="#" class="universal-button">
                                <figure class="fa fa-home"></figure>
                                <span>Buying Guide</span>
                                <span class="arrow fa fa-angle-right"></span>
                            </a><!-- /.universal-button -->
                            <a href="#" class="universal-button">
                                <figure class="fa fa-umbrella"></figure>
                                <span>Right Insurance for You</span>
                                <span class="arrow fa fa-angle-right"></span>
                            </a><!-- /.universal-button -->
                        </aside><!-- /#our-guide -->
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->

@stop