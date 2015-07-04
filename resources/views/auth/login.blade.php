@extends('template.base')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sign In</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<div class="container">
    <header><h1>Sign In</h1></header>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            <form role="form" id="form-create-account" method="post" >
                <div class="form-group clearfix">
                    <a style="background: #3b5998; color: white" class="btn pull-left btn-default" href="{{route('oauth.redirect', 'facebook')}}"><i class="fa fa-facebook">&nbsp;Login with Facebook</i></a>
                    <a style="background: #c32f10; color: white" class="btn pull-right btn-red" href="{{route('oauth.redirect', 'google')}}"><i class="fa fa-google-plus">&nbsp;Login with Google</i></a>
                </div>
                <hr/>
                <div class="form-group">
                    <label for="form-create-account-email">Email:</label>
                    <input type="email" class="form-control" id="form-create-account-email" required>
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label for="form-create-account-password">Password:</label>
                    <input type="password" class="form-control" id="form-create-account-password" required>
                </div><!-- /.form-group -->
                <div class="form-group clearfix">
                    <button type="submit" class="btn pull-right btn-default" id="account-submit">Login</button>
                </div><!-- /.form-group -->
            </form>
            <hr>
            <div class="center"><a href="#">I don't remember my password</a></div>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
@stop