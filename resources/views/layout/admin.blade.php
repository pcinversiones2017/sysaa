<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.2</title>

    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{URL::to('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet">


</head>

<body>
<div id="wrapper">
    @include('layout.partials.menu')

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.7.1/search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a7.jpg">
                                    </a>
                                    <div>
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a4.jpg">
                                    </a>
                                    <div>
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/profile.jpg">
                                    </a>
                                    <div>
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>

        <div class="footer">
            <div>
                <strong>Copyright</strong> Pacific Inversiones &copy; 2014-2017
            </div>
        </div>
    </div>

</div>

<!-- Mainly scripts -->
<script src="{{URL::to('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{URL::to('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.spline.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.resize.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.pie.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.symbol.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.time.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/peity/jquery.peity.min.js')}}"></script>--}}
{{--<script src="{{URL::to('js/demo/peity-demo.js')}}"></script>--}}
<script src="{{URL::to('js/inspinia.js')}}"></script>
{{--<script src="{{URL::to('js/plugins/pace/pace.min.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/easypiechart/jquery.easypiechart.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>--}}
{{--<script src="{{URL::to('js/demo/sparkline-demo.js')}}"></script>--}}
{{--<script src="{{URL::to('js/plugins/flot/jquery.flot.time.js')}}"></script>--}}


</body>


</html>
