<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_b/bootstrap/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_b/dist/css/AdminLTE.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition" style="height: auto">
  <div class="container">
    <div class="col-lg-12 text-center">
    <br>
    <br>
      <?php echo $this->session->flashdata('fail_login') ?>
      <?php echo $this->db->last_query(); ?>
    </div>

    <div class="login-box">
      <div class="login-logo">
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><h2>Verifikasi Identitas</h2></p>
        <?php echo form_open(base_url().'web_login/data_form/per'); ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required="">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.login-box -->

      <!-- jQuery 2.2.3 -->
      <script src="<?php echo base_url();?>assets_b/plugins/jQuery/jquery-2.2.3.min.js"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="<?php echo base_url();?>assets_b/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
