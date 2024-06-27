<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="/dashboard">
                <img src="{{ asset('assets/img/logo/logo-white.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item }}">
                    <a class="nav-link" href="{{ routeHelper('index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-house"></i> </span>
                        <span class="nav-link-title"> {{trans('menu.home')}} </span>
                    </a>
                </li>

             

               

                <li class="nav-item {{ checkRoute('categories.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('categories.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-list"></i> </span>
                        <span class="nav-link-title"> @lang('menu.categories') </span>
                    </a>
                </li>

                
               
                <li class="nav-item {{ checkRoute('items.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('items.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-store"></i> </span>
                        <span class="nav-link-title"> @lang('menu.items') </span>
                    </a>
                </li>

            
            </ul>
        </div>
    </div>
</aside>
