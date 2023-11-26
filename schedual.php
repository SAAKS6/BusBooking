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

    <!-- RETURN LIST SECTION  -->
    <?php
    include "./components/schedual/schedual_section/schedual_section_list.php";
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
                $td->setProgressBar(1);
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
                        generateDepatureList();
                    } catch (\Throwable $th) {
                        echo "QUERRY EXECUTION / FUNTION CALL ERROR (SCHEDUAL.php:87)";
                    }
                    ?>
                </table>

                <a href="./index.php" class="previous_btn" onclick="<?php $td->setProgressBar(0) ?>">
                    < Previous</a>
            </div>
        </div>

        <?php
        if ($td->getType() == 1) { //one way
            echo '
                <form action="./passanger_info.php" class="schedual_list" method="post">
                    <div class="progress_book_now">
                        <input type="submit" value="Book Now" name="book_now" onclick="' . $td->setProgressBar(2) . '" data-sqlQuery-id=' . $td->getType() . '>
                    </div>
                </form>';
        } else if ($td->getType() == 2) { //return
            echo '
                <form action="./return.php" class="schedual_list" method="post">
                    <div class="progress_book_now">
                        <input type="submit" value="Book Now" name="book_now" onclick="' . $td->setProgressBar(2) . '" data-sqlQuery-id=' . $td->getType() . '>
                        </div>
                </form>';
        }
        ?>
    </section>

    <!-- FOOTER SECTION -->
    <?php
    include "./footer.php";
    ?>
</body>

</html>