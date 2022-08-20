<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('ads') }}">
        <img class="img-fluid" width="40" height="34" src="logo.png">
            {{ config('app.name', 'FreeAds') }}
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link bg-info gradient text-white rounded-pill" href="{{ route('ads.create') }}"> + POST ADS</a>
                </li>
                <li class="navbar-nav ml-auto">
                    <!-- ROUTE SILVIO LOGIN-->
                    <a class="nav-link" href="/connection">SIGNIN</a>
                    <a class="nav-link" href="/register">SIGNUP</a>
                    <a class="nav-link" href="/disconnect">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>