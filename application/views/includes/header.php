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
	<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-datepicker/css/datepicker.css" />
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/style_responsive.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/style_light.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/jquery-tags-input/jquery.tagsinput.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
  
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link href='http://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
   <!--<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" /> -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
                <a class="brand" href="<?php echo site_url();?>/auth/index">
                <!--<img src="<?php echo base_url();?>assets/img/logo.png" alt="logo" />-->
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="<?php echo base_url();?>assets/img/menu-toggler.png" alt="" />
                </a>          
				<!-- END RESPONSIVE MENU TOGGLER -->				
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
				   <li class="dropdown user">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img alt="" src="<?php echo base_url();?>assets/img/profile/<?php echo $info['image'];?>" height="29" width="29"/>
                  <span class="username"><?php echo $this->session->userdata("username");?></span>
                  <i class="icon-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                  <?php if ($page_location=='Registration'){?>
                      &nbsp; <?php }else{?>
						 <li><a href="<?php echo base_url();?>index.php/auth/index"><i class="icon-user"></i> My Account</a></li>
                      
                     <li class="divider"></li>
						 <?php }?>
                     <li><a href="<?php echo base_url();?>index.php/auth/logout"><i class="icon-key"></i> Log Out</a></li>
                  </ul>
               </li>
               <!-- END USER LOGIN DROPDOWN -->
            </ul>
				<!-- END TOP NAVIGATION MENU -->	
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->	
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        	
			<ul>
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search">
						<div class="input-box">
							<a href="javascript:;" class="remove"></a>
							<input type="text" placeholder="Search..." />				
							<input type="button" class="submit" value=" " />
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				 
				<li 
                
                <?php if ($page_location=='Dashboard'){?>
					class="start active"
                    <?php }?>
                    >
					<a href="<?php echo site_url();?>/auth/index">
					<i class="icon-home"></i> 
					<span class="title">Profile</span>
                    <?php if ($page_location=='Dashboard'){?>
					<span class="selected"></span>
                    <?php }?>
					</a>
				</li>
                 
				<li 
                
                <?php if ($page_location=='Departments'){?>
					class="start active"
                    <?php }?>
                    >
					<a href="<?php echo site_url();?>/auth/departments">
					<i class="icon-sitemap"></i> 
					<span class="title">Departments</span>
                    <?php if ($page_location=='Departments'){?>
					<span class="selected"></span>
                    <?php }?>
					</a>
				</li>
				<li  <?php if ($page_location=='Quotes'){?>
					class="start active"
                    <?php }else{?>class="has-sub "<?php }?>>
					<a href="javascript:;">
					<i class="icon-user"></i> 
					<span class="title">Quotes</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url();?>/quote/new_quote">New Quote</a></li>
						<li><a href="<?php echo site_url();?>/quote/view_quote">View Quote</a></li>
						 
					</ul>					
				</li>
				<li  <?php if ($page_location=='Clients'){?>
					class="start active"
                    <?php }else{?>class="has-sub "<?php }?>>
					<a href="javascript:;">
					<i class="icon-user"></i> 
					<span class="title">Clients</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url();?>/auth/view_clients">Clients</a></li>
						<li><a href="<?php echo site_url();?>/auth/add_client">Add Client</a></li>
						 
					</ul>					
				</li>
				<li  <?php if ($page_location=='Jobs'){?>
					class="start active"
                    <?php }else{?>class="has-sub "<?php }?>>
					<a href="javascript:;">
					<i class="icon-table"></i> 
					<span class="title">Jobs</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url();?>/auth/view_jobs">Current Jobs</a></li>
						<li><a href="<?php echo site_url();?>/auth/new_job">New Job</a></li>
						 
					</ul>					
				</li>
				<li  <?php if ($page_location=='Task'){?>
					class="start active"
                    <?php }else{?>class="has-sub "<?php }?>>
					<a href="javascript:;">
					<i class="icon-legal"></i> 
					<span class="title">Tasks</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url();?>/auth/view_tasks">Tasks</a></li>
						<li><a href="<?php echo site_url();?>/auth/create_task">New Task</a></li>
						 
					</ul>					
				</li>
				<li  <?php if ($page_location=='Timesheet'){?>
					class="start active"
                    <?php }else{?>class="has-sub "<?php }?>>
					<a href="javascript:;">
					<i class="icon-dashboard"></i> 
					<span class="title">Timesheet</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url();?>/auth/view_sheets">Timesheets</a></li>
						<li><a href="<?php echo site_url();?>/auth/create_sheet/<?php echo $this->session->userdata("user_id");?>">Enter Timesheet</a></li>
						 
					</ul>					
				</li>
				<li 
                
                <?php if ($page_location=='Employees'){?>
					class="start active"
                    <?php }?>
                    >
					<a href="<?php echo site_url();?>/auth/employees/<?php echo $this->session->userdata("user_id");?>">
					<i class="icon-bookmark-empty"></i> 
					<span class="title">Employee Records</span>
                    <?php if ($page_location=='Employees'){?>
					<span class="selected"></span>
                    <?php }?>
					</a>
				</li>
               
				 
                
				
         
			 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
        
         
		<!-- BEGIN PAGE -->
		<div class="page-content">
			 
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						 			
						<h3 class="page-title">
							 <?php echo $page_title;?>				<small>&nbsp;&nbsp; <?php echo $page_sub_title;?></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url();?>/auth/index">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a><?php echo $page_title;?></a>
								 
							</li>
							 
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>