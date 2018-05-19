<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        @if ( auth()->check() )
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request()->is('/')  ? 'active' : '' }}"><a href="{{ route('/') }}">Home </a></li>
                <li class="{{ Request()->is('questionnaires') || Request()->is('questionnaires/create') || Request()->is('questions/{id}/add')  ? 'active' : '' }}"><a href="{{ route('questionnaires') }}">Questionnaires </a></li>
                <li><a href="#">Results</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        @endif
    </div><!-- /.container-fluid -->
</nav>