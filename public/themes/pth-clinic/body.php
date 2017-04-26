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
        <div class="carousel-inner" >
            <div class="item active" >
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image.jpg';?>); height: 100%; width: 100%;"> </div>
                <div class="carousel-caption" style="position:absolute; z-index:1;height:65%;">
				<div class="center" >
				
                    <h3>
					 يعنى موقعنا بنشر معلومات طبية للمستخدمين عبر صفحات مختلفة من الموقع تتضمن مقالات طبية مختصة .
					</h3>
					
				</div>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image2.jpg';?>); height: 100%; width: 100%;"></div>
                <div class="carousel-caption" style="position:absolute; z-index:1;height:65%;">
                    <div class="center">
				
                    <h3>
					قسم أسئلة وأجوبة لا يغني عن زيارتك للطبيب، بل يهدف إلى رفع مستوى الوعي الطبي والثقافة الصحية للمستخدمين العرب .
					</h3>
					
				</div>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image04.jpg';?>); height: 100%; width: 100%;"> </div>
                <div class="carousel-caption" style="position:absolute; z-index:1;height:65%;">
                    <div class="center" >
				
                    <h3>
					قسم اللياقة البدنية يوضح الطرق السليمة لممارسة الرياضة من أجل مكافحة البدانة وزيادة الضخامة العضلية والحصول على عضلات مفتولة وجسم جذاب.
					</h3>
					
				</div>
                </div>
            </div>
			
			<div class="item">
                <!-- Set the fourth background image using inline CSS below. -->
                <div class="fill" style="background-image: url(<?php echo base_url() . 'themes/pth-clinic/images/clinic_image3.jpg';?>); height: 100%; width: 100%;"> </div>
                <div class="carousel-caption" style="position:absolute; z-index:1;height:65%;">
                    <div class="center">
				    
                    <h3>
					قسم تشخيص الأمراض يساعدك على معرفة الأمراض المحتملة بناء على الأعراض التي يشكو منها المريض. 

					</h3>
					
				</div>
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
	


    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>

	
	
