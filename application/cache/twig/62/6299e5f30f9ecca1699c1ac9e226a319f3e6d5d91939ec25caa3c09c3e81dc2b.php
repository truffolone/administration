<?php

/* layouts/default.twig */
class __TwigTemplate_bbfec15f53b614756a78f1105dce2267455d24256356c7ffd6bfb4008818e29c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content_title' => array($this, 'block_content_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    ";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 54
        echo "</head>

<body>

    <div id=\"wrapper\">

        <!-- Navigation -->
        <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"index.html\">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class=\"nav navbar-top-links navbar-right\">
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-envelope fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-messages\">
                        <li>
                            <a href=\"#\">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class=\"pull-right text-muted\">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class=\"pull-right text-muted\">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class=\"pull-right text-muted\">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a class=\"text-center\" href=\"#\">
                                <strong>Read All Messages</strong>
                                <i class=\"fa fa-angle-right\"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-tasks fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-tasks\">
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class=\"pull-right text-muted\">40% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">
                                            <span class=\"sr-only\">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class=\"pull-right text-muted\">20% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 20%\">
                                            <span class=\"sr-only\">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class=\"pull-right text-muted\">60% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%\">
                                            <span class=\"sr-only\">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class=\"pull-right text-muted\">80% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 80%\">
                                            <span class=\"sr-only\">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a class=\"text-center\" href=\"#\">
                                <strong>See All Tasks</strong>
                                <i class=\"fa fa-angle-right\"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-bell fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-alerts\">
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-comment fa-fw\"></i> New Comment
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-twitter fa-fw\"></i> 3 New Followers
                                    <span class=\"pull-right text-muted small\">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-envelope fa-fw\"></i> Message Sent
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-tasks fa-fw\"></i> New Task
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-upload fa-fw\"></i> Server Rebooted
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a class=\"text-center\" href=\"#\">
                                <strong>See All Alerts</strong>
                                <i class=\"fa fa-angle-right\"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-user fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-user\">
                        <li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>
                        </li>
                        <li><a href=\"#\"><i class=\"fa fa-gear fa-fw\"></i> Settings</a>
                        </li>
                        <li class=\"divider\"></li>
                        <li><a href=\"login.html\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class=\"navbar-default sidebar\" role=\"navigation\">
                <div class=\"sidebar-nav navbar-collapse\">
                    <ul class=\"nav\" id=\"side-menu\">
                        <li class=\"sidebar-search\">
                            <div class=\"input-group custom-search-form\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Search...\">
                                <span class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\">
                                    <i class=\"fa fa-search\"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=\"index.html\"><i class=\"fa fa-dashboard fa-fw\"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-bar-chart-o fa-fw\"></i> Charts<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"flot.html\">Flot Charts</a>
                                </li>
                                <li>
                                    <a href=\"morris.html\">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"tables.html\"><i class=\"fa fa-table fa-fw\"></i> Tables</a>
                        </li>
                        <li>
                            <a href=\"forms.html\"><i class=\"fa fa-edit fa-fw\"></i> Forms</a>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-wrench fa-fw\"></i> UI Elements<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"panels-wells.html\">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href=\"buttons.html\">Buttons</a>
                                </li>
                                <li>
                                    <a href=\"notifications.html\">Notifications</a>
                                </li>
                                <li>
                                    <a href=\"typography.html\">Typography</a>
                                </li>
                                <li>
                                    <a href=\"icons.html\"> Icons</a>
                                </li>
                                <li>
                                    <a href=\"grid.html\">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-sitemap fa-fw\"></i> Multi-Level Dropdown<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"#\">Second Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Second Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Third Level <span class=\"fa arrow\"></span></a>
                                    <ul class=\"nav nav-third-level\">
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-files-o fa-fw\"></i> Sample Pages<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"blank.html\">Blank Page</a>
                                </li>
                                <li>
                                    <a href=\"login.html\">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id=\"page-wrapper\">
            ";
        // line 392
        if ((($context["systemError"] ?? null) != null)) {
            // line 393
            echo "                <div class=\"row\">
                    <div class=\"alert alert-danger col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Stop!</strong> ";
            // line 396
            echo ($context["systemError"] ?? null);
            echo "
                    </div>
                </div>
            ";
        }
        // line 400
        echo "            ";
        if ((($context["systemWarning"] ?? null) != null)) {
            // line 401
            echo "                <div class=\"row\">
                    <div class=\"alert alert-warning col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Warning!</strong> ";
            // line 404
            echo ($context["systemWarning"] ?? null);
            echo "
                    </div>
                </div>
            ";
        }
        // line 408
        echo "            ";
        if ((($context["systemInfo"] ?? null) != null)) {
            // line 409
            echo "                <div class=\"row\">
                    <div class=\"alert alert-info col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Info!</strong> ";
            // line 412
            echo ($context["systemInfo"] ?? null);
            echo "
                    </div>
                </div>
            ";
        }
        // line 416
        echo "            ";
        if ((($context["systemSuccess"] ?? null) != null)) {
            // line 417
            echo "                <div class=\"row\">
                    <div class=\"alert alert-success col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Success!</strong> ";
            // line 420
            echo ($context["systemSuccess"] ?? null);
            echo "
                    </div>
                </div>
            ";
        }
        // line 424
        echo "            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <h1 class=\"page-header\">";
        // line 426
        $this->displayBlock('content_title', $context, $blocks);
        echo "</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class=\"row\">
                ";
        // line 432
        $this->displayBlock('content', $context, $blocks);
        // line 433
        echo "            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src=\"";
        // line 442
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/jquery/jquery.min.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"";
        // line 445
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/bootstrap/bootstrap.min.js\"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=\"";
        // line 448
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/metisMenu/metisMenu.min.js\"></script>

    <!-- Morris Charts JavaScript -->
    <script src=\"";
        // line 451
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/raphael/raphael.min.js\"></script>
    <script src=\"";
        // line 452
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/morrisjs/morris.min.js\"></script>
    <script src=\"";
        // line 453
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/data/morris-data.js\"></script>

    <!-- Custom Theme JavaScript -->
    <script src=\"";
        // line 456
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/js/custom.js\"></script>

