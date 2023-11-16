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
          <h3>Best in Dubai</h3>
          <h2>Welcome To</h2>
          <h1>
            Hello <span>Rihalers</span>
          </h1>
          <p>
            Home Comfort provides home repair services in Dubai with
            reasonable rates. We fix it right with home comfort professional
            experts.
          </p>
          <div class="btn_banner">
            <a href="javascript:void(0)">contact us</a>
            <a href="javascript:void(0)">learn more</a>
          </div>
        </div>
        <div class="banner_right">
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
        <h2>Explore our <span>Services</span></h2>
      </div>
      <div class="explore_our_services_grid">

        <?php
        // Call the renderServicesCard function with different parameters
        foreach ($explore_our_services_data_array  as $array) {
          generateServicesCard($array);
        }

        // Add more calls for other services
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
          <p>Home Comfort is a leading multiple service provider company catering to your 360 needs with quality guaranteed. The aim and priority of Home Comfort are to add value to our consumers’ lives by providing smart solutions to all their problems. Our pride is providing the most extensive range of services. From home maintenance to personal assistance.
          </p>
          <p>We make sure that your safety is never compromised. This is why we hire all the staff under the roof of Home Comfort, just for your satisfaction. Our goal is to become the largest and most famous online home services platform and provide our customers with the best of services and experience. Our experts will give you the most satisfying experience and professionalism. On your demand, all of our best home maintenance and renovation services are available at the very right time and place.
          </p>
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
          <p>Basically, finding the right person to do up the works is very much important and for that, there are certain things you should keep in mind while appointing a service man. Analyze the best service provider who can perform the works well and give you desired results. You can search for professional home service companies online and get the best company that meets up your demands.
          </p>
          <p>Home Comfort is a leading multiple service provider company catering to your 360 needs with quality guaranteed. The aim and priority of Home Comfort are to add value to our consumers’ lives by providing smart solutions to all their problems. Our pride is providing the most extensive range of services. From home maintenance to personal assistance.
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
        <p>We make sure that your safety is never compromised. This is why we hire all the staff under the roof of Home Comfort, just for your satisfaction. Our goal is to become the largest and most famous online home services platform and provide our customers with the best of services and experience.
        </p>
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