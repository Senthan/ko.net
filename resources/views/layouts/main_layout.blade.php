<!DOCTYPE html>
<html>
<head>
    @include('layouts._partials._head')

    @yield('stylesheets')
    <style>
        #toast-container > div {
            opacity: 0.95;
        }

        div.dataTables_filter label {
            background: #00ACD6;
            padding-left: 8px;
            color: white;
        }

        .editable-click, a.editable-click, a.editable-click:hover {
            text-decoration: none;
            border-bottom: 1px #0088cc !important;
            color: black;
        }

        .main-header .navbar {
            box-shadow: 1px 1px 1px #4e5653;
        }

        body {
            font-size: 13px;
        }

        .ui-grid {
            color: #222;
        }

        .ui-grid-row:nth-child(even) .ui-grid-cell {
            background-color: #f5f9fb;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f5f9fb;
        }
    </style>
</head>

<body class="hold-transition skin-green fixed sidebar-collapse bodyClass" ng-app="app">

@yield('formStart')
<div class="wrapper">

@include('layouts._partials._topnav')
@include('layouts._partials._leftnav')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="body-log">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->


    @include('layouts._partials._footer')
    @include('layouts._partials._scripts')
    @yield('script')
</div>

</body>
</html>
