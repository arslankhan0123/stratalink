<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" id="bootstrap-style" href="{{ asset('tmp/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tmp/css/icons.min.css') }}">
    <link rel="stylesheet" id="app-style" href="{{ asset('tmp/css/app.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Toaster Link -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Action Buttons -->
    <style>
        /* View Button */
        .view_btn {
            --fs: 1.25em;
            --col1: honeydew;
            --col3: #17a2b8;
            --col4: honeydew;
            /* --pd: .5em .65em; */
            width: 1.875rem;
            height: 1.875rem;
            display: grid;
            align-content: baseline;
            appearance: none;
            border: 0;
            grid-template-columns: min-content 1fr;
            padding: var(--pd);
            font-size: var(--fs);
            color: var(--col1);
            background-color: var(--col3);
            border-radius: 6px;
            position: relative;
            transition: all 0.75s ease-out;
            transform-origin: center;
        }

        .view_btn:hover {
            color: var(--col4);
        }

        .view_btn:active {
            animation: offset 1s ease-in-out infinite;
            outline-offset: 0;
        }

        .view_btn::after,
        .view_btn::before {
            content: "";
            align-self: center;
            justify-self: center;
            height: 0.5em;
            margin: 0 0.5em;
            grid-column: 1;
            grid-row: 1;
            opacity: 1;
        }

        .view_btn::after {
            position: relative;
            border: 2px solid var(--col4);
            border-radius: 50%;
            transition: all 0.5s ease-out;
            height: 0.1em;
            width: 0.1em;
            top: 0.438rem;
            left: -0.188rem;
        }

        .view_btn:hover::after {
            border: 2px solid var(--col3);
            transform: rotate(-120deg) translate(10%, 164%);
        }

        .view_btn::before {
            border-radius: 50% 0%;
            border: 4px solid var(--col4);
            transition: all 1s ease-out;
            transform: rotate(45deg);
            height: 1rem;
            width: 1rem;
            position: relative;
            top: 0.438rem;
            left: -0.188rem;
        }

        .view_btn:hover::before {
            border-radius: 50%;
            border: 4px solid var(--col1);
            transform: scale(1.25) rotate(0deg);
            animation: blink 1.5s ease-out 1s infinite alternate;
        }

        @keyframes blink {
            0% {
                transform: scale(1, 1) skewX(0deg);
                opacity: 1;
            }

            5% {
                transform: scale(1.5, 0.1) skewX(10deg);
                opacity: 0.5;
            }

            10%,
            35% {
                transform: scale(1, 1) skewX(0deg);
                opacity: 1;
            }

            40% {
                transform: scale(1.5, 0.1) skewX(10deg);
                opacity: 0.25;
            }

            45%,
            100% {
                transform: scale(1, 1) skewX(0deg);
                opacity: 1;
            }
        }

        @keyframes offset {
            50% {
                outline-offset: 0.15em;
                outline-color: var(--col1);
            }

            55% {
                outline-offset: 0.1em;
                transform: translateY(1px);
            }

            80%,
            100% {
                outline-offset: 0;
            }
        }


        /* Edit Button */
        .editBtn {
            width: 1.875rem;
            height: 1.875rem;
            border-radius: 7px;
            border: none;
            background-color: rgb(93, 93, 116);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .editBtn::before {
            content: "";
            width: 200%;
            height: 200%;
            background-color: rgb(102, 102, 141);
            position: absolute;
            z-index: 1;
            transform: scale(0);
            transition: all 0.3s;
            border-radius: 50%;
            filter: blur(10px);
        }

        .editBtn:hover::before {
            transform: scale(1);
        }

        .editBtn:hover {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
        }

        .editBtn svg {
            height: 0.813rem;
            fill: white;
            z-index: 3;
            transition: all 0.2s;
            transform-origin: bottom;
        }

        .editBtn:hover svg {
            transform: rotate(-15deg) translateX(5px);
        }

        .editBtn::after {
            content: "";
            width: 1.563rem;
            height: 0.094rem;
            position: absolute;
            bottom: 9px;
            left: -11px !important;
            background-color: white;
            border-radius: 2px;
            z-index: 2;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease-out;
        }

        .editBtn:hover::after {
            transform: scaleX(1);
            left: 0px;
            transform-origin: right;
        }

        /* Delete Button */
        .bin-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 1.875rem;
            height: 1.875rem;
            border-radius: 7px;
            background-color: rgb(255, 95, 95);
            cursor: pointer;
            border: none;
            transition-duration: 0.3s;
        }

        .bin-bottom {
            width: 0.625rem;
        }

        .bin-top {
            width: 0.875rem;
            transform-origin: right;
            transition-duration: 0.3s;
        }

        .bin-button:hover .bin-top {
            transform: rotate(45deg);
        }

        .bin-button:hover {
            background-color: rgb(255, 0, 0);
        }

        .bin-button:active {
            transform: scale(0.9);
        }


        /* AddButton */

        .plusButton {
            /* Config start */

            --plus_sideLength: 1.875rem;
            --plus_topRightTriangleSideLength: 0.9rem;
            /* Config end */
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid white;
            width: var(--plus_sideLength);
            height: var(--plus_sideLength);
            background-color: #084298;
            overflow: hidden;
            border-radius: 6px;
        }

        .plusButton::before {
            position: absolute;
            content: "";
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-width: 0 var(--plus_topRightTriangleSideLength) var(--plus_topRightTriangleSideLength) 0;
            border-style: solid;
            border-color: transparent #6ea8fe transparent transparent;
            transition-timing-function: ease-in-out;
            transition-duration: 0.2s;
        }

        .plusButton:hover {
            cursor: pointer;
        }

        .plusButton:hover::before {
            --plus_topRightTriangleSideLength: calc(var(--plus_sideLength) * 2);
        }

        .plusButton:focus-visible::before {
            --plus_topRightTriangleSideLength: calc(var(--plus_sideLength) * 2);
        }

        .plusButton>.plusIcon,
        .plusButton>.minusIcon {
            fill: white;
            width: calc(var(--plus_sideLength) * 0.7);
            height: calc(var(--plus_sideLength) * 0.7);
            z-index: 1;
            transition-timing-function: ease-in-out;
            transition-duration: 0.2s;
        }

        .plusButton:hover>.plusIcon,
        .plusButton:hover>.minusIcon {
            fill: black;
            transform: rotate(180deg);
        }

        .plusButton:focus-visible>.plusIcon,
        .plusButton:focus-visible>.minusIcon {
            fill: black;
            transform: rotate(180deg);
        }


        /* Shine Heading CSS */
        .shine {
            font-size: 1.5em !important;
            font-weight: 900 !important;
            color: rgba(255, 255, 255, 0.3) !important;
            background: #222 -webkit-gradient(linear,
                    left top,
                    right top,
                    from(#222),
                    to(#222),
                    color-stop(0.5, #fff)) 0 0 no-repeat;
            background-image: -webkit-linear-gradient(-40deg,
                    transparent 0%,
                    transparent 40%,
                    #fff 50%,
                    transparent 60%,
                    transparent 100%);
            -webkit-background-clip: text;
            -webkit-background-size: 50px;
            -webkit-animation: zezzz;
            -webkit-animation-duration: 5s;
            -webkit-animation-iteration-count: infinite;
        }

        /* Shine Heading CSS */
        @-webkit-keyframes zezzz {

            0%,
            10% {
                background-position: -200px;
            }

            20% {
                background-position: top left;
            }

            100% {
                background-position: 200px;
            }
        }



        /* Customizing the tooltip style */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
            /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        /* select2 selected option CSS */
        .select2-selection__choice {
            background-color: #00249c !important;
            color: white !important;
            border: 1px solid #00249c !important;
        }

        .select2-selection {
            background-color: #f8f9fa !important;
            /* height: 38px; */
        }
    </style>
    <style>
        .select2-container--default .select2-selection--single {
            height: 40px !important;
            line-height: 40px !important;
        }

        .select2-selection__rendered {
            line-height: 40px !important;
        }

        .select2-selection__arrow {
            height: 40px !important;
        }
    </style>
</head>

<body>
    <div id="layout-wrapper">


        @include('layouts.header')
        @include('layouts.sidebar')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 shine">
                                    @yield('breadcrumbTitle', '')
                                </h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        @yield('breadcrumbs', '')
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.footer')
        </div>
    </div>
    <!-- END layout-wrapper -->

    @include('layouts.right-sidebar')

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <!-- Include jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- Include Select2 CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if select2 is loaded
            if ($.fn.select2) {
                $('#buildingSelect').select2({
                    placeholder: "Search for a building",
                    allowClear: true
                });
            } else {
                console.error("Select2 is not loaded!");
            }
        });
    </script>
    <script src="https://unpkg.com/gridjs-jquery/dist/gridjs.production.min.js"></script>
    <script src="{{ asset('tmp/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tmp/js/metismenujs.min.js') }}"></script>
    <script src="{{ asset('tmp/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('tmp/js/feather.min.js') }}"></script>
    <script src="{{ asset('tmp/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tmp/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('tmp/js/world-merc.js') }}"></script>
    <script src="{{ asset('tmp/js/app.js') }}"></script>
    @yield('scripts')
    <!-- Toaster script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if (Session::has('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}")
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}")
    </script>
    @endif
</body>

</html>