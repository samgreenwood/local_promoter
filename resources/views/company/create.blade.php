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
                                @if(auth()->user()->company)
                                    <li><a href="{{route('company.dashboard')}}"><i class="fa fa-dollar"></i><span>My Company Statistics</span></a></li>
                                @endif

                            </ul>
                        </aside>
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <header><h1>Create Company Profile</h1></header>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form action="{{route('companies.store')}}" role="form" id="form-create-agency" method="post">
                                @include('company._form')
                                <section id="select-package">
                                    <header><h3>Select a Package<i class="fa fa-question-circle tool-tip" data-toggle="tooltip" data-placement="right" title="" data-original-title="You can change a package later in 'Agency Profile' section"></i></h3></header>
                                    <div class="table-responsive submit-pricing">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Package:</th>
                                                <th class="title">Free</th>
                                                <th class="title">Silver</th>
                                                <th class="title">Gold</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="prices">
                                                <td></td>
                                                <td>$0</td>
                                                <td>$20</td>
                                                <td>$40</td>
                                            </tr>
                                            <tr>
                                                <td>Property Submit Limit</td>
                                                <td>1</td>
                                                <td>20</td>
                                                <td>Unlimited</td>
                                            </tr>
                                            <tr>
                                                <td>Agent Profiles</td>
                                                <td>1</td>
                                                <td>10</td>
                                                <td>Unlimited</td>
                                            </tr>
                                            <tr>
                                                <td>Agency Profiles</td>
                                                <td class="not-available"><i class="fa fa-times"></i></td>
                                                <td>5</td>
                                                <td>Unlimited</td>
                                            </tr>
                                            <tr>
                                                <td>Featured Properties</td>
                                                <td class="not-available"><i class="fa fa-times"></i></td>
                                                <td class="available"><i class="fa fa-check"></i></td>
                                                <td class="available"><i class="fa fa-check"></i></td>
                                            </tr>
                                            <tr class="buttons">
                                                <td></td>
                                                <td class="package-selected" data-package="free"><button type="button" class="btn btn-default small">Select</button></td>
                                                <td data-package="silver"><button type="button" class="btn btn-default small">Select</button></td>
                                                <td data-package="gold"><button type="button" class="btn btn-default small">Select</button></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- /.submit-pricing -->
                                </section><!-- /#select-package -->
                                <section id="submit">
                                    <div class="form-group center">
                                        <button type="submit" class="btn btn-default pull-right" id="account-submit">Create Company</button>
                                    </div><!-- /.form-group -->
                                </section>
                            </form>
                            <section class="center">
                                <figure class="note pull-left">By clicking the “Create Agency” button you agree with our <a href="{{route('terms')}}">Terms and conditions</a></figure>
                            </section>
                        </div><!-- /.col-md-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
                </div><!-- /.col-md-9 -->
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
@stop