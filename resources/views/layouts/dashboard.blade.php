<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

    {{-- START HEAD SECTION --}}
    @include('includes.dashboard.head')
    {{-- END HEAD SECTION --}}

    <body  class=" layout-fluid">
        <script type="text/javascript" src="{{ asset('assets/js/demo-theme.min.js') }}"></script>

        <div class="page">
            {{-- START SIDEBAR SECTION --}}
            @include('includes.dashboard.sidebar')
            {{-- END SIDEBAR SECTION --}}

            <div class="page-wrapper">
                {{-- START HEADER SECTION --}}
                @include('includes.dashboard.header')
                {{-- END HEADER SECTION --}}

                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-deck row-cards">
                            @yield('content')
                        </div>
                    </div>
                </div>

                {{-- START FOOTER SECTION --}}
                    @include('includes.dashboard.footer')
                {{-- END FOOTER SECTION --}}
            </div>
        </div>

        {{-- START JAVASCRIPTS SECTION --}}
        @include('includes.dashboard.scripts')
        {{-- END JAVASCRIPTS SECTION --}}

    </body>
</html>