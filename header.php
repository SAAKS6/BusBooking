<header>
    <div class="page_width">
        <div class="nav_desktop">
            <div class="logo"><img src="./images/header/logo/logo.svg" alt="Company logo" /></div>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="outer_service">
                        <a href="/service">Services</a>
                        <div class="inner_service">
                            <ul class="service_list">
                                <li><a href="./check_booking//check_booking.php">My Booking</a></li>
                                <li><a href="./index.php">Book Now</a></li>
                                <li><a href="./courier/courier.php">Courier</a></li><!--CREATE THIS FILE-->
                            </ul>
                        </div>
                    </li>
                    <li><a href="./check_booking//check_booking.php">My Booking</a></li><!-- Add it to From & To DIV -->
                    
                    <li class="outer_user">
                        <a href="javascript:void(0)"><img src="./images/header//logo//user.png" height="20" alt="Call logo">
                                <span>
                                    <?php
                                        // echo $session_id(); // This should be replaced with the following line
                                        if (isset($_SESSION["uname"])) {
                                            echo $_SESSION["uname"];
                                        }
                                    ?>
                                </span>
                        </a>
                        <div class="inner_user">
                            <ul class="user_list">
                                <?php
                                    if (isset($_SESSION["uname"])) {
                                        echo '<li><a href="./login//logout.php">Log out</a></li>';
                                    }
                                    else{
                                        echo '<li><a href="./login//login.php">Login</a></li>';
                                    }
                                ?>
                                <li><a href="./signup/signup.php">Sign up</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>