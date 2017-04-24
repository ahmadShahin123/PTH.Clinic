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
    <?php if($this->uri->segment(1) == 'q_and_a' || $this->uri->segment(1) == 'excercises') {?>


	
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

    <link href="https://www.altibbi.com/global/stylesheets/app_7.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://www.altibbi.com/global/stylesheets/home_6.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://www.altibbi.com/global/stylesheets/articlesviewstyle/articlesviewstyle_1.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <?php if($this->uri->segment('2') == 'contactUs') { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'themes/pth-clinic/css/contactUsForm.css'; ?>"/>
    <?php } ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . 'themes/pth-clinic/css/bmi.css'; ?>" >
<!-- footer styles -->

    <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/demo.css'; ?>s">
    <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/footer-distributed-with-address-and-phones.css'; ?>">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<!-- end of footer styles -->
</head>

<body class="<?php if ($this->uri->segment(1) == 'articles') echo 'unv-menu bac-header'; else '';?>">

<!-- home page -->

<div id="header-wrapper-inner" class="header-inner" >
	<div id="header" class="container">
	
            
<div id="menu" class="font-family" >
    <a href="<?php echo site_url() ;?>" ><img src="<?php echo base_url() . 'assets/images/18009838_1539586889430964_116861895_n.png'; ?>" /> </a>
<ul>
		<li><a href="<?php echo site_url() ;?>" class="button" accesskey="1" title="">الرئيسية</a></li>
		<li><a href="<?php echo site_url() .'/articles/about_us' ;?>"   class="button" accesskey="2" title="">من نحن</a></li>
		<li><a href="<?php echo site_url() . '/articles/art'; ?>"  class="button" accesskey="3" title="">مقالات طبية</a></li>
                <li><a href="<?php echo base_url() . 'themes/pth-clinic/symptoms.php'; ?>"  class="button" accesskey="4" title="">تشخيص الأمراض</a></li>
		<li><a href="<?php echo site_url() .'/q_and_a/qa/15' ;?>"  class="button" accesskey="5" title="">أسئلة وأجوبة</a></li>
        <li class="hasSubmenu"><a href="#"  class="button" accesskey="6" title="">لياقة بدنية</a>
            <ul class="submenu">
                <li><a href="<?php echo site_url() . '/excercises/excercises_frontend/1' ;?>">تمارين</a></li>
                <li><a href="<?php echo site_url() . '/excercises/bmi' ;?>">مؤشر كتلة الجسم</a></li>
            </ul>
        </li>
        <li><a href="<?php echo site_url() . '/articles/contactUs'; ?>"  class="button" accesskey="7" title="">اتصل بنا</a></li>
</ul>
    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != '') { ?>
        <ul>

            <li><a href="<?php echo site_url() .'/regular_user/signOut' ;?>" class="signin1" accesskey="8" title="">تسجيل الخروج</a></li>

        </ul>
    <?php } else { ?>

        <ul>

            <?php if($this->uri->segment(2) != 'signUp') { ?>
                <li><a href="<?php echo site_url() . '/regular_user/signUp' ;?>" class="signin1" accesskey="9" title="">إنشاء حساب</a></li>
            <?php } ?>
            <?php if($this->uri->segment(2) != 'signIn') { ?>
                <li><a href="<?php echo site_url() . '/regular_user/signIn' ;?>" class="signin" accesskey="10" title="">تسجيل الدخول</a></li>
            <?php } ?>


        </ul>
    <?php } ?>
   
   </div>
</div>

</div>

