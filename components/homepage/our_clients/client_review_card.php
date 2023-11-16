<?php
function generateOurClient($array) {
    echo '<div class="our_clients_inner">';
    echo '<div class="our_client_top">';
    echo '<div class="our_client_img">';
    echo '<img src="' . $array['our_client_img'] . '" alt="Client Profile Picture" />';
    echo '</div>';
    echo '<div class="our_client_right">';
    echo '<div class="our_client_name">';
    echo '<h4>' . $array['our_client_name'] . '</h4>';
    echo '</div>';
    echo '<div class="our_client_ratings">';
    echo '<div class="time">';
    echo '<h4>' . $array['time_ago'] . '</h4>';
    echo '</div>';
    echo '<div class="stars">';

    // Loop to generate star images
    for ($i = 1; $i <= rand(1, 5); $i++) {
        echo '<div>';
        echo '<img src=".//..//..//..//images/home//our_clients//our-clients_ratings_star.svg" alt="ratings ' . $i . ' of 5" />';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="our_client_bottom">';
    echo '<p>We make sure that your safety is never compromised. This is why we
    hire all the staff under the roof of Home Comfort, just for your
    satisfaction.</p>';
    echo '</div>';
    echo '</div>';
}
?>