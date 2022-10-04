<nav id="side_nav" class="col-md-2 d-md-block bg-light sidebar py-4">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
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
            <li class="nav-item">
                <a  class="nav-link" href="{{route('ura.sponsorships.create')}}">
                    <i class="fa-solid fa-plus"></i>
                    Add Sponsorship
                </a>
            </li>
        </ul>
    </div>
</nav>
