@extends('template.base')

@section('javascript')
    $('document').ready(function()
    {
        var verified = false;

        setInterval(function()
        {
            if(verified != "1")
            {
                $.getJSON('/verify-company-status', function(data) {
                    console.log(data);
                    verified = data.verified;
                });
            }
            else
            {
                $('.verification-status').html("Verified");
            }

        }, 1000);
    });
@stop
@section('content')
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li class="active">Verify Company</li>
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
                                <li class="active"><a href="{{route('companies.create')}}"><i class="fa fa-home"></i><span>My Company</span></a></li>
                            </ul>
                        </aside>
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <header><h1>Verify Company</h1></header>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p>You will recieve a phone call shorty to the phone number you have specified for this business, please enter the verification code below when prompted.</p>
                            <h3>Verification Code: {{$company->verification_code}}</h3>
                            <h3>Verification Status: <span class="verification-status">Not Verified</span></h3>
                        </div><!-- /.col-md-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.col-md-9 -->
            <!-- end My Properties -->
        </div><!-- /.row -->
    </div>
@stop