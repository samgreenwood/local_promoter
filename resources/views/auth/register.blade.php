@extends('template.base')

@section('bodyclass')
    inner-page
@stop

@section('content')
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Register</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- My Properties -->
                <div class="col-md-12 col-sm-12">
                    <section id="contact">
                        <header><h1>Register</h1></header>
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form role="form" id="form-create-account" method="post" >
                                <div class="form-group clearfix">
                                    <a style="background: #3b5998; color: white" class="btn pull-left btn-default" href="{{route('oauth.redirect', 'facebook')}}"><i class="fa fa-facebook">&nbsp;Login with Facebook</i></a>
                                    <a style="background: #c32f10; color: white" class="btn pull-right btn-red" href="{{route('oauth.redirect', 'google')}}"><i class="fa fa-google-plus">&nbsp;Login with Google</i></a>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="form-create-account-name">Name:</label>
                                    <input type="text" class="form-control" id="form-create-account-email" required>
                                </div>
                                <div class="form-group">
                                    <label for="form-create-account-email">Email:</label>
                                    <input type="email" class="form-control" id="form-create-account-email" required>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="form-create-account-email">Phone:</label>
                                    <input type="text" class="form-control" id="form-create-account-phone" required>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="form-create-account-password">Password:</label>
                                    <input type="password" class="form-control" id="form-create-account-password" required>
                                </div><!-- /.form-group -->
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn pull-right btn-default" id="account-submit">Register</button>
                                </div><!-- /.form-group -->
                            </form>
                            <hr>
                        </div>
                    </section><!-- /#profile -->
                </div><!-- /.col-md-9 -->
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@stop