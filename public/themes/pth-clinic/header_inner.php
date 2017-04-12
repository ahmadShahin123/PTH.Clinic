<!DOCTYPE html>
<html lang="ar">

<head>
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . 'themes/pth-clinic/css/default.css';?>" >

    <?php if($this->uri->segment(2) == 'signUp' || $this->uri->segment(2) == 'signIn') { ?>
 <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/signInForm.css';?>"	>
 <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/signUpForm.css';?>"	>
<?php } ?>
    <title>pth.clinic</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/bootstrap.min.css';?>"	>

    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'themes/pth-clinic/css/full-slider.css'; ?>" rel="stylesheet">
    <script src="<?php echo base_url() . 'themes/pth-clinic/js/jquery.js ';?>"> </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'themes/pth-clinic/js/bootstrap.min.js';?>"> </script>
    <?php if($this->uri->segment(1) == 'q_and_a') {?>


	
        <link rel='stylesheet' id='wpum-frontend-css-css'  href="<?php echo base_url() . 'themes/pth-clinic/css/wp_user_manager_frontend.min.css'; ?>" type='text/css' media='all' />
        <link rel='stylesheet' id='tie-style-css'  href="<?php echo base_url() . 'themes/pth-clinic/css/style_QA.css'; ?>" type='text/css' media='all' />

        <link rel='stylesheet' id='jetpack_css-rtl-css'  href="<?php echo base_url() . 'themes/pth-clinic/css/jetpack-rtl.css'; ?>" type='text/css' media='all' />
        <script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/jquery.js'; ?>"></script>
        <script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/jquery-migrate.min.js'; ?>"></script>
        <script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/usp-pro.js'; ?>"></script>

        <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/rtl.css'; ?>" type="text/css" media="screen" />

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . 'themes/pth-clinic/css/art.min.css'; ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . 'themes/pth-clinic/css/art.css'; ?>" />


        <style type='text/css'>img#wpstats{display:none}</style>
        <link rel="shortcut icon" href="<?php echo base_url() . 'themes/pth-clinic/images/ask-dr-logo-2.png'; ?>" title="Favicon" />
        <script type='text/javascript'>
            /* <![CDATA[ */
            var tie = {"prettyPhoto" : "light_rounded" };
            /* ]]> */
        </script>

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . 'themes/pth-clinic/css/ie8.css'; ?>" />


    <?php } ?>




</head>

<body>

<!-- home page -->

<div id="header-wrapper-inner" class="header-inner" style="background-color:silver;">
	<div id="header" class="container">
	
            
<div id="menu" class="font-family" >
    
<ul>
		<li><a href="<?php echo base_url() . 'index.php' ;?>" class="button" accesskey="1" title="">الرئيسية</a></li>
		<li><a href="<?php echo base_url() .'index.php/articles/about_us' ;?>"   class="button" accesskey="2" title="">من نحن</a></li>
		<li><a href="<?php echo base_url() . 'themes/pth-clinic/art'; ?>"  class="button" accesskey="3" title="">مقالات طبية</a></li>
                <li><a href="#"  class="button" accesskey="4" title="">تشخيص الأمراض</a></li>
		<li><a href="<?php echo base_url() .'index.php/q_and_a/qa' ;?>"  class="button" accesskey="4" title="">أسئلة وأجوبة</a></li>
		<li><a href="<?php echo base_url() .'themes/pth-clinic/bmi.php' ;?>"  class="button" accesskey="5" title="">لياقة بدنية</a></li>
        <li><a href="<?php echo base_url() . 'themes/pth-clinic/contactUsNew.php'; ?>"  class="button" accesskey="6" title="">اتصل بنا</a></li>
</ul>
    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != '') { ?>
        <ul>
            <li><a href="<?php echo base_url() .'index.php/regular_user/signOut' ;?>" class="signin1" accesskey="8" title="">تسجيل الخروج</a></li>
        </ul>
    <?php } else { ?>

        <ul>
            <?php if($this->uri->segment(2) != 'signUp') { ?>
                <li><a href="<?php echo base_url() .'index.php/regular_user/signUp' ;?>" class="signin1" accesskey="8" title="">إنشاء حساب</a></li>
            <?php } ?>
            <?php if($this->uri->segment(2) != 'signIn') { ?>
                <li><a href="<?php echo base_url() .'index.php/regular_user/signIn' ;?>" class="signin" accesskey="7" title="">تسجيل الدخول</a></li>
            <?php } ?>
        </ul>
    <?php } ?>
   
   </div>
</div>

</div>

