<!DOCTYPE html>
<html lang="en">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'themes/pth-clinic/css/style.css';?>" >
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . 'themes/pth-clinic/css/default.css';?>" > 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Full Page ......</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'themes/pth-clinic/css/bootstrap.min.css';?>"	>

    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'themes/pth-clinic/css/full-slider.css' ?>" rel="stylesheet">

</head>

<body>


     <!-- home page -->

<div id="header-wrapper" style="position:absolute; z-index:1;width:100%;">
	<div id="header" class="container">
	

<div id="menu">
			<ul>
			   
			    <li class="active"><a href="<?php echo base_url() . 'index.php' ?>" accesskey="1" title="">الصفحة الرئيسية</a></li>
				<li><a href="<?php echo base_url() . 'about us.php' ?>" accesskey="2" title="">معلومات عنا</a></li>
				<li><a href="#" accesskey="3" title="">مقالات طبية</a></li>
				<li><a href="#" accesskey="4" title="">اسئلة وإجابات</a></li>
				<li><a href="#" accesskey="5" title="">المواضيع الصحية</a></li>
                <li><a href="#" accesskey="6" title="">اتصل بنا</a></li>
		   </ul>
		</div>
	</div>
</div>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image.jpg';?>); height: 100%; width: 100%;"> </div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image2.jpg';?>); height: 100%; width: 100%;"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image3.jpg';?>); height: 100%; width: 100%;"> </div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
			
			<div class="item">
                <!-- Set the fourth background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image4.jpg';?>); height: 100%; width: 100%;"> </div>
                <div class="carousel-caption">
                    <h2>Caption 4 </h2>
                </div>
            </div>
			
			
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
	
	
	<!-- jQuery -->
    <script src="<?php echo base_url() . 'themes/pth-clinic/js/jquery.js ';?>"> </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'themes/pth-clinic/js/bootstrap.min.js';?>"> </script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>

</body>

</html>
