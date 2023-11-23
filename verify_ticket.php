<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - SCHEDUAL</title>
    <link rel="stylesheet" href="style.css">

    <!-- PROGRESS BAR SECTION  -->
    <?php
    include "./components/schedual/progress_bar_section/progress_bar_section_card.php";
    require "./arrays/progress_bar_section/progress_bar_section_data.php";
    ?>
    
    <!-- TICKET DETAILS CLASS  -->
    <?php
    include_once "./TICKET-OBJECT.php";
    $td = $_SESSION['TD'];
    ?>


</head>

<body>
    <!-- HEADER SECTION -->
    <?php
    include "./header.php";
    ?>

    <!-- PROGRESS SECTION -->
    <section class="progress_section section_margin">
        <div class="page_width">
            <div class="progress_flex">

                <?php
                $td->setProgressBar(4);
                // echo $td->getProgressBar();
                $form_trip_type = $td->getType();
                
                // $result = $td->getType();
                // echo gettype($result);
                if ($td->getType() == 1) { //IF TRIP SELECTED: ONE WAY
                    foreach ($progress_section_data_array_one_way  as $array) {
                        generateProgressSection($array, $td->getProgressBar());
                    }
                } else if ($td->getType() == 2) { //IF TRIP SELECTED: RETURN
                    foreach ($progress_section_data_array_return  as $array) {
                        generateProgressSection($array, $td->getProgressBar());
                    }
                }
                ?>

            </div>
        </div>
    </section>

    <!-- SCHEDUAL SECTION -->
    <!-- NEED TO WRITE THE SQL QUERY TO FETCH DATA OF BUS SCHEDUAL AND PASS IT TO FUNCTION -->
    <section class="schedual_section section_margin">
        <div class="page_width">
            <div class="schedual_flex">
                <div class="schedual_titles">
                    <h3>#</h3>
                    <h3>Date</h3>
                    <h3>Depature</h3>
                    <h3>Trip Time</h3>
                    <h3>Arrival</h3>
                    <h3>Price</h3>
                    <h3>Seats</h3>
                    <h3></h3>
                </div>
                <div>
                    <?php
                    try {
                        generateDepatureList();//change this function with generateTicket()
                    } catch (\Throwable $th) {
                        echo "QUERRY EXECUTION / FUNTION CALL ERROR (SCHEDUAL.php:67)";
                    }
                    ?>
                </div>
                <hr>
                <a href="./passanger_info.php" class="previous_btn" onclick="<?php $td->setProgressBar(3)?>"> < Previous</a>
            </div>
        </div>
    </section>

<!-- CREATE PAYMENT OPTION -->

    <!-- FOOTER SECTION -->
    <?php
    include "./footer.php";
    ?>
</body>

</html>