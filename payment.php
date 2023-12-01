<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - PAYMENT</title>
    <link rel="stylesheet" href="style.css">

    <!-- PROGRESS BAR SECTION  -->
    <?php
    include "./components/schedual/progress_bar_section/progress_bar_section_card.php";
    require "./arrays/progress_bar_section/progress_bar_section_data.php";
    ?>

    <!-- PAYMENT OPTION SECTION  -->
    <?php
    include "./components/payment/payment_option_card.php";
    require "./arrays/payment_section/payment_option_data.php";
    ?>

    <!-- TICKET DETAILS CLASS  -->
    <?php
    include('./components/ticket/ticket_details.php');
    session_start();
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
                if ($td->getType() == 1) { //one way
                    $td->setProgressBar(3);
                } else if ($td->getType() == 2) { //return
                    $td->setProgressBar(4);
                }
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

    <!-- PAYMENT SECTION -->
    <!-- NEED TO WRITE THE SQL QUERY TO FETCH DATA OF BUS SCHEDUAL AND PASS IT TO FUNCTION -->
    <section class="payment_section section_margin">
        <div class="page_width">
            <div class="payment_outter">
                <!-- PAYMENT OPTION SECTION -->
                <div class="payment_option_grid">
                    <?php
                    foreach ($payment_option_data_array  as $array) {
                        generatePaymentOptions($array);
                    }
                    ?>
                </div>
                <div class="schedual_flex Passanger_info_flex">
                    <table class="table_list" style="padding-bottom: 0px;">
                        <form action="./generateTicket.php" method="post" class="passanger_form">
                            <tr>
                                <td>
                                    <input type="text" name="credit_card_number" id="credit_card_number" placeholder="Enter Number" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="cvv" id="cvv" placeholder="Enter CVV" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" id="exp" name="exp" required>
                                </td>
                            </tr>
                            <tr style="border-bottom: none;">
                                <td class="previous_flex">
                                    <?php

                                    if ($td->getType() == 1) { //one way
                                        echo '<a href="./verify_ticket.php" class="previous_btn" onclick="' . $td->setProgressBar(3) . '">< Previous</a>';
                                    } else if ($td->getType() == 2) { //return
                                        echo '<a href="./verify_ticket.php" class="previous_btn" onclick="' . $td->setProgressBar(4) . '">< Previous</a>';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <div class="progress_book_now">
                                        <input type="submit" value="CHECKOUT" class="next_btn">
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
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