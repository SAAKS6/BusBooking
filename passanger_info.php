<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - PASSANGER INFO</title>
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
            <div class="Passanger_info_flex">
                <div class="top_form_graphics">
                    <img src="./images//form//form_top_graphics.svg" alt="Passanger Information">
                    <h3>Passanger Information</h3>
                </div>
                <div class="information">
                    <div class="form_top">
                        <form action="./passanger_info_process_form.php" method="post" class="main_form">
                            <!-- PASSANGER INFO -->
                            <div class="passanger_info">
                                <div class="left">
                                    <label for="fname">First Name: </label>
                                    <label for="mname">Middle Name: </label>
                                    <label for="lname">Last Name: </label>
                                    <label for="idnum">CNIC/ID Number: </label>
                                    <label for="gender">Gender: </label>
                                    <label for="tel">Phone Number:<span>*</span></label>
                                    <label for="dob">D.O.B:<span>*</span></label>
                                    <label for="email">Email:<span>*</span></label>
                                </div>
                                <div class="right">
                                    <input type="text" name="fname" id="fname" placeholder="first name" required>
                                    <input type="text" name="mname" id="mname" placeholder="middle name">
                                    <input type="text" name="lname" id="lname" required placeholder="last name">
                                    <input type="text" name="idnum" id="idnum" required placeholder="CNIC / ID">
                                    <div class="Gender_dropedown dropeDown">
                                        <select name="gender" id="gender" required>
                                            <option value="" disabled selected>select<span>*</span></option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                    <input type="number" name="tel" id="tel" placeholder="03xx xxxx xxxx">
                                    <input type="date" id="dob" name="dob" value="<?= date('Y-m-d') ?>" required>
                                    <input type="text" name="email" id="email" placeholder="example@gmail.com" required>
                                </div>
                            </div>
                    </div>


                    <div class="form_bottom">

                        <div class="previous_Btn">

                            <?php

                            if ($td->getType() == 1) { //one way
                                echo '<a href="./schedual.php" class="previous_btn" onclick="' . $td->setProgressBar(1) . '">< Previous</a>';
                            } else if ($td->getType() == 2) { //return
                                echo '<a href="./return.php" class="previous_btn" onclick="' . $td->setProgressBar(2) . '">< Previous</a>';
                            }
                            ?>

                        </div>
                        <div class="next_Btn">
                            <input type="submit" value="Next >" class="next_btn">
                        </div>

                        </form>



                    </div>
                </div>
            </div>

    </section>




















    <!-- FOOTER SECTION -->
    <?php
    include "./footer.php";
    ?>
</body>

</html>