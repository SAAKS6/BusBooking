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
                if ($td->getType() == 1) { //one way
                    $td->setProgressBar(4);
                } else if ($td->getType() == 2) { //return
                    $td->setProgressBar(5);
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

    <!-- PAYMENT SECTION -->
    <!-- NEED TO WRITE THE SQL QUERY TO FETCH DATA OF BUS SCHEDUAL AND PASS IT TO FUNCTION -->
    <section class="payment_section section_margin">
        <div class="page_width">
            <div class="payment_outter">
                <!-- PAYMENT OPTION SECTION -->
                <div class="payment_option_grid">
                    <?php
                    foreach ($progress_section_data_array_one_way  as $array) {
                        generatePaymentOptions($array);
                    }
                    ?>
                </div>

                <div class="information">
                    <div class="payment_info_outter form_top">
                        <form action="./generateTicket.php" method="post" class="main_form">
                            <!-- CARD INFO -->
                            <div class="payment_info passanger_info">
                                <div class="left">
                                    <label for="credit_card_number">Credit Card Number: </label>
                                    <label for="cvv">CVV: </label>
                                    <label for="exp">Exp: <span>*</span></label>
                                </div>
                                <div class="right">
                                    <input type="text" name="credit_card_number" id="credit_card_number" placeholder="xxxx xxxx xxxx" required>
                                    <input type="text" name="cvv" id="cvv" placeholder="0xx" required>
                                    <input type="date" id="exp" name="exp" required>
                                </div>
                            </div>
                    </div>


                    <div class="payment_form_bottom form_bottom">

                        <div class="payment_form_bottom_inner">

                            <?php

                            if ($td->getType() == 1) { //one way
                                echo '<a href="./verify_ticket.php" class="previous_btn" onclick="' . $td->setProgressBar(3) . '">< Previous</a>';
                            } else if ($td->getType() == 2) { //return
                                echo '<a href="./verify_ticket.php" class="previous_btn" onclick="' . $td->setProgressBar(4) . '">< Previous</a>';
                            }
                            ?>

                        </div>
                        <div class="next_Btn">
                            <input type="submit" value="CHECKOUT" class="next_btn">
                        </div>

                        </form>



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