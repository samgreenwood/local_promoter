<div class="secondary-navigation">
    <div class="container">
        <div class="contact">
            <figure><strong>Phone:</strong>+61 (08) 7444 4899</figure>
            <figure><strong>Email:</strong>contact@localpromoter.com.au</figure>
        </div>
        <div class="user-area">
            <div class="actions">
            @if(auth()->user())
                <a href="/profile" class="promoted"><strong>Profile</strong></a>
                <a href="/logout">Log Out</a>
            @else
                <a href="/register" class="promoted"><strong>Register</strong></a>
                <a href="/login">Log In</a>
            @endif
            </div>
        </div>
    </div>
</div>
<div class="container">
    <header class="navbar" id="top" role="banner">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand nav" id="brand">
                <a href=""><img src="/assets/img/LP.png" alt="brand"></a>
            </div>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/how-it-works">How it Works</a></li>
                <li><a href="/search">Get Started</a></li>
                <li><a href="/create-company">Register a Business</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav><!-- /.navbar collapse-->
    </header><!-- /.navbar -->
</div><!-- /.container -->