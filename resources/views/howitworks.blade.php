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
                <li class="active">How It Works</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- My Properties -->
                <div class="col-md-12 col-sm-12">
                    <section id="contact">
                        <header><h1>How It Works</h1></header>
                        <p>
                            Our project utilises an open-source business metric called The Net Promoter Score. The Net Promoter Score is based on the fundamental perspective that every business’ customers can be divided into three categories: Promoters, Passives, and Detractors.
                            They can be divided by asking one simple question — How likely is it that you would recommend this business to a friend or colleague? — these groups allow businesses to get a clear measure of their performance through their customers’ eyes. Customers respond on a 0-to-10 point rating scale.
                        </p>
                        <p>
                            <strong>Promoters (score 9-10)</strong> are loyal enthusiasts who will keep buying and refer others, fueling growth.<br />
                            <strong>Passives (score 7-8)</strong> are satisfied but are unenthusiastic customers who are vulnerable to competitive offerings.<br />
                            <strong>Detractors (score 0-6)</strong> are unhappy customers who can damage your brand and impede growth through negative word-of-mouth.<br />
                        </p>
                        <p>
                           The way Local Promoter works is that members of the public can list all of the businesses around them and provide valuable feedback to the businesses they’ve used. People who answer with a score of 9 or 10 are considered the promoters, therefore our platform asks them if they can recommend anyone to use the selected business. They can send recommendations to friends either by selecting a Facebook Friend or typing in the Name, Email or Phone number of their friend.
                        </p>
                        <p>
                            Businesses can choose to reward referrers for successful referrals with online amazon gift vouchers.
                        </p>
                    </section><!-- /#profile -->
                </div><!-- /.col-md-9 -->
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@stop