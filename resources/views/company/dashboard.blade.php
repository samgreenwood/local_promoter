@extends('template.base')

@section('bodyclass')
    inner-page
@stop

@section('content')
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li class="active">Company Statistics</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-3 col-sm-2">
                    <section id="sidebar">
                        <header><h3>Account</h3></header>
                        <aside>
                            <ul class="sidebar-navigation">
                                <li><a href="{{route('profile')}}"><i class="fa fa-user"></i><span>Profile</span></a></li>
                                <li><a href="{{route('companies.create')}}"><i class="fa fa-home"></i><span>My Company</span></a></li>
                                @if(auth()->user()->company)
                                    <li class="active"><a href="{{route('company.dashboard')}}"><i class="fa fa-dollar"></i><span>My Company Statistics</span></a></li>
                                @endif
                            </ul>
                        </aside>
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <header><h1>My Company Statistics</h1></header>
                    <h3>Referals</h3>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>Name</th>
                                <th>Facebook</th>
                                <th>Email</th>
                                <th>Phone</th>
                                </thead>
                                <tbody>
                                @foreach($referrals as $referral)
                                    <tr>
                                        <td>{{$referral->first_name}} {{$referral->surname}}</td>
                                        <td>{{$referral->facebook}}</td>
                                        <td><a href="mailto:{{$referral->email}}">{{$referral->email}}</a></td>
                                        <td><a href="tel:{{$referral->phone}}">{{$referral->phone}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h3>Net Promoter</h3>
                    <hr/>
                    <div class="row">
                        <div class="col-md-2 col-sm-6"><div class="circle-tile"> <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-star fa-fw fa-3x"></i></div></a><div class="circle-tile-content dark-blue"><div class="circle-tile-description text-faded"> NPS</div><div class="circle-tile-number text-faded ">{{$company->getNetPromoterScore()}}</div> <a class="circle-tile-footer" href="#">{{$company->surveyResults()->count()}} Surveys</a></div></div></div>
                        <div class="col-md-10">
                            <h3>Survey Results</h3>
                            <hr/>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($surveyResults as $surveyResult)
                                    <tr>
                                        <td>{{$surveyResult->user}}</td>
                                        <td>{{$surveyResult->rating}}</td>
                                        <td>{{$surveyResult->note}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.col-md-9 -->
            <!-- end My Properties -->
        </div><!-- /.row -->
    </div>
@stop