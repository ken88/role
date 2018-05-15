<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dream</title>
    <!-- Bootstrap Styles-->
    <link href="/template/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/template/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="/template/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/template/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- TABLE STYLES-->
    <link href="/template/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <script src="/template/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="/template/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="/template/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="/template/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/template/assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="/template/assets/js/custom-scripts.js"></script>
    <script type="text/javascript">
        function right_(url){
            $('#rightcontent').attr('src',url);
        };
    </script>
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">

        <a class="navbar-brand" href="/index/index">CRM管理系统</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
       <li style="color: red; font-size: 16px; margin-right: 15px;">欢迎您：<?php echo $_SESSION['userinfo']['username'];?></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="/site/logout">
                        <i class="fa fa-sign-out fa-fw"></i> 退出
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>