<?php 
$year=date("Y");
$month=date("n");
$day=date("j");
$eday='31'; $sday='01';
$bgnde="$year$month$sday";
$endded="$year$month$eday";

    
$del_directory = "C:/jupyter_project/image_data"; 
$del_handle = opendir($del_directory);
while ($del_file = readdir($del_handle)) {
    @unlink($del_directory."/".$del_file);
}
closedir($del_handle);

$ch = curl_init();
$url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
$queryParams = '?' . 
    urlencode('bgnde').'='.$bgnde.'&' . 
    urlencode('endde').'='.$endded.'&'.
    urlencode('pageNo').'=3&'.
    urlencode('numOfRows').'=12&'.
    urlencode('ServiceKey') . '=SFGgN7CCf9qgjhEO8oXCuycwzcvHXPaFZN5i%2Bt8vX3qRC5xXnE%2FuCS0CDtbuPJl0kWzsOEH3romtke0%2BAptQmw%3D%3D'
    ; 
curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);
$object = simplexml_load_string($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>찾아독</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/Dog/img/favicon.png" rel="icon">
  <link href="/Dog/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/Dog/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/Dog/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/Dog/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/Dog/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/Dog/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/Dog/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/Dog/css/style.css" rel="stylesheet">
  <link href="/Dog/css/upload.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="/Dog/js/widget.js?ver=2"></script>
	  <script>
        var botmanWidget = {
            frameEndpoint: 'chat.php',
            introMessage: '안녕하세요',
            chatServer : 'botman.php', 
            title: 'Find Bot'
        }; 
    </script>
   <style>
       .btn-dog{
           font-family: "Montserrat", sans-serif;
  font-size: 14px;
  font-weight: 600;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 32px;
  border-radius: 50px;
  transition: 0.5s;
           margin-left: 60px;
           margin-top:-160px;
  color: #fff;
           background-color: cornflowerblue;
  border: 2px solid #fff;
       }
       .btn-dog:hover{
          background: #007bff;
          border-color: #007bff;
          color: #fff;
       }
       btn
    </style>
</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="/Dog/views/index.php"><span>Find Dog</span></a></h1> 
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="/Dog/views/index.php">메인 화면</a></li>
          <li><a href="/Dog/views/animalAPI.php">모든 유기동물 검색</a></li>
          <li><a href="#services">마이페이지</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">
     
      <div class="intro-info" style="margin-top: 50px;margin-left: 70px;">
        <h2>찾아독만의<br><span >AI solution</span><br><p></p>유기견 찾기 서비스</h2>
        <div>
          <a href="#services" class="btn-get-started scrollto">이용 방법</a> 
          <a href="#portfolio" class="btn-services scrollto">오늘 구조된 강아지</a>
        </div>
      </div>
 
    
    <div class="avatar-upload" >
       <form name="form1" method="post" action="foundtest.php" enctype="multipart/form-data">
       
        <div class="avatar-edit" style="margin-right: -280px;">
            <input type='file' name="upload" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
            
        </div>
        <div class="avatar-preview" style="margin-left: 140px;margin-top: -100px;">
            <div id="imagePreview" style="background-image: url('/Dog/img/1.Beagle-On-White-07.jpg')">
            </div>
            <button for="input-file" class="btn-dog" >강아지 찾기</button>
             <input type="submit" value="강아지 찾기" id="input-file" class="btn-services scrollto" style="background-color:#757575;color:#fff;position: relative; width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip:rect(0,0,0,0);border: 0;">
        </div>
        </form>
    </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>찾아독만의 기술력으로 당신의 소중한 유기견을 찾을 수 있도록 돕겠습니다.</p><br>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
             평균적으로 매년 유기동물의 수는 약 10만 마리에 달한다고 합니다.<br>
             하지만 이 많은 유기견중 나의 유기견을 찾기에는 어려움이 있습니다. <br>
             찾아독에서 도와드리겠습니다.<br>
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-eye"></i></div>
              <h4 class="title"><a href="">AI기술로 유기견 인식</a></h4>
              <p class="description">당신의 유기견 사진을 업로드하면 등록된 모든 유기견 중 내 유기견과 유사한 유기견을 추려내어 보여줍니다.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-handshake-o"></i></div>
              <h4 class="title"><a href="">간단한 보호자와의 연결</a></h4>
              <p class="description">당신이 찾는 유기견을 찾았을 때 보호자 및 보호소와 쉽게 연결하여 곧바로 전화연결 및 이메일 전송을 할 수 있습니다.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-search-plus"></i></div>
              <h4 class="title"><a href="">모든 유기동물 검색</a></h4>
              <p class="description">강아지 외에도 고양이 및 기타 유기동물을 검색 조건을 설정하여 조회 및 연결할 수 있습니다.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="/Dog/img/about-img.svg" class="img-fluid" alt="">
          </div>
        </div>

       

      

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Service 이용방법</h3>
          <p>처음 이용하시는 분은 아래의 메뉴얼을 따라해주세요.</p><br>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-images" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">1. 유기견 사진 업로드</a></h4>
              <p class="description">잃어버린 자신의 유기견 모습이 잘 담긴 사진을 메인화면 상단의 돋보기 버튼이나 사진업로드 버튼을 클릭하여 업로드 합니다.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-search-strong" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">2. 찾기 버튼 클릭</a></h4>
              <p class="description">자신의 유기견 사진이 잘 업로드 된 것을 확인 후 찾아보기 버튼을 클릭합니다.</p><br>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paw-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">3. 유사한 유기견들 확인</a></h4>
              <p class="description">분석된 자신의 유기견과 유사한 유기견들 결과 화면에서 자신의 유기견을 찾습니다.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-checkmark-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">4. 자신의 유기견 발견시 사진 클릭</a></h4>
              <p class="description">유기견을 찾았을 시 사진을 클릭하여 상세 정보 확인과 보호자와 연결할 수 있는 페이지로 이동합니다. </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-telephone-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">5. 보호자와의 연결</a></h4>
              <p class="description">보호자 및 보호소에 전화걸기 버튼을 클릭하여 전화연결을 하거나 이메일 주소 및 비밀번호를 입력하면 보호소에 메일을 보낼 수 있습니다.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-heart-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">6. 마이페이지</a></h4>
              <p class="description">자신이 찾은 유기견의 정보를 마이페이지에 저장하고 언제든 유기견의 정보및 보호소 정보를 볼 수 있습니다.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>How many lost?</h3>
          <p>전국의 실시간 유기동물의 수 입니다.</p>
        </header>
        <?php
             $totalCount=$object->body->totalCount;
                                ?>
        <div class="row counters" style="margin-left:440px;">
          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?= $totalCount ?></span>
            <p>이번달 구조된 유기동물 </p>
          </div>

        </div>

      </div>
    </section>

   
   <section id="portfolio" class="clearfix">
      <div class="container">
        <br><br><br>
        <header class="section-header">
            <center><h4 class="section-title">오늘 구조된 유기동물</h4></center>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active" style="background:#007bff;">All</li>
              <li data-filter=".강아지">강아지</li>
              <li data-filter=".고양이">고양이</li>
              <li data-filter=".기타">기타</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">
      <?php
             $data=$object->body;
             foreach($data->items->item as $store){
             $kind=$store->kindCd;
             $img_url=$store->popfile;
             $category='';
             $categoryDetail='';

             if(strpos($kind,'개')!==false)
                    $category='강아지';
                else if(strpos($kind,'고')!==false)
                    $category='고양이';
                else $category='기타';
            $categoryDetail=substr($kind,strrpos($kind,"&nbsp"));
        ?>
             <div class="col-lg-3 col-md-6 portfolio-item <?=$category?> wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?=$img_url?>"  alt="" width="260" height="260">
                <a href="<?=$img_url?>" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h6><a href="#"><?=$category?></a></h6>
                <p><?=$categoryDetail?></p>
              </div>
            </div>
          </div>
<?php } ?>

        </div>

      </div>
    </section>
  </main>

  
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>찾아독</h3>
            
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu Link</h4>
            <ul>
              <li><a href="#">메인화면</a></li>
              <li><a href="#">모든 유기동물 조회</a></li>
              <li><a href="#">마이페이지</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              서울특별시 <br>
              성남대로<br>
              가천대학교 <br>
              <strong>Phone:</strong> 010-4751-8402<br>
              <strong>Email:</strong> hoon1759@naver.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          

        </div>
      </div>
    </div>

    
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="/Dog/lib/jquery/jquery.min.js"></script>
  <script src="/Dog/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/Dog/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/Dog/lib/easing/easing.min.js"></script>
  <script src="/Dog/lib/mobile-nav/mobile-nav.js"></script>
  <script src="/Dog/lib/wow/wow.min.js"></script>
  <script src="/Dog/lib/waypoints/waypoints.min.js"></script>
  <script src="/Dog/lib/counterup/counterup.min.js"></script>
  <script src="/Dog/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/Dog/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="/Dog/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="/Dog/contactform/contactform.js"></script>
 
  <!-- Template Main Javascript File -->
  <script src="/Dog/js/main.js"></script>
    <script  src="/Dog/js/upload.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
</body>
</html>
