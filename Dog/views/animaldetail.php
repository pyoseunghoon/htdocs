<?php
    $petId=$_GET["petId"];
    $pageNo=1;
    $numOfRows=5000;
    $ch = curl_init();
    $url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
    $queryParams = '?' . 
    urlencode('pageNo').'='.$pageNo.'&'.
    urlencode('numOfRows').'='.$numOfRows.'&'.
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- Libraries CSS Files -->
  <link href="/Dog/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/Dog/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/Dog/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/Dog/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/Dog/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/Dog/css/style.css?ver=1" rel="stylesheet">
  <link href="/Dog/css/upload.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    </head>
<body>
	<div id="wrapper">
		<!-- start header -->
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
	<?php
    
        $data=$object->body;    
                foreach($data->items->item as $store){
                    $desertionNo= $store->desertionNo;
                    if($desertionNo == $petId){
                    $kind=$store->kindCd;
                    $img_url=$store->popfile;
                    $happenPlace=$store->happenPlace;
                    $colorCd=$store->colorCd;
                    $age=$store->age;
                    $weight=$store->weight;
                    $happenDt=$store->happenDt;
                    $noticeNo=$store->noticeNo;
                    $specialMark=$store->specialMark;
                    $careNm=$store->careNm;
			        $careTel=$store->careTel;
			        $careAddr=$store->careAddr;
			        $officeTel=$store->officetel;
			        $sexF=$store->sexCd;
                    
                    if($sexF == 'M')
                    $sex="수컷";
			        else if($sexF=='F')
			        $sex="암컷";
                    else
                    $sex="미상";
                    $neuterYn=$store->neuterYn;
                    if($neuterYn=="Y")
                    $ny="예";
                    else if($neuterYn=="N")
                    $ny="아니요";
                    else
                    $ny="미상";  
                       
                } }
        ?>
	
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<br><br><br><br>
				<div class="col-lg-6" style="float:left;margin-top:30px;margin-bottom:60px;bo">
					<img src="<?=$img_url?>" alt="" class="img-responsive" width="500" height="500" style="border-radius:30px"/>
                </div>
    
     <br><br><br>
      <div class="row">
        <div class="col-lg-12" style="float:left;margin-top:-30px;">
          <ul class="list-group">
            <li class="list-group-item active"><?=$kind?></li>
            <li class="list-group-item">색상 : <?=$colorCd?></li>
            <li class="list-group-item">성별 : <?=$sex?></li>
            <li class="list-group-item">중성화 여부 : <?=$ny?></li>
            <li class="list-group-item">나이 / 체중 : <?=$age?> / <?=$weight?></li>
            <li class="list-group-item">발견 일시 : <?=$happenDt?></li>
            
            <li class="list-group-item">발견 장소 : <?=$happenPlace?></li>
            <li class="list-group-item">특징 : <?=$specialMark?></li>
            <li class="list-group-item">보호소 이름 : <?=$careNm?></li>
          </ul>
        </div>
      </div>
    
                    
				</div>
			</div>
        </div>
            
	</section>
<section id="contact">
      <div class="container-fluid" >

        <div class="section-header" style="margin-top:-30px;">
          <h3>Email Contact</h3>
        </div>
    
        <div class="row wow fadeInUp" >
         <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p><?=$careAddr?></p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>vetai@daum.net</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p><?=$careTel?></p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="./phpMailer.php" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="이메일" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="비밀번호">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="제목" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="메세지"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">예약하기</button></div>
              </form>
            </div>
          </div>
           <div class="col-lg-3">
            </div>

        </div>

      </div>
    </section><!-- #contact -->
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
  </footer>
        
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        </body>
    </div>
    
    
    </body>
</html>