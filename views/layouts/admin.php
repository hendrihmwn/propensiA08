<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Propensi A08 2015">

    <title>PT. Usbersa Mitra Logam</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= Yii::$app->params['base']?>views/layouts/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= yii::$app->params['base']?>views/layouts/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= yii::$app->params['base']?>views/layouts/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= yii::$app->params['base']?>views/layouts/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-new navbar-static-top" role="navigation" style="margin-bottom: 0">
        	
        	<!--navbar mobile-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brandnew nav" href="index.php"><img src="<?= Yii::$app->params['base']?>views/layouts/image/logo copy.png" style="width:90px;"></img>  SISTEM INFORMASI INVENTORY PT. USBERSA MITRA LOGAM</a>
            </div>
            <!-- end navbar mobile -->

			<!--Navbar atas-->
			
            <ul class="nav navbar-top-links navbar-right">
		       	<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?= Yii::$app->user->identity->username ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= Yii::$app->params['base']?>web/akun/changepassword?id=<?= Yii::$app->user->identity->id ?>"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= Yii::$app->params['base']?>web/login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

            </ul>
            <!-- end navbar atas -->
			
			<!--Navbar samping-->
            <div class="navbar-defaultnew sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <li>
                            <a href="<?= Yii::$app->params['base']?>web"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
						<li>
							<a href="<?= Yii::$app->params['base']?>web/akun"><i class="fa fa-user fa-fw"></i> Accounts<span class="fa "></span></a>
				
						</li>
					</ul>
                </div>
            </div>
            <!-- end navbar samping-->
            
        </nav><!-- end Navigasi -->

        <!-- Page Content -->
         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-heading">
                       
                    </div>
                    <div class="panel-body">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= $content ?>
                    </div>
                </div>
            </div>
         </div>
		<footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; PT. Usbersa Mitra Logam <?= date('Y') ?></p>
        </div>
    </footer>

    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?= yii::$app->params['base']?>views/layouts/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= yii::$app->params['base']?>views/layouts/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= yii::$app->params['base']?>views/layouts/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= yii::$app->params['base']?>views/layouts/js/sb-admin-2.js"></script>

</body>