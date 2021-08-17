<nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                
                <li>
                    <div class="user-send-message">
                        <button class="btn btn-sm btn-primary btn-addon" type="button">
                            <i class="ti-angle-right f-s-13"></i>DIRECTORATE OF INDUSTRIAL TRAINING</button>
                    </div>
                </li>
                <li>
                    <div class="user-send-message">
                        <button class="btn btn-sm btn-primary btn-addon" type="button">
                            <i class="ti-angle-right f-s-13"></i>{{ Carbon\carbon::now()->toDateString() }}</button>
                    </div>
                </li>               
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       <strong>{{ Auth::user()->name }}</strong> | <i class="ti-user"></i> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            
                        <a class="dropdown-item" href="#">
                            <i class="ti-user"></i>
                            <span>Edit Profile</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="ti-power-off"></i>
                            <span>Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>