<header id="header">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">LaraFrame</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="/about">About</a></li>
                    <li><a href="/help">Help</a></li>
                    @if (Auth::guest())
                        <li class="user-action"><a href="/login">Login</a></li>
                        <li class="user-action"><a href="/register">Daftar</a></li>
                    @else
                        @can('view-dashboard')
                        <li class="user-action">
                            <a href="/admin"><i class="fa fa-laptop" aria-hidden="true"></i> User Area</a>
                        </li>
                        @endcan
                        <li class="user-action">
                            <a href="/profile" class="btn-icon" title="Profile"><i
                                        class="ion ion-person"></i></a>
                        </li>
                        <li class="user-action">
                            <a href="/logout" class="btn-icon" title="Logout"><i class="ion ion-power"></i></a>
                        </li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>