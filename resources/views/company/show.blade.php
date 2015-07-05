@extends('template.base')

@section('bodyclass')
    inner-page
@stop

@section('javascriptFiles')
<script type="text/javascript" src="/assets/js/company.js"></script>
@stop

@section('content')
    <div class="container">
                <div class="row">
                    <!-- Agent Detail -->
                    <div class="col-md-9 col-sm-9">
                        <section id="agent-detail">

                            <header>
                                <h1>
                                    {{($type == 'tourism') ? $tourismCompany->productName : (($type == 'google') ? $googleCompany->name : $company)}}
                                </h1>
                            </header>
                            <section id="agent-info">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <figure class="agent-image">
                                         <img alt="" src="{{($type == 'tourism') ? $tourismCompany->productImage : (($type == 'google') ? $googleCompany->image : 'https://maps.googleapis.com/maps/api/staticmap?center='.$company->getAddress().'&zoom=13&size=189x189&maptype=roadmap&markers=color:red%7Clabel:%7C'.$company->lat.','.$company->longitude.'&key=AIzaSyDAZv5-MhsbNQT8-5G6Z94vsMu24ubhY6E')}}">
                                         </a>
                                         </figure>
                                    </div><!-- /.col-md-3 -->
                                    <div class="col-md-5 col-sm-5">
                                        <h3>Contact Info</h3>
                                        <dl>
                                            <dt>Phone:</dt>
                                            <dd>{{($type == 'tourism') ? $tourismCompany->comms_ph : (($type == 'google') ? $googleCompany->name : $company->phone)}}&nbsp;</dd>
                                            <dt>Mobile: &nbsp;</dt>
                                            <dd>{{($type == 'tourism') ? '' : (($type == 'google') ? $googleCompany->name : $company->mobile)}}&nbsp;</dd>
                                            <dt>Email:</dt>
                                            <dd><a href="mailto:{{($type == 'tourism') ? $tourismCompany->comms_em : (($type == 'google') ? $googleCompany->email : $company->email)}}">{{($type == 'tourism') ? $tourismCompany->comms_em : (($type == 'google') ? $googleCompany->name : $company->email)}}</a></dd>
                                        </dl>
                                    </div><!-- /.col-md-5 -->
                                    <div class="col-md-4 col-sm-4">
                                        <h3>Description</h3>
                                        <p>{{($type == 'tourism') ? '' : (($type == 'google') ? $googleCompany->name : $company->description)}}</p>
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-5 col-sm-offset-3 col-sm-5">
                                        <h3>Address</h3>
                                            @if ($type == 'tourism')
                                                @if(isset($tourismCompany->addresses[0]))
                                                    <dl>
                                                        <dt>Address Line</dt>
                                                        <dd>{{$tourismCompany->addresses[0]->address_line}}</dd>
                                                        <dt>City</dt>
                                                        <dd>{{$tourismCompany->addresses[0]->city}}</dd>
                                                        <dt>State</dt>
                                                        <dd>{{$tourismCompany->addresses[0]->state}}</dd>
                                                    </dl>
                                                @endif
                                            @else
                                                 <dl>
                                                    <dt>Address Line</dt>
                                                    <dd>{{$company->adress1}}</dd>
                                                    <dt>Address Line 2</dt>
                                                    <dd>{{$company->adress2}}</dd>
                                                    <dt>City</dt>
                                                    <dd>{{$company->town}}</dd>
                                                    <dt>Postcode</dt>
                                                    <dd>{{$company->postcode}}</dd>
                                                </dl>
                                            @endif


                                    </div><!-- /.col-md-5 -->
                                    <div class="col-md-4 col-sm-4">
                                        <h3>Is this your business?</h3>
                                        <a class='btn btn-default' href="{{URL::route('company.edit', [$company->id])}}">Manage this page</a>
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->
                            </section><!-- /#agent-info -->
                            <hr class="thick">
                            <section id="agent-properties">
                                <header><h3>Survey</h3></header>
                                  <div class="property" data-companyid="{{$company->productId}}">
                                <aside class="actions-holder">

                                    <div class="row">
                                        <div class="col-md-12 question">
                                            How likely are you to recommend {{($type == 'tourism') ? $tourismCompany->productName : (($type == 'google') ? $googleCompany->name : $company)}} to a friend or colleague?
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
                                </div>
                            </section><!-- /#agent-properties -->
                            <hr class="thick">
                            <div class="row">
                                <div class="col-md-12">
                                    <section id="agent-testimonials">
                                        <h3>What Other Said About Me</h3>
                                        <div class="owl-carousel testimonials-carousel">
                                             @foreach ($testimonials as $surveyResult)
                                                <blockquote class="testimonial">
                                                    <figure>
                                                        <div class="">
                                                            <img src="/assets/img/megaphone.png" alt=""/>
                                                        </div>
                                                    </figure>
                                                    <aside class="cite">
                                                        <p>{{$surveyResult->note}}</p>
                                                        <footer>{{$surveyResult->user}}</footer>
                                                    </aside>
                                                </blockquote>
                                                @endforeach
                                        </div><!-- /.testimonials-carousel -->
                                    </section><!-- /#agent-testimonial -->
                                </div><!-- /.col-md-5 -->

                            </div><!-- /.row -->
                        </section><!-- /#agent-detail -->
                    </div><!-- /.col-md-9 -->
                    <!-- end Agent Detail -->

                    <!-- sidebar -->
                    <div class="col-md-3 col-sm-3">
                        <section id="sidebar">
                                                <aside id="edit-search">
                                                    <header><h3>Search Businesses</h3></header>
                                                    <form role="form" id="form-sidebar" class="form-search" action="/search">
                                                        <div class="form-group">
                                                            <input type="text" name="postcode" value="" placeholder="postcode"/>
                                                        </div><!-- /.form-group -->
                                                        <div class="form-group">
                                                            <input type="text" name="business_name" value="" placeholder="Business Name"/>
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
                <a href="#" class="js-facebook-share">Share with facebook</a>
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

