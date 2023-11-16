<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL</title>

    <!-- INCLUDING PHP FILES -->
    <!-- Explore Our Services  -->
    <?php
    include "./components/homepage/explore_our_services/service_card";

    // Explore Our Services Images
    $acServiceImg = "./images//home//explore_our_services//AC_Service_Card.png";
    $ductCleaningServiceImg = "./images//home//explore_our_services//Duct_Cleaning_Card.png";
    $handymanServiceImg = "./images//home//explore_our_services//Plumbing_Service_Card.png";
    ?>

</head>

<body>
<!-- HEADER -->
    <?php
    include "./header.php";
     ?>

<!-- EXPLORE OUR SERVICES -->
    <section class="explore_our_services section_margin">
        <div class="page_width">
            <div class="explore_our_service_head">
                <h2>Explore our <span>Services</span></h2>
            </div>
            <div class="explore_our_services_grid">

                <?php
                // Call the renderServicesCard function with different parameters
                renderServicesCard($acServiceImg, "AC Service");
                renderServicesCard($ductCleaningServiceImg, "Duct Cleaning");
                renderServicesCard($handymanServiceImg, "Handyman");
                // Add more calls for other services
                ?>

            </div>
        </div>
    </section>

<!-- HEADER -->
<?php
    include "./footer.php";
     ?>
</body>

</html>