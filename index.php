<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIHAL - HOME</title>
  <link rel="stylesheet" href="./home//style.css">

  <!-- INCLUDING PHP FILES -->


  <!-- BOOKING FORM SECTION - FORM LOCATION -->
  <?php
  require "./ARRAYS/booking_form/form_location_data.php";
  ?>

  <!-- AFTER BANNER -->
  <?php
  include "./COMPONENTS/homepage/after_banner/after_Banner.php";
  require "./ARRAYS/after_banner/after_banner_data.php";
  ?>


  <!-- EXPLORE OUR SERVICES  -->
  <?php
  include "./COMPONENTS/homepage/explore_our_services/service_card.php";
  require "./ARRAYS/explore_our_services/explore_our_services_data.php";
  ?>


  <!-- OUR CLIENTS  -->
  <?php
  include "./COMPONENTS/homepage/our_clients/client_review_card.php";
  require "./ARRAYS/our_clients/our_clients_data.php";
  ?>

</head>

<body>

  <!-- HEADER SECTION -->
  <header>
    <div class="page_width">
        <div class="nav_desktop">
            <div class="logo"><img src="./images/header/logo/logo.svg" alt="Company logo" /></div>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li class="outer_service">
                        <a href="/service">Services</a>
                        <div class="inner_service">
                            <ul class="service_list">
                                <li><a href="./check_booking//check_booking.php">My Booking</a></li>
                                <li><a href="./index//index.php">Book Now</a></li>
                                <li><a href="./courier//courier.php">Courier</a></li><!--CREATE THIS FILE-->
                            </ul>
                        </div>
                    </li>
                    <li><a href="./check_booking//check_booking.php">My Booking</a></li><!-- Add it to From & To DIV -->
                    
                    <li class="outer_user">
                        <a href="javascript:void(0)"><img src="./images/header//logo//user.png" alt="Call logo">
                                <span class="outer_user_span_flex">
                                    <?php
                                        // echo $session_id(); // This should be replaced with the following line
                                        if (isset($_SESSION["uname"])) {
                                            echo '<p>'.$_SESSION["uname"].'</p>';
                                        }
                                        else{
                                            echo '<p>Account</p>';
                                        }
                                    ?>
                                </span>
                        </a>
                        <div class="inner_user">
                            <ul class="user_list">
                                <?php
                                    if (isset($_SESSION["uname"])) {
                                        echo '<li><a href="./login/logout.php">Log out</a></li>';
                                    }
                                    else{
                                        echo '<li><a href="./login/login.php">Login</a></li>';
                                    }
                                ?>
                                <li><a href="./signup/signup.php">Sign up</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

  <!-- BANNER SECTION -->
  <section class="banner_section">
    <div class="page_width">
      <div class="banner_grid">
        <div class="banner_left">
          <h3>Best in World</h3>
          <h2>Welcome To</h2>
          <h1>
            <span>RIHAL</span>
          </h1>
          <p>
            RIHAL provides smooth global bus booking services at budget-friendly rates.
            We guarantee a seamless travel experience with our team of transportation experts.
            Book your ride with RIHAL for a comfortable and reliable travel experience.
          </p>
          <div class="btn_banner">
            <!-- LOOK FOR LOGIC THAT ALLOW US TO MOVE THE HOME PAGE TO 
            EMERGENCY DIV WHEN CLICKED ON THIS BUTTON -->
            <a href="javascript:void(0)">contact us</a>
            <!-- LOOK FOR LOGIC THAT ALLOW US TO MOVE THE HOME PAGE TO 
            AFTER_BANNER_SECTION WHEN CLICKED ON THIS BUTTON -->
            <a href="javascript:void(0)">learn more</a>
          </div>
        </div>
        <div class="banner_right"><!-- FROM & TO DIV -->

          <!-- STARTING FOR BOOKING MENU -->
          <div class="booking_menu_main">
            <form action="./home//home_process_form.php" method="post" class="booking_form">

              <div class="form_location"><!-- DIV START 1 -->
                <!-- FROM DROPE DOWN -->
                <div class="destination_dropedown dropeDown">
                  <select name="departure_city" id="from" required>
                    <option value="" disabled selected>From<span>*</span></option>
                  </select>
                </div>

                <!-- LOGO -->
                <div class="arrow_img">
                  <img src="./images//home//explore_our_services//two_way_arrow_black.svg" alt="Two Way Arrow">
                </div>

                <!-- FROM DROPE DOWN -->
                <div class="to_dropedown dropeDown">
                  <select name="arrival_city" id="to" required>
                    <option value="" disabled selected>To<span>*</span></option>
                  </select>
                </div>
              </div><!-- DIV END 1 -->

              <!-- TRIP TYPE -->
              <div class="form_trip_type">
                <p class="oneway" onclick="selectedValue(this)">One Way</p>
                <p class="return" onclick="selectedValue(this)">Return</p>
                <p class="multicity" onclick="selectedValue(this)">Multicity</p>
                <!-- Hidden input field to store the selected value -->
                <input type="hidden" name="selectedTripType" id="selectedTripType">
              </div>

              <!-- DATE'S => Depature & Arrival -->

              <div class="form_date"><!-- DIV START 2 -->
                <!-- Depature Date -->
                <div class="depature_date dates">
                  <label for="depatureDate">Depature Date<span>*</span></label>
                  <input type="date" id="departureDate" name="departure_Date" value="2023-11-25" required>
                </div>

                <!-- Return Date => Only show for Round Trip-->
                <div class="return_date dates return_date_hide">
                  <label for="return_date">Return Date<span>*</span></label>
                  <input type="date" id="return_date" name="return_date" value="2023-11-25" required>
                </div>
              </div><!-- DIV END 2 -->

              <div class="form-btn">
                <input type="submit" value="book now">
              </div>

            </form>
          </div>
          <!-- ENDING FOR BOOKING MENU -->

        </div>
      </div>
    </div>
  </section>

  <!-- AFTER BANNER SECTION -->
  <section class="after_banner_section section_margin">
    <div class="page_width">
      <div class="after_banner_grid">
        <?php
        foreach ($after_banner_data_array  as $array) {
          generateAfterBanner($array);
        }
        ?>
      </div>
    </div>
  </section>

  <!-- EXPLORE OUR SERVICES -->
  <section class="explore_our_services section_margin">
    <div class="page_width">
      <div class="explore_our_service_head">
        <h2> <span>Top Traveled </span>Routes</h2>
      </div>
      <div class="explore_our_services_grid">

        <?php
        // Call the renderServicesCard function with different parameters
        foreach ($explore_our_services_data_array  as $array) {
          generateServicesCard($array);
        }
        ?>
      </div>
    </div>
  </section>

  <!-- WHO WE ARE SECTION -->
  <section class="who_we_are_section section_margin">
    <div class="page_width">
      <div class="who_we_are_grid">

        <div class="who_we_are_left">
          <div class="who_we_are_img">
            <img src="./images//home//who_we_are//who_we_are_image.svg" alt="who we are image" />
          </div>
        </div>

        <div class="who_we_are_right">
          <h2>Who we <span>Are?</span></h2>
          <p>"RIHAL, a premier all-encompassing service provider, attends to your
            comprehensive needs with an assurance of quality. Our commitment lies
            in enhancing the lives of our users by delivering intelligent solutions
            to all their concerns. We take pride in offering an extensive array of services,
            ranging from travel to personalized assistance.
          </p>
          <p>Your safety is our paramount concern, and to ensure this, every member of the RIHAL
            team is carefully selected for your satisfaction. Our ambition is to emerge as the
            leading and renowned online travel services platform, delivering unparalleled services
            and experiences to our customers. Count on our experts for a gratifying and professional
            travel experience. At your request, our top-notch travel services are available precisely
            when and where you need them.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- COMPANY AUTHORITY SECTION -->
  <section class="company_authority_section section_margin">
    <div class="page_width">
      <div class="company_authority_grid">

        <div class="company_authority_left">
          <h1>Company <span>Authority</span></h1>
          <p>Essentially, selecting the right individual for your tasks is crucial. When appointing a service professional, it's important to consider specific factors. Identify a top-notch service provider capable of delivering excellent results that align with your expectations. Explore online platforms to find reputable home service companies and choose the one that best suits your requirements.</p>
          <p>RIHAL, a leading comprehensive service provider, addresses all your needs with a commitment to quality. Our primary goal is to enhance the lives of our consumers by offering intelligent solutions to their challenges. We take pride in delivering an extensive array of services, from home maintenance to personal assistance.
          </p>
        </div>

        <div class="company_authority_right">
          <div class="company_authority_img_background">
          </div>
          <div class="company_authority_img">
            <img src="./images//home//company_authority//company_authority_image.svg" alt="Company Authority image" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- OUR CLIENTS SECTION  -->
  <section class="our_clients_section section_margin">
    <div class="page_width">

      <div class="our_clients_title">
        <h2>Our <span>Customers</span></h2>
        <p>We prioritize your safety without compromise. At RIHAL, all our staff is carefully selected in-house to guarantee your satisfaction. Our vision is to become the largest and most renowned online bus booking service, providing our customers with the best services and experiences.</p>
      </div>

      <div class="our_clients_grid">

        <?php
        // Call the renderServicesCard function with different parameters
        foreach ($our_clients_data_array  as $array) {
          generateOurClient($array);
        }
        ?>

      </div>
    </div>
  </section>

  <!-- FOOTER SECTION -->
  <section class="quick_service_section">
  <div class="page_width">
    <div class="quick_service_inner_section">
      <h2>Customer Care</h2>
      <a href="tel:+971586747123"><img src="./images/header//logo//call.png" height="40" alt="Phone Logo">
        <span>+971 58 67 47 123</span>
      </a>
    </div>
  </div>
