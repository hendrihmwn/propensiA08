<?php
/* @var $this yii\web\View */
?>
<h1 class="login-indextext font-default">WELCOME, <?= Yii::$app->user->identity->username ?></h1>
<div class="font-default" style="padding-top:20px;">

<p class="font-default" style="font-size:16px;">Informasi Akun Anda:</p>
<div class="alert alert-info" role="alert" style="font-size:14px;">
	<p><i class="fa fa-user"></i> Username : <?= Yii::$app->user->identity->username ?></p>
	<p><i class="fa fa-key"></i> Role : <?= Yii::$app->user->identity->role ?></p>
</div>
</div>