</body>

</html>
";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">

        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-57x57.png\">
        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-60x60.png\">
        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-72x72.png\">
        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-76x76.png\">
        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-114x114.png\">
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-120x120.png\">
        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-144x144.png\">
        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-152x152.png\">
        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/apple-icon-180x180.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/android-icon-192x192.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/favicon-32x32.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/favicon-96x96.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/favicon-16x16.png\">
        <link rel=\"manifest\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/manifest.json\">
        <meta name=\"msapplication-TileColor\" content=\"#ffffff\">
        <meta name=\"msapplication-TileImage\" content=\"";
        // line 27
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/icon/ms-icon-144x144.png\">
        <meta name=\"theme-color\" content=\"#ffffff\">

        <title>";
        // line 30
        $this->displayBlock('title', $context, $blocks);
        echo " - Echo Creative Company System</title>

        <!-- Bootstrap Core CSS -->
        <link href=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/css/bootstrap.min.css\" rel=\"stylesheet\">

        <!-- MetisMenu CSS -->
        <link href=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/css/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">

        <!-- Custom CSS -->
        <link href=\"";
        // line 39
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/css/style.css\" rel=\"stylesheet\">

        <!-- Morris Charts CSS -->
        <link href=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/css/morrisjs/morris.css\" rel=\"stylesheet\">

        <!-- Custom Fonts -->
        <link href=\"";
        // line 45
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "public/css/font-awesome/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
            <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
        <![endif]-->
    ";
    }

    // line 30
    public function block_title($context, array $blocks = array())
    {
    }

    // line 426
    public function block_content_title($context, array $blocks = array())
    {
    }

    // line 432
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  625 => 432,  620 => 426,  615 => 30,  602 => 45,  596 => 42,  590 => 39,  584 => 36,  578 => 33,  572 => 30,  566 => 27,  561 => 25,  557 => 24,  553 => 23,  549 => 22,  545 => 21,  541 => 20,  537 => 19,  533 => 18,  529 => 17,  525 => 16,  521 => 15,  517 => 14,  513 => 13,  509 => 12,  501 => 6,  498 => 5,  488 => 456,  482 => 453,  478 => 452,  474 => 451,  468 => 448,  462 => 445,  456 => 442,  445 => 433,  443 => 432,  434 => 426,  430 => 424,  423 => 420,  418 => 417,  415 => 416,  408 => 412,  403 => 409,  400 => 408,  393 => 404,  388 => 401,  385 => 400,  378 => 396,  373 => 393,  371 => 392,  31 => 54,  29 => 5,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
    {% block head %}
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">

        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"{{ base_url }}public/icon/apple-icon-57x57.png\">
        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"{{ base_url }}public/icon/apple-icon-60x60.png\">
        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"{{ base_url }}public/icon/apple-icon-72x72.png\">
        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"{{ base_url }}public/icon/apple-icon-76x76.png\">
        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"{{ base_url }}public/icon/apple-icon-114x114.png\">
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"{{ base_url }}public/icon/apple-icon-120x120.png\">
        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"{{ base_url }}public/icon/apple-icon-144x144.png\">
        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"{{ base_url }}public/icon/apple-icon-152x152.png\">
        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"{{ base_url }}public/icon/apple-icon-180x180.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"{{ base_url }}public/icon/android-icon-192x192.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{{ base_url }}public/icon/favicon-32x32.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"{{ base_url }}public/icon/favicon-96x96.png\">
        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{{ base_url }}public/icon/favicon-16x16.png\">
        <link rel=\"manifest\" href=\"{{ base_url }}public/icon/manifest.json\">
        <meta name=\"msapplication-TileColor\" content=\"#ffffff\">
        <meta name=\"msapplication-TileImage\" content=\"{{ base_url }}public/icon/ms-icon-144x144.png\">
        <meta name=\"theme-color\" content=\"#ffffff\">

        <title>{% block title %}{% endblock %} - Echo Creative Company System</title>

        <!-- Bootstrap Core CSS -->
        <link href=\"{{ base_url }}public/css/bootstrap.min.css\" rel=\"stylesheet\">

        <!-- MetisMenu CSS -->
        <link href=\"{{ base_url }}public/css/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">

        <!-- Custom CSS -->
        <link href=\"{{ base_url }}public/css/style.css\" rel=\"stylesheet\">

        <!-- Morris Charts CSS -->
        <link href=\"{{ base_url }}public/css/morrisjs/morris.css\" rel=\"stylesheet\">

        <!-- Custom Fonts -->
        <link href=\"{{ base_url }}public/css/font-awesome/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
            <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
        <![endif]-->
    {% endblock %}
