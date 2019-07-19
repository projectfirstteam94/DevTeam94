<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../Asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../Asset/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../Asset/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../Asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../Asset/dist/css/AdminLTE.css">
  <?php require_once ("../../Controller/ctr_login.php");?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>ハワイアンスカイ</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="height: 220px;">
    <p class="login-box-msg" style="font-size: 16px;">システムログイン</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div style="width: 30%; margin: 20px auto;">
          <button type="submit" id="btnlogin" name="btnlogin" class="btn btn-primary btn-block btn-flat">
          <span class="glyphicon glyphicon-log-in"></span>&nbsp ログイン
          </button>
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../Asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../Asset/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<!-- <script src="../../Asset/plugins/iCheck/icheck.min.js"></script> -->
<script src="../../Asset/scripts/login.js"></script>
</body>
</html>
