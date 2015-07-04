@extends('template.base')

@section('content')
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Update Company</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <header><h1>Update Company Profile</h1></header>
            <div class="row">
                <div class="col-md-8 col-sm-12 col-md-offset-2">
                    <form action="{{route('companies.update')}}" role="form" id="form-update-company" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @include('company._form')
                        <section id="submit">
                            <div class="form-group center">
                                <button type="submit" class="btn btn-default large" id="account-submit">Update Company Profile</button>
                            </div><!-- /.form-group -->
                        </section>
                    </form>
                    <hr>
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@stop