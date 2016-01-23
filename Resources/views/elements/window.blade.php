<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{!! $title !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if ($favicon != '')
    <link rel="shortcut icon" href="{!! $favicon !!}" />
    @endif

    {!! $resourceBag->getParsedCSS() !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-{!! $skin . ' ' . $layout . ($sidebarCollapsed ? ' sidebar-collapse' : '') !!} sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{!! $logo_href !!}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! $mini_logo_text or $logo_text !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{!! $logo_text !!}</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        {!! $navbarMenu !!}
                        @if ($webURL != '')
                        <li>
                            <a href="{!! $webURL !!}" title="{!! $showWeb !!}" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-desktop"></i>
                            </a>
                        </li>
                        @endif
                        @if ($logoutURL != '')
                        <li>
                            <a href="{!! $logoutURL !!}" title="{!! $logout !!}" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-power-off"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>

            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                @if ($searchAction != '')
                <!-- search form -->
                {!! Form::open([
                    'url' => $searchAction,
                    'method' => $searchMethod,
                    'class' => 'sidebar-form',
                ]) !!}
                  <div class="input-group">
                    <input type="text" name="{!! $searchName !!}" class="form-control" placeholder="{!! $searchPlaceholder !!}" />
                    <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </form>
                <!-- /.search form -->
                @endif

                <!-- sidebar menu: : style can be found in sidebar.less -->
                {!! $sidebarMenu !!}
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {!! $heading !!}
                    <small>{!! $heading_small !!}</small>
                </h1>
                <ol class="breadcrumb">
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb[1] == null)
                    <li class="active">{!! $breadcrumb[0] !!}</li>
                    @else
                    <li>
                        <a href="{{ $breadcrumb[1] }}">
                            {!! $breadcrumb[0] !!}
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                @if (count($errors) > 0)
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>Počas spracovávania požiadavky došlo k nasledujúcim chybám:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!! $content !!}
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        @if ($footer != '')
        <!-- Main Footer -->
        <footer class="main-footer">
            {!! $footer !!}
        </footer>
        @endif

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    {!! $resourceBag->getParsedConfig() !!}
    {!! $resourceBag->getParsedVariables() !!}

    {!! $resourceBag->getParsedJS() !!}

    <script>
    // All assets are loaded now. Call handler.
    assetsLoaded();

    // Set CSRF token
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    });
    </script>

</body>
</html>