</head>

<body>

    <div id=\"wrapper\">

        <!-- Navigation -->
        <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"index.html\">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class=\"nav navbar-top-links navbar-right\">
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-envelope fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-messages\">
                        <li>
                            <a href=\"#\">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class=\"pull-right text-muted\">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class=\"pull-right text-muted\">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class=\"pull-right text-muted\">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a class=\"text-center\" href=\"#\">
                                <strong>Read All Messages</strong>
                                <i class=\"fa fa-angle-right\"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-tasks fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-tasks\">
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class=\"pull-right text-muted\">40% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">
                                            <span class=\"sr-only\">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class=\"pull-right text-muted\">20% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 20%\">
                                            <span class=\"sr-only\">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class=\"pull-right text-muted\">60% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%\">
                                            <span class=\"sr-only\">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class=\"pull-right text-muted\">80% Complete</span>
                                    </p>
                                    <div class=\"progress progress-striped active\">
                                        <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 80%\">
                                            <span class=\"sr-only\">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a class=\"text-center\" href=\"#\">
                                <strong>See All Tasks</strong>
                                <i class=\"fa fa-angle-right\"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-bell fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-alerts\">
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-comment fa-fw\"></i> New Comment
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-twitter fa-fw\"></i> 3 New Followers
                                    <span class=\"pull-right text-muted small\">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-envelope fa-fw\"></i> Message Sent
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-tasks fa-fw\"></i> New Task
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"#\">
                                <div>
                                    <i class=\"fa fa-upload fa-fw\"></i> Server Rebooted
                                    <span class=\"pull-right text-muted small\">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a class=\"text-center\" href=\"#\">
                                <strong>See All Alerts</strong>
                                <i class=\"fa fa-angle-right\"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-user fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-user\">
                        <li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>
                        </li>
                        <li><a href=\"#\"><i class=\"fa fa-gear fa-fw\"></i> Settings</a>
                        </li>
                        <li class=\"divider\"></li>
                        <li><a href=\"login.html\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class=\"navbar-default sidebar\" role=\"navigation\">
                <div class=\"sidebar-nav navbar-collapse\">
                    <ul class=\"nav\" id=\"side-menu\">
                        <li class=\"sidebar-search\">
                            <div class=\"input-group custom-search-form\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Search...\">
                                <span class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\">
                                    <i class=\"fa fa-search\"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=\"index.html\"><i class=\"fa fa-dashboard fa-fw\"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-bar-chart-o fa-fw\"></i> Charts<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"flot.html\">Flot Charts</a>
                                </li>
                                <li>
                                    <a href=\"morris.html\">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"tables.html\"><i class=\"fa fa-table fa-fw\"></i> Tables</a>
                        </li>
                        <li>
                            <a href=\"forms.html\"><i class=\"fa fa-edit fa-fw\"></i> Forms</a>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-wrench fa-fw\"></i> UI Elements<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"panels-wells.html\">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href=\"buttons.html\">Buttons</a>
                                </li>
                                <li>
                                    <a href=\"notifications.html\">Notifications</a>
                                </li>
                                <li>
                                    <a href=\"typography.html\">Typography</a>
                                </li>
                                <li>
                                    <a href=\"icons.html\"> Icons</a>
                                </li>
                                <li>
                                    <a href=\"grid.html\">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-sitemap fa-fw\"></i> Multi-Level Dropdown<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"#\">Second Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Second Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Third Level <span class=\"fa arrow\"></span></a>
                                    <ul class=\"nav nav-third-level\">
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-files-o fa-fw\"></i> Sample Pages<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"blank.html\">Blank Page</a>
                                </li>
                                <li>
                                    <a href=\"login.html\">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id=\"page-wrapper\">
            {% if systemError != null %}
                <div class=\"row\">
                    <div class=\"alert alert-danger col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Stop!</strong> {{ systemError|raw }}
                    </div>
                </div>
            {% endif %}
            {% if systemWarning != null %}
                <div class=\"row\">
                    <div class=\"alert alert-warning col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Warning!</strong> {{ systemWarning|raw }}
                    </div>
                </div>
            {% endif %}
            {% if systemInfo != null %}
                <div class=\"row\">
                    <div class=\"alert alert-info col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Info!</strong> {{ systemInfo|raw }}
                    </div>
                </div>
            {% endif %}
            {% if systemSuccess != null %}
                <div class=\"row\">
                    <div class=\"alert alert-success col-md-12 alert-dismissible\" role=\"alert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong>Success!</strong> {{ systemSuccess|raw }}
                    </div>
                </div>
            {% endif %}
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <h1 class=\"page-header\">{% block content_title %}{% endblock %}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class=\"row\">
                {% block content %}{% endblock %}
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src=\"{{ base_url }}public/js/jquery/jquery.min.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"{{ base_url }}public/js/bootstrap/bootstrap.min.js\"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=\"{{ base_url }}public/js/metisMenu/metisMenu.min.js\"></script>

    <!-- Morris Charts JavaScript -->
    <script src=\"{{ base_url }}public/js/raphael/raphael.min.js\"></script>
    <script src=\"{{ base_url }}public/js/morrisjs/morris.min.js\"></script>
    <script src=\"{{ base_url }}public/js/data/morris-data.js\"></script>

    <!-- Custom Theme JavaScript -->
    <script src=\"{{ base_url }}public/js/custom.js\"></script>

</body>

</html>
", "layouts/default.twig", "/var/www/html/echosystem/administration/application/views/layouts/default.twig");
    }
}
