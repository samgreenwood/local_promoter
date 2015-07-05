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
                <li class="active">Profile</li>
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
                                <li class="active"><a href="{{route('profile')}}"><i class="fa fa-user"></i><span>Profile</span></a></li>
                                <li><a href="{{route('companies.create')}}"><i class="fa fa-home"></i><span>My Company Profile</span></a></li>
                                @if(auth()->user()->company)
                                    <li><a href="{{route('company.dashboard', [auth()->user()->company])}}"><i class="fa fa-dollar"></i><span>My Company Statistics</span></a></li>
                                @endif
                            </ul>
                        </aside>
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <section id="profile">
                        <header><h1>Profile</h1></header>
                        <div class="account-profile">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img alt="" class="image" src="assets/img/agent-01.jpg">
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <form role="form" id="form-account-profile" method="post">
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <section id="contact">
                                            <h3>Contact</h3>
                                            <dl class="contact-fields">
                                                <dt><label for="form-account-name">Your Name:</label></dt>
                                                <dd><div class="form-group">
                                                        <input name="name" type="text" class="form-control" id="form-account-name" name="form-account-name" required="" value="{{$user->name}}">
                                                    </div><!-- /.form-group --></dd>
                                                <dt><label for="form-account-phone">Phone:</label></dt>
                                                <dd><div class="form-group">
                                                        <input name="phone" type="text" class="form-control" id="form-account-phone" name="form-account-phone" value="{{$user->phone}}">
                                                    </div><!-- /.form-group --></dd>
                                                <dt><label for="form-account-email">Email:</label></dt>
                                                <dd><div class="form-group">
                                                        <input name="email" type="text" class="form-control" id="form-account-email" name="form-account-phone" value="{{$user->email}}">
                                                    </div><!-- /.form-group --></dd>
                                            </dl>
                                        </section>
                                        <section id="about-me">
                                            <h3>About Me</h3>
                                            <div class="form-group">
                                                <textarea name="about_me" class="form-control" id="form-contact-agent-message" rows="5" name="form-contact-agent-message">{{$user->about_me}}</textarea>
                                            </div><!-- /.form-group -->
                                        </section>
                                        <section id="social">
                                            <h3>My Social Network</h3>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                                    <input readonly type="text" class="form-control" id="account-social-google" name="account-social-google" value="{{$user->google_id}}">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                                    <input readonly type="text" class="form-control" id="account-social-facebook" name="account-social-facebook" value="{{$user->facebook_id}}">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group clearfix">
                                                <button type="submit" class="btn pull-right btn-default" id="account-submit">Save Changes</button>
                                            </div><!-- /.form-group -->
                                        </section>
                                    </form><!-- /#form-contact -->
                                    <section id="change-password">
                                        <header><h2>Change Your Password</h2></header>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <form role="form" id="form-account-password" method="post">
                                                    <div class="form-group">
                                                        <label for="form-account-password-current">Current Password</label>
                                                        <input type="password" class="form-control" id="form-account-password-current" name="form-account-password-current">
                                                    </div><!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="form-account-password-new">New Password</label>
                                                        <input type="password" class="form-control" id="form-account-password-new" name="form-account-password-new">
                                                    </div><!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="form-account-password-confirm-new">Confirm New Password</label>
                                                        <input type="password" class="form-control" id="form-account-password-confirm-new" name="form-account-password-confirm-new">
                                                    </div><!-- /.form-group -->
                                                    <div class="form-group clearfix">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-default" id="form-account-password-submit">Change Password</button>
                                                    </div><!-- /.form-group -->
                                                </form><!-- /#form-account-password -->
                                            </div>
                                        </div>
                                    </section>
                                </div><!-- /.col-md-9 -->
                            </div><!-- /.row -->
                        </div><!-- /.account-profile -->
                    </section><!-- /#profile -->
                </div><!-- /.col-md-9 -->
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@stop