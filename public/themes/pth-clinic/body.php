<body>


  
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
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/m5.jpg';?>); height: 100%; width: 100%;"> </div>
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

	
	
