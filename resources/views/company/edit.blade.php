@extends('template.base')

@section('bodyclass')
    inner-page
@stop

@section('content')

    @if (!$company->tourism_id)

        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li class="active">Update Company</li>
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
                    <header><h1>Update Company Profile</h1></header>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form action="{{route('companies.update')}}" role="form" id="form-create-agency" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @include('company._form')
                                <section id="submit">
                                    <hr>
                                    <div class="form-group">
                                        @if(!$company->verified)
                                        <a class="btn btn-warning pull-left" href="{{route('company.verify')}}">Verify Company</a>
                                        @endif
                                        <button type="submit" class="btn btn-default pull-right" id="account-submit">Update Company</button>
                                    </div><!-- /.form-group -->
                                </section>
                            </form>
                        </div><!-- /.col-md-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.col-md-9 -->
            <!-- end My Properties -->
        </div><!-- /.row -->


    @else
        <div class="container">
        <br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <h1>You need to verify ownership before being able to edit this business.</h1>
                </div>
            </div>
        </div>
    @endif
@stop