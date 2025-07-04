<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - RETURN</title>
    <link rel="stylesheet" href="../home/style.css">

    <!-- PROGRESS BAR SECTION  -->
    <?php
    include "../COMPONENTS/schedual/progress_bar_section/progress_bar_section_card.php";
    require "../ARRAYS/progress_bar_section/progress_bar_section_data.php";
    ?>

    <!-- RETURN LIST SECTION  -->
    <?php
    include "../COMPONENTS/schedual/schedual_section/return_section_list.php";
    ?>


    <!-- TICKET DETAILS CLASS  -->
    <?php
        include_once('../COMPONENTS/ticket/ticket_details.php');
        session_start();
        $td = $_SESSION['TD'];
    ?>


</head>

<body>
    <!-- HEADER SECTION -->
    <?php
    include "../header/header.php";
    ?>

    <!-- PROGRESS SECTION -->
    <section class="progress_section section_margin">
        <div class="page_width">
            <div class="progress_flex">

                <?php
                // echo( $td);
                $td->setProgressBar(2);
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
                <table class="table_titles">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Depature</th>
                        <th>Trip Time</th>
                        <th>Arrival</th>
                        <th>Price</th>
                        <th>Seats</th>
                        <th></th>
                    </tr>
                </table>

                <table class="table_list">
                    <?php
                    try {
                        generateReturnList();
                    } catch (\Throwable $th) {
                        echo "QUERRY EXECUTION / FUNTION CALL ERROR (RETURN.php:87)";
                    }
                    ?>
                </table>

                <a href="../schedual/schedual.php" class="previous_btn" onclick="<?php $td->setProgressBar(1) ?>">
                    < Previous</a>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php
    include "../footer/footer.php";
    ?>
</body>

</html>