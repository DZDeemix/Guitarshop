<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Админ</title>
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Bootstrap Core CSS -->
    <link href="/admin_site/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/admin_site/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin_site/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="/admin_site/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/admin_site/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- DateTimePicker -->
    <link href="/admin_site/vendor/DateTimePicker/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin_site/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_site/mycss.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    {{--<![endif]-->--}}



</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Панель администратора</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="/admin/settings/show"><i class="fa fa-gear fa-fw"></i> Настройки</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">




                    <li>
                        <a href="/admin/orders/show"><i class="fa fa-table fa-fw"></i> Заказы</a>
                    </li>
                    <li>
                        <a href="#">Посты<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/post/add"><i class="fa fa-edit fa-fw"></i>Добавить новый пост</a>
                            </li>
                            <li>
                                <a href="/admin/posts/show"><i class="fa fa-table fa-fw"></i>Список постов</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#">Товары<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/product/add"><i class="fa fa-edit fa-fw"></i>Добавить новый товар</a>
                            </li>
                            <li>
                                <a href="/admin/products/show"><i class="fa fa-table fa-fw"></i>Список товаров</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#">Настройки страниц<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin_show_page', ['id' => 1]) }}"><i class="fa fa-edit fa-fw"></i>Главная</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_show_page', ['id' => 2]) }}"><i class="fa fa-table fa-fw"></i>Страница товаров</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_show_page', ['id' => 3]) }}"><i class="fa fa-table fa-fw"></i>Страница постов</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_show_page', ['id' => 4]) }}"><i class="fa fa-table fa-fw"></i>Страница о нас</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="/admin/guests/show"><i class="fa fa-table fa-fw"></i> Гости</a>
                    </li>
                    <li>
                        <a href="/admin/settings/show"><i class="fa fa-wrench fa-fw"></i> Настройки</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">

    @yield('content')

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



{{--!-- jQuery -->--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="Text/JavaScript" src="/admin_site/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script Defer type="Text/JavaScript" src="/admin_site/vendor/metisMenu/metisMenu.min.js"></script>



<!-- Custom Theme JavaScript -->
<script Defer Type="Text/JavaScript" src="/admin_site/dist/js/sb-admin-2.js"></script>

@stack('foter_script')

<!-- My_scripts -->
<script Defer type="Text/JavaScript" src="/js/admin_main.js"></script>

</body>


</html>
