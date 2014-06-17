<!--<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>-->

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Timesheet</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/metro.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/uniform/css/uniform.default.css" />
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" />
  <!--<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" /> -->

</head>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <!-- BEGIN LOGO -->
  <div class="logo">
    <img src="<?php echo base_url();?>assets/img/logo.png" alt="" /> 
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
    


    <form class="form-vertical login-form" action="<?php echo base_url();?>index.php/auth/login" method="post">
      <h4 class="form-title">Login to your account</h4>
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span><?php echo $message;?></span>
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username/Email</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <?php
              $identity=array(
                'name'=>'identity',                
                'placeholder'=>'Username/Email',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
                <?php echo form_input($identity);?>
              <!--<input class="m-wrap placeholder-no-fix" type="text" placeholder="Username/Email" name="$identity"/>-->
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-lock"></i>
            <?php
              $password=array(
                'name'=>'password',
                'type'=>'password',
                'placeholder'=>'Password',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($password);?>
            <!--<input class="m-wrap placeholder-no-fix" type="password" placeholder="Password" name="$password"/>-->
          </div>
        </div>
      </div>
      <div class="form-actions">
        <label class="checkbox">
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>Remember me
        </label>
        
        <input type="submit" name="login" value="Login" class="btn blue pull-right"/><i class="m-icon-swapright m-icon-white"></i>
                   
      </div>
      <div class="forget-password">
        <h4>Forgot your password ?</h4>
        <p>
          no worries, click <a href="javascript:;" class="" id="forget-password">here</a>
          to reset your password.
        </p>
      </div>
      <div class="create-account">
        <p>
          Don't have an account yet ?&nbsp; 
          <a href="javascript:;" id="register-btn" class="">Create an account</a>
        </p>
      </div>
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="form-vertical forget-form" action="<?php echo base_url();?>index.php/auth/forgot_password" method="post">
      <h3 class="">Forgot Password ?</h3>
      <p>Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-envelope"></i>
            <?php
              $email=array(
                'name'=>'email',                
                'placeholder'=>'Your Email',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($email);?>
            <!--<input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" name="email" />-->
          </div>
        </div>
      </div>
      <div class="form-actions">
        <button type="button" id="back-btn" class="btn">
        <i class="m-icon-swapleft"></i> Back
        </button>
        <input type="submit" name="login" value="Send" class="btn blue pull-right"/><i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <form class="form-vertical register-form" action="<?php echo base_url();?>index.php/auth/create_user" method="post">
      <h3 class="">Sign Up</h3>
      <p>Enter your account details below:</p>
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span><?php echo $message;?></span>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Surname</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <?php
              $last_name=array(
                'name'=>'last_name',                
                'placeholder'=>'Surname',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($last_name);?>
           <!-- <input class="m-wrap placeholder-no-fix" type="text" placeholder="Surname" name="surname"/>-->
          </div>
        </div>
      </div>
    
     
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">First Name</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <?php
              $first_name=array(
                'name'=>'first_name',                
                'placeholder'=>'First Name',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($first_name);?>
            <!--<input class="m-wrap placeholder-no-fix" type="text" placeholder="Othernames" name="othernames"/>-->
          </div>
        </div>
      </div>
        <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Company</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <?php
              $company=array(
                'name'=>'company',                
                'placeholder'=>'Company',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($company);?>
            <!--<input class="m-wrap placeholder-no-fix" type="text" placeholder="Othernames" name="othernames"/>-->
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Phone Number</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <?php
              $phone=array(
                'name'=>'phone',                
                'placeholder'=>'Phone Number',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($phone);?>
            <!--<input class="m-wrap placeholder-no-fix" type="text" placeholder="Phone/Mobile Number" name="phone_number"/>-->
          </div>
        </div>
      </div>
      
       <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-envelope"></i>
            <?php
              $email=array(
                'name'=>'email',                
                'placeholder'=>'Email',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($email);?>
            <!--<input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" name="email"/>-->
          </div>
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-lock"></i>
            <?php
              $password=array(
                'name'=>'password',                
                'placeholder'=>'Password',
                'type'=>'password',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($password);?>
            <!--<input class="m-wrap placeholder-no-fix" type="password" id="register_password" placeholder="Password" name="password"/>-->
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-ok"></i>
            <?php
              $password_confirm=array(
                'name'=>'password_confirm',                
                'placeholder'=>'Confirm Password',
                'type'=>'password',
                'class'=>'m-wrap placeholder-no-fix',
                );
            ?>
            <?php echo form_input($password_confirm);?>
            <!--<input class="m-wrap placeholder-no-fix" type="password" placeholder="Re-type Your Password" name="rpassword"/>-->
          </div>
        </div>
      </div>
      <div class="form-actions">
        <button id="register-back-btn" type="button" class="btn">
        <i class="m-icon-swapleft"></i>  Back
        </button>
        <input type="submit" name="login" value="Sign Up" id="register-submit-btn" class="btn blue pull-right"/><i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>
    </form>
    <!-- END REGISTRATION FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
    2014 &copy; Habari Consulting Timesheet System v1.0.3
  </div>

  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url();?>assets/uniform/jquery.uniform.min.js"></script> 
  <script src="<?php echo base_url();?>assets/js/jquery.blockui.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/app.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>