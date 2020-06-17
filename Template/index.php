<!DOCTYPE html>
<html lang="en">

<?php
require_once('config/all.php');
$virtual_con = mysqli_connect("localhost", "root", "", "webproject");
$title = "London Race";

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Baker - v2.0.0
  * Template URL: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><?php echo $title ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <?php
      $menu1 = "Home";
      $menu2 = "About";
      $menu3 = "Racers";
      $menu4 = "Cars";
      $menu5 = "Sponsors";
      $menu6 = "Register";
      $menu7 = "Contact";
      $menu8 = "Login";
      if (isset($_SESSION['UserName'])) {
        $UserName = $_GET['UserName'];
        $rowcount = 1;
      ?>

        <?php
      } else if (isset($_GET['UserName'])) {
        //  echo 'repost value exists';
        $chkU = $_GET['UserName'];
        $chkP = $_GET['UserPasswd'];
        $result = getlogin($chkU, $chkP, $virtual_con);

        //check my $sql command
        if (!$result) {
          echo 'Could not run query';
        }
        $row = mysqli_fetch_assoc($result);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount != null) {
        ?>
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="#header"><?php echo $menu1 ?></a></li>
              <li><a href="#about"><?php echo $menu2 ?></a></li>
              <li><a href="#services"><?php echo $menu3 ?></a></li>
              <li><a href="#portfolio"><?php echo $menu4 ?></a></li>
              <li><a href="#team"><?php echo $menu5 ?></a></li>
              <li><a href="#contact"><?php echo $menu7 ?></a></li>
              <li> <a href="">Welcome <?php echo $_GET['UserName'] ?></a></li>
              <li> <a href="logout.php">Logout</a></li>

            </ul>
          </nav>
        <?php
        } else {
          $msg111 = "Your login is unsuccessful.";
          $to111 = 'index.php';
          goto2($to111, $msg111);
        }
      } else {

        ?>
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="#header"><?php echo $menu1 ?></a></li>
            <li><a href="#about"><?php echo $menu2 ?></a></li>
            <li><a href="#services"><?php echo $menu3 ?></a></li>
            <li><a href="#portfolio"><?php echo $menu4 ?></a></li>
            <li><a href="#team"><?php echo $menu5 ?></a></li>
            <li><a href="#pricing"><?php echo $menu6 ?></a></li>
            <li><a href="#contact"><?php echo $menu7 ?></a></li>
            <li><a href="login.php"><?php echo $menu8 ?></a></li>

          </ul>
        </nav><!-- .nav-menu -->
      <?php } ?>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Welcome to <?php echo $title ?></h1>
      <?php
      $mainDesc = "Your go-to source for the latest news, video highlights, GP results, live timing, in-depth analysis and expert commentary."
      ?>
      <h2><?php echo $mainDesc ?></h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <?php
      $showSponsorSQL = 'SELECT * FROM `sponsors`';
      $getSponsor = mysqli_query($virtual_con, $showSponsorSQL);

      ?>

      <div class="container">

        <div class="row">
          <?php
          while ($row = mysqli_fetch_assoc($getSponsor)) {
          ?>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="<?php echo $row['SponsorPic']; ?>" class="img-fluid" alt="">
            </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/LondonCity.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <?php
            $raceWeatherTitle = "Weather";
            $raceDateTitle = "Date";
            $raceTrackName = "Prince George Circuit";
            $raceTrackInfo = "Prince George Circuit is a race circuit in East London in Eastern Cape Province, South Africa. On this course the South African Grand Prix was hosted in 1934, and 1936 to 1939 when racing was halted due to World War II, and then in 1960–66.";
            $raceDate = "The race will be on the 24th of september, 2020";
            $raceWeather = "The weather expected to be 22 degrees celsius, and will be partly clouded";
            ?>
            <h3><?php echo $raceTrackName ?></h3>
            <p>
              <?php echo $raceTrackInfo ?>
            </p>
            <div class="row">
              <div class="col-md-6">
                <i class="bx bx-receipt"></i>
                <h4><?php echo $raceDateTitle ?></h4>
                <p><?php echo $raceDate ?></p>
              </div>
              <div class="col-md-6">
                <i class="bx bx-cube-alt"></i>
                <h4><?php echo $raceWeatherTitle ?></h4>
                <p><?php echo $raceWeather ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">
          <?php
          $sqlRacerMax = "select max(RacerID) as m from racers";
          $result = mysqli_query($virtual_con, $sqlRacerMax);
          $getRacerMaxRow = mysqli_fetch_assoc($result);
          $maxRacerNum = $getRacerMaxRow['m'];

          $sqlUserMax = "select max(UserID) as u from Users";
          $result = mysqli_query($virtual_con, $sqlUserMax);
          $getUserMaxRow = mysqli_fetch_assoc($result);
          $maxUserNum = $getUserMaxRow['u'];
          ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $maxRacerNum ?></span>
            <p>Racers</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">11,000</span>
            <p>Total Seats</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">8,463</span>
            <p>Seats Bought</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $maxUserNum ?></span>
            <p>Registers to News</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $menu3 ?></h2>
          <?php
          $racersString = "Here are all the racers that will be racing in the " . $raceTrackName . " Race Track in the " . $title;
          ?>
          <p><?php echo $racersString ?></p>
        </div>

        <div class="row">
          <?php
          $sqlSelectRacer = 'SELECT * FROM `racers`';
          $sqlSelectCarName = 'SELECT CarName FROM allowablecars INNER JOIN racers on racers.CarID = allowablecars.CarID ';

          $result = mysqli_query($virtual_con, $sqlSelectRacer);
          $result1 = mysqli_query($virtual_con, $sqlSelectCarName);
          ?>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $row1 = mysqli_fetch_assoc($result1);
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-blue">
                <div class="icon">
                  <i><img src="<?php echo $row['RacerPic']; ?>" style="width: 64px; height: 64px; border-radius: 50%;"></i>
                </div>
                <h4><a><?php echo $row['RacerFirstName'] . ' ' . $row['RacerLastName']; ?></a></h4>
                <p>He is <?php echo $row['RacerAge']; ?> years old, and he will drive a <?php echo $row1['CarName']; ?> withe the number <?php echo $row['RacerCarNumber']; ?> and <?php echo $row['RacerCarColor']; ?> color</p>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Services Section -->
    <?php
    if (isset($_SESSION['UserName'])) {
    } else if (isset($_GET['UserName'])) {
    } else {
    ?>
      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">
          <?php
          $regNowString = "Register Now!!";
          $regNowText = "Register now to be the first one to know about the latest news regarding the race.";
          ?>
          <div class="text-center">
            <h3><?php echo $regNowString ?></h3>
            <p><?php echo $regNowText ?></p>
            <a class="cta-btn" href="#pricing"><?php echo $menu6 ?></a>
          </div>

        </div>
      </section><!-- End Cta Section -->
    <?php } ?>
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <?php
          $pressTitle = "Press";
          $pressTxt = "Here are what the experts said about the upcoming race in london.";

          ?>
          <h2><?php echo $pressTitle ?></h2>
          <p><?php echo $pressTxt ?></p>
        </div>

        <div class="owl-carousel testimonials-carousel">
          <?php
          $showExpertSQL = 'SELECT * FROM `experts`';
          $getExpert = mysqli_query($virtual_con, $showExpertSQL);

          while ($row = mysqli_fetch_assoc($getExpert)) {
          ?>
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php echo $row['ExpertWords'] ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?php echo $row['ExpertPic'] ?>" class="testimonial-img" alt="">
              <h3><?php echo $row['ExpertName'] ?></h3>
              <h4><?php echo $row['ExpertPosition'] ?></h4>
            </div>
          <?php } ?>

        </div>

      </div>

    </section><!-- End Testimonials Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $menu4 ?></h2>
          <?php
          $carSectionStr = "Here you will find all the allowable cars in the race, each driver will drive one of these amaizing cars."

          ?>
          <p><?php echo $carSectionStr ?></p>
        </div>
        <?php
        $sqlSelectCar = 'SELECT * FROM `allowablecars`';
        $result = mysqli_query($virtual_con, $sqlSelectCar);

        ?>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php
              // $sqlCarMax = "select max(CarID) as m from Cars";
              // $result = mysqli_query($virtual_con, $sqlCarMax);
              // $getCarMaxRow = mysqli_fetch_assoc($result);
              // $maxCarNum = $getCarMaxRow['m'];
              $sqlCarCmp = "SELECT `CarCompanyName`, COUNT(*) FROM `allowablecars` GROUP BY `CarCompanyName` HAVING COUNT(*) > 1";
              $result1 = mysqli_query($virtual_con, $sqlCarCmp);
              $CarCmp = mysqli_fetch_assoc($result1);
              while ($row = mysqli_fetch_assoc($result)) {

                // while ($CarCmp[1] != $row['CarCompanyName']) {
              ?>
                <li data-filter=".filter-<?php echo $row['CarCompanyName'] ?>"><?php echo $row['CarCompanyName'] ?></li>
              <?php } ?>
              <!-- <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <?php
          $sqlSelectCar = 'SELECT * FROM `allowablecars`';
          $result = mysqli_query($virtual_con, $sqlSelectCar);
          while ($row = mysqli_fetch_assoc($result)) {

          ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row['CarCompanyName'] ?>">
              <img src="<?php echo $row['CarPic'] ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $row['CarName'] ?></h4>
                <p><?php echo $row['CarCompanyName'] ?></p>
                <a href="<?php echo $row['CarPic'] ?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $menu5 ?></h2>
          <?php
          $sponsorSectionStr = "Those are the generous sponsors who will sponsor this race."

          ?>
          <p><?php echo $sponsorSectionStr ?></p>
        </div>

        <div class="row">
          <?php
          $showSponsorSQL = 'SELECT * FROM `sponsors`';
          $getSponsor = mysqli_query($virtual_con, $showSponsorSQL);

          while ($row = mysqli_fetch_assoc($getSponsor)) {
          ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="<?php echo $row['SponsorPic'] ?>" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href=""><i class="icofont-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?php echo $row['SponsorName'] ?></h4>
                  <span><?php echo $row['SponsorPosition'] ?></span>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Team Section -->
    <?php
    if (isset($_GET['UserName'])) {
    } else {

    ?>
      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="contact">

        <div class="container">
          <div class="section-title">
            <h2><?php echo $menu6 ?></h2>
            <?php
            $RegSectionStr = "Register here so you can get the latest news about the race."

            ?>
            <p><?php echo $RegSectionStr ?></p>
            <div class="section-title">
              <?php
              if (isset($_POST['but_upload'])) {
                $sqlGetMax = "select max(UserID) as m from users";
                $result = mysqli_query($virtual_con, $sqlGetMax);
                $row = mysqli_fetch_assoc($result);
                $maxval = $row['m'] + 3;
                $insertsql = "insert into users (UserID, UserName, UserPasswd, UserEmail) Values ('" . $maxval . "', '" . $_POST['UserName'] . "', '" . $_POST['UserPasswd'] . "', '" . $_POST['UserEmail'] . "')";
                $result = mysqli_query($virtual_con, $insertsql);
                $to = "index.php";
                if ($result != NULL) {
                  //delete  Success
                  $msg = "Thank you for registering";
                } else {
                  //delete failure
                  $msg = "Register was not successful";
                }
                goto2($to, $msg);
              } else {
                $sqlchkrow = "select max(UserID) as m from users";
                $result = mysqli_query($virtual_con, $sqlchkrow);
                $row = mysqli_fetch_assoc($result);
                $maxval = $row['m'];
              ?>

                <form method="post" action="">
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="UserName">User Name</label>
                      <input name="UserName" type="text" class="form-control" placeholder="Your Name" />
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="UserPasswd">User Password</label>
                      <input name="UserPasswd" type="text" class="form-control" placeholder="Your Password" />
                    </div>
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="UserEmail">User Email</label>
                    <input name="UserEmail" type="text" class="form-control" placeholder="Email" />
                    <div class="validate"></div>
                  </div>
                  <div class="text-center"><button type="submit" name="but_upload" style="font-family:Raleway, sans-serif; background: #ffc107; font-weight: 500; font-size: 15px; letter-spacing: 1px; display: inline-block; padding: 9px 35px; border-radius: 50px; transition: 0.5s; border: 2px solid #ffc107; color: #fff;">Register</button></div>
                </form>

              <?php } ?>
            </div>
          </div>
        </div>
      </section>
    <?php } ?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $menu7 ?></h2>
          <p></p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>1154 Abelson, Oxford Street, Eastern London, London</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <?php

            if (isset($_POST['but_upload1'])) {
              $sqlGetMax = "select max(mUserID) as m from messages";
              $result = mysqli_query($virtual_con, $sqlGetMax);
              $row = mysqli_fetch_assoc($result);
              $maxval1 = $row['m'] + 3;
              $insertsql = "insert into messages (mUserID, mUserName, mUserSubject, mUserEmail, mUserMessage) Values ('" . $maxval1 . "', '" . $_POST['mUserName'] . "', '" . $_POST['mUserSubject'] . "', '" . $_POST['mUserEmail'] . "', '" . $_POST['mUserMessage'] . "')";
              $result = mysqli_query($virtual_con, $insertsql);
              $to = "index.php";
              if ($result != NULL) {
                //delete  Success
                $msg = "Your message has been sent. Thank you!";
              } else {
                //delete failure
                $msg = "Something went wrong";
              }
              goto2($to, $msg);
            } else {
              $sqlchkrow = "select max(mUserID) as m from messages";
              $result = mysqli_query($virtual_con, $sqlchkrow);
              $row = mysqli_fetch_assoc($result);
              $maxval = $row['m'];
            ?>
              <form method="post" action="">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="mUserName">User Name</label>
                    <input name="mUserName" type="text" class="form-control" placeholder="Your Name" />
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="mUserEmail">User Email</label>
                    <input name="mUserEmail" type="text" class="form-control" placeholder="Your Email" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="mUserSubject">Message Subject</label>
                  <input name="mUserSubject" type="text" class="form-control" placeholder="Subject" />
                </div>
                <div class="form-group">
                  <label for="mUserMessage">Message</label>
                  <textarea name="mUserMessage" type="text" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="text-center"><button type="submit" name="but_upload1" style="font-family:Raleway, sans-serif; background: #ffc107; font-weight: 500; font-size: 15px; letter-spacing: 1px; display: inline-block; padding: 9px 35px; border-radius: 50px; transition: 0.5s; border: 2px solid #ffc107; color: #fff;">Send</button></div>
              </form>

            <?php } ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <!-- <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Baker</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div> -->

    <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

    <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

    <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> -->

    </div>
    </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          Designed by:
          <br>
          Abdulaziz Abdulrahman Awad Ba Haj <strong><span>A18CS4057</span></strong>.
          <br>
          Abdulaziz Abdulrahman Awad Ba Haj <strong><span>A18CS4057</span></strong>.
        </div>

        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/ -->
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>