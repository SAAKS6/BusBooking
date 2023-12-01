<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - TICKET</title>
    <link rel="stylesheet" href="../home/style.css">

    <!-- PROGRESS BAR SECTION  -->
    <?php
    include "../COMPONENTS/schedual/progress_bar_section/progress_bar_section_card.php";
    require "../ARRAYS/progress_bar_section/progress_bar_section_data.php";
    ?>

    <!-- GENERATE TICKET SECTION  -->
    <?php
    include "../COMPONENTS/ticket/generate_ticket.php";
    ?>

    <!-- TICKET DETAILS CLASS  -->
    <?php
    // include_once "./db.php";
    include_once('../components/ticket/ticket_details.php');
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
                if ($td->getType() == 1) { //one way
                    $td->setProgressBar(3);
                } else if ($td->getType() == 2) { //return
                    $td->setProgressBar(4);
                }


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
    <section class="verify_ticket_section section_margin">
        <div class="page_width">
        <div class="schedual_flex" style="border-bottom: 2px dashed #058B8C;">
                
                <table class="table_list" >
                    <?php
                    try {
                        generateTicket();
                    } catch (\Throwable $th) {
                        echo "QUERRY EXECUTION / FUNTION CALL ERROR (SCHEDUAL.php:87)";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    
    <!-- FOOTER SECTION -->
    <?php
    include "../footer/footer.php";
    ?>
</body>

</html>