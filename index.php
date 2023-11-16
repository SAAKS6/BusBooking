<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIHAL</title>
  <link rel="stylesheet" href="style.css">

  <!-- INCLUDING PHP FILES -->


  <!-- AFTER BANNER -->
  <?php
  include "./components/homepage/after_banner/after_Banner.php";
  require "./arrays/after_banner/after_banner_data.php";
  ?>


  <!-- EXPLORE OUR SERVICES  -->
  <?php
  include "./components/homepage/explore_our_services/service_card.php";
  require "./arrays/explore_our_services/explore_our_services_data.php";
  ?>


  <!-- OUR CLIENTS  -->
  <?php
  include "./components/homepage/our_clients/client_review_card.php";
  require "./arrays/our_clients/our_clients_data.php";
  ?>

</head>

<body>
  <!-- HEADER SECTION -->
  <?php
  include "./header.php";
  ?>

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
            <a href="javascript:void(0)">contact us</a>
            <a href="javascript:void(0)">learn more</a>
          </div>
        </div>
        <div class="banner_right"><!-- FROM & TO DIV -->
          <div class="banner_img">
            <img src="./images/home/banner/banner.svg" alt="" />
          </div>
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
  <?php
  include "./footer.php";
  ?>

<script src="hscroll.js"></script>
</body>

</html>