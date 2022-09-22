<nav class="navbar navbar-expand-sm-md navbar-dark bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 m-2 " href= {{ url('/') }} >BoolBnB</a>
    <ul class="navbar-nav px-3 ml-auto ">

        @if (Auth::check())

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Ciao {{ Auth::user()->name }}!
                </a>

                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                    </a>
                    </li>

                  </ul>

            </li>


        @endif
    </ul>
</nav>
