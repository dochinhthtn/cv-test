<nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
    <div class="container"><a class="navbar-brand" href="#">CV View</a><button data-toggle="collapse"
            class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/about">About us</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/community">Community</a></li>
            </ul>
            <form class="form-inline mr-auto" target="_self" method="GET" id="search-cv-form">
                {{ csrf_field() }}
                <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input
                        class="form-control search-field" type="search" id="search-field" name="search"
                        placeholder="Search for CV"></div>
            </form>
            <span class="navbar-text actions">
                @if (auth()->check())
               
                <a class="btn btn-light action-button" role="button" href="/cv/my-cv"> Welcome {{auth()->user()->name}}</a>
                <a class="login" href="/auth/login" style="margin-left: 20px;">Logout</a>
                @else
                <a class="login" href="/auth/login" style="margin-right: 10px;">Log
                    In</a><a class="btn btn-light action-button" role="button" href="/auth/register">Sign Up</a>
                @endif
            </span>
        </div>
    </div>
</nav>

<script>
    document.getElementById('search-cv-form').onsubmit = (event) => {
        event.preventDefault();
        window.location= '/cv/search/' + document.getElementById('search-field').value
    };
</script>