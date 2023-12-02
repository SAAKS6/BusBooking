<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - PASSANGER INFO</title>
    <link rel="stylesheet" href="../home/style.css">

    <!-- PROGRESS BAR SECTION  -->
    <?php
    include "../COMPONENTS/schedual/progress_bar_section/progress_bar_section_card.php";
    require "../ARRAYS/progress_bar_section/progress_bar_section_data.php";
    ?>

    <!-- TICKET DETAILS CLASS  -->
    <?php
    include_once('../COMPONENTS/ticket/ticket_details.php');
    // if($_SESSION['TRIPTYPE']==1){
        session_start();
    // }
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
                    $td->setProgressBar(2);
                } else if ($td->getType() == 2) { //return
                    $td->setProgressBar(3);
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

    <!-- PASSANGER INFO SECTION -->
    <section class="passanger_info_section section_margin">
        <div class="page_width">
            <div class="Passanger_info_flex ">
                <div class="top_form_graphics">
                    <img src="../images//form//form_top_graphics.svg" alt="Passanger Information">
                    <h3>Passanger Information</h3>
                </div>
                <table class="table_list">
                    <form action="../passanger_info/passanger_info_process_form.php" method="post" class="passanger_form">
                        <tr>
                            <td>
                                <input type="text" name="fname" id="fname" placeholder="enter first name" required>
                            </td>
                            <td>
                                <input type="text" name="mname" id="mname" placeholder="enter middle name">
                            </td>
                            <td>
                                <input type="text" name="lname" id="lname" required placeholder="enter last name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="idnum" id="idnum" required placeholder="Enter cnic">
                            </td>
                            <td>
                                <div class="Gender_dropedown dropeDown">
                                    <select name="gender" id="gender" required>
                                        <option value="" disabled selected>select gender<span>*</span></option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="date" id="dob" name="dob" value="<?= date('Y-m-d') ?>" required>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="tel" id="tel" placeholder="Enter number">
                            </td>
                            <td></td>
                            <td>
                                <input type="text" name="email" id="email" placeholder="Enter email" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="previous_flex">
                                <?php

                                if ($td->getType() == 1) { //one way
                                    echo '<a href="../schedual/schedual.php" class="previous_btn" onclick="' . $td->setProgressBar(1) . '">< Previous</a>';
                                } else if ($td->getType() == 2) { //return
                                    echo '<a href="../return/return.php" class="previous_btn" onclick="' . $td->setProgressBar(2) . '">< Previous</a>';
                                }
                                ?>
                            </td>
                            
                            <td>
                            <div class="progress_book_now">
                                <input type="submit" value="Next >" class="next_btn">
                            </div>
                            </td>
                        </tr>
                    </form>
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