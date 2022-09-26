<nav class="col-md-2 d-none d-md-block bg-light sidebar py-4">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                {{-- ROUTE DA SISTMEARE TOGLIENDO ADMIN E METTENDO URA  --}}
                {{-- {{ route('admin.posts.create') }} --}}
                <a class="nav-link active" href="{{ route('ura.home') }}">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ura.apartments.index')}}">
                    <i class="fa-solid fa-building"></i>
                    Apartments
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="{{route('ura.apartments.create')}}">
                    <i class="fa-solid fa-plus"></i>
                    Add Apartment
                </a>
            </li>
            {{-- <li class="nav-item">
                <a  class="nav-link" href="{{route('ura.messages.index')}}">
                    <i class="fa-solid fa-plus"></i>
                    Messages
                </a>
            </li> --}}


            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                  <i class="fas fa-user"></i>
                  Users
                </a>
            </li> --}}


        </ul>

    </div>
</nav>
