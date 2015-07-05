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
                            @if(Session::has('errors'))
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/register" role="form" id="form-create-account" method="post" >
                                <div class="form-group clearfix">
                                    <a style="background: #3b5998; color: white" class="btn pull-left btn-default" href="{{route('oauth.redirect', 'facebook')}}"><i class="fa fa-facebook">&nbsp;Login with Facebook</i></a>
                                    <a style="background: #c32f10; color: white" class="btn pull-right btn-red" href="{{route('oauth.redirect', 'google')}}"><i class="fa fa-google-plus">&nbsp;Login with Google</i></a>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="form-create-account-name">Name:</label>
                                    <input name="name" type="text" class="form-control" id="form-create-account-email" value="{{\Input::old('name')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="form-create-account-email">Email:</label>
                                    <input name="email" type="email" class="form-control" id="form-create-account-email" value="{{\Input::old('email')}}" required>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="form-create-account-email">Phone:</label>
                                    <input name="phone" type="text" class="form-control" id="form-create-account-phone" value="{{\Input::old('phone')}}" required>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="form-create-account-password">Password:</label>
                                    <input name="password" type="password" class="form-control" id="form-create-account-password" required>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="form-create-account-password">Confirm Password:</label>
                                    <input name="password_confirmation" type="password" class="form-control" id="form-create-account-confirm-password" required">
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