</section>

<footer>
  <div class="page_width">
    <div class="footer_inner_grid">
      <div class="footer_about">
        <div class="footer_about_img"><img src="./images//header//logo//logo.svg" alt="Company logo" /></div>
        <p class="footer_about_img_text">Your safety is our priority. At RIHAL, we exclusively recruit skilled professionals to ensure uncompromised security, just for your peace of mind.</div>
      <nav class="footer_nav">
        <ul>
          <li><a href="./index.php">Home</a></li>
          <li><a href="./service">Service</a></li>
          <li><a href="./service">My Booking</a></li>
          <li><a href="./contact-us">Contact Us</a></li>
        </ul>
      </nav>
      <nav class="footer_nav">
        <ul>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Linkedin</a></li>
          <li><a href="#">Instagram</a></li>
        </ul>
      </nav>
      <div class="footer_contect_us">
        <a href="tel:++971586747123">+971 58 67 47 123</a>
        <a href="mailto:info@rihal.com">info@rihal.com</a>

        <form class="form_footer" action="">
          <input type="text" placeholder="Enter Email" />
          <input type="submit" value="SEND" />
        </form>
      </div>
    </div>
    <div class="copyright">
      <hr />
      <p>Copyright © [2023] [Rihal / SAAKSASSOCIATES - Asfandyar Naeem]. All rights reserved. 
      <br>  
      No part of this website or any of its contents may be reproduced, copied, modified, or adapted, without the prior written consent of the copyright owner, unless otherwise indicated for stand-alone materials. Unauthorized use or reproduction of our content is a violation of copyright law and will be subject to legal action.
      </p>
    </div>
  </div>
</footer>

  <script>
    var formLocationDataArray = <?php echo json_encode($form_location_data_array); ?>;
    // var $fromcity;
  </script>

  <script src="./home//hscroll.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Call the function to populate the "From" dropdown
      populateDropdown('from', 'to', formLocationDataArray);
    });

    document.getElementById('from').addEventListener('change', function() {
      populateToDropdown(this.value, 'to', formLocationDataArray)
    });
  </script>

</body>

</html>