@extends('template.base')

@section('bodyclass')
inner-page
@stop

@section('javascriptFiles')
<script type="text/javascript" src="assets/js/company.js"></script>
@stop

@section('facebook')
<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1441174172857987',
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
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
                                <span class="search-count">{{$companies->count()}}</span>
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
                            @if(isset($company->productId))
                                    <div class="property" data-companyid="{{$company->productId}}">
                                        <!--<figure class="tag status">For Sale</figure>-->
                                        <figure class="type js-hide" title="Hide for today"><i class="fa fa-times"></i>&nbsp;&nbsp;</figure>
                                        <div class="property-image">
                                            <!--<figure class="ribbon">In Hold</figure>-->
                                            <a href="property-detail.html">

                                                <img alt="" src="{{$company->productImage}}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <header>
                                                <a href="property-detail.html"><h3>{{$company->productName}}</h3></a>
                                                @if(isset($company->addresses[0]))
                                                <figure>{{$company->addresses[0]->address_line}} {{$company->addresses[0]->city}} {{$company->addresses[0]->state}}</figure>
                                                @else
                                                    <figure></figure>
                                                @endif
                                            </header>
                                            <!--<div class="tag price">$ 38,000</div>-->
                                            <aside class="actions-holder">

                                                <div class="row">
                                                    <div class="col-md-12 question">
                                                        How likely are you to recommend {{$company->productName}} to a friend or colleague?
                                                    </div>
                                                </div>


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
                                @else
                                    <div class="property" data-companyid="{{$company->id}}">
                                        <!--<figure class="tag status">For Sale</figure>-->
                                        <figure class="type js-hide" title="Hide for today"><i class="fa fa-times"></i>&nbsp;&nbsp;</figure>
                                        <div class="property-image">
                                            <!--<figure class="ribbon">In Hold</figure>-->
                                            <a href="property-detail.html">

                                                <img alt="" src="https://maps.googleapis.com/maps/api/staticmap?center={{$company->getAddress()}}&zoom=13&size=260x195&maptype=roadmap&markers=color:red%7Clabel:%7C{{$company->lat}},{{$company->longitude}}&key=AIzaSyDAZv5-MhsbNQT8-5G6Z94vsMu24ubhY6E">
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
                                                    <div class="col-md-12 question">
                                                        How likely are you to recommend {{$company}} to a friend or colleague?
                                                    </div>
                                                </div>


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
                                @endif

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
                            <form role="form" id="form-sidebar" class="form-search" action="/search">
                                <div class="form-group">
                                    <input type="text" name="postcode" value="{{$postcode}}" placeholder="postcode"/>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <input type="text" name="business_name" value="{{$businessName}}" placeholder="Business Name"/>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <select name="country">
                                        <option value="">Category</option>
                                        <option value="1">France</option>
                                        <option value="2">Great Britain</option>
                                        <option value="3">Spain</option>
                                        <option value="4">Russia</option>
                                        <option value="5">United States</option>
                                    </select>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <select name="district">
                                        <option value="">Council Area</option>
                                        <option value="1">Manhattan</option>
                                        <option value="2">The Bronx</option>
                                        <option value="3">Brooklyn</option>
                                        <option value="4">Queens</option>
                                        <option value="5">Staten Island</option>
                                    </select>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Search Now</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->
                        <aside id="featured-properties">
                            <header><h3>Featured Businesses</h3></header>
                            @foreach ($featured as $company)
                            <div class="property small">
                                <a href="{{URL::route('company.show', [$company->id])}}">
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
                        </aside><!-- /#featured-properties -->

                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->

<script type="template" id="survery-step-2">
     <div class="row">
        <div class="col-md-12 question">
            Thankyou! Can you please tell us why you gave us a score of <span class="user-rating"></span>?
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                 <textarea class="form-control" id="form-contact-agent-message" rows="3" name="notes"></textarea>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <input type="hidden" name="rating_id"/>
            <input type="submit" class="btn btn-default js-submit" value="Submit"/>
        </div>
    </div>
</script>

<script type="template" id="survey-step-3">
     <div class="row">
            <div class="col-md-12 question">
                You've indicated that you're highly likely to recommend this business to a friend or colleague. Who would you like to <span data-trigger="hover" data-toggle="popover" title="Recommend a Business" data-placement="top" data-content="When you recommend a business we will be contacting the referral on your behalf.">recommend?</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 share">
                <a href="#" class="js-facebook-share">Share on <i class="fa fa-facebook"></i> Facebook</a>
            </div>
            <div class="col-md-6 share-email">
                <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Name" />
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="text" class="form-control" name="phone" placeholder="Mobile or Phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">@</div>
                      <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-right">
                    <input type="hidden" name="rating_id"/>
                    <input type="submit" class="btn btn-default js-share" value="Share"/>
                </div>
        </div>

</script>
@stop