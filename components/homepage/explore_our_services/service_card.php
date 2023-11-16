<?php
function generateServicesCard($array) {
    // echo '<div class="explore_our_services_inner">';
    // echo '  <div class="explore_our_services_image">';
    // echo '    <img src="' . $array['card_img'] . '" alt="" />';
    // echo '  </div>';
    // echo '  <div class="explore_our_services_white">';
    // echo '    <h3 class="explore_our_services_title">' . $array['card_text'] . '</h3>';
    // echo '    <button class="explore_our_services_button">Book Now</button>';
    // echo '  </div>';
    // echo '</div>';


    
    $print = '
    <div class="explore_our_services_inner">
    <div class="explore_our_services_image">
    <img src="' . $array['card_img'] . '" alt="" />
    </div>
    <div class="explore_our_services_white">
    <h3 class="explore_our_services_title">' . $array['card_text'] . '</h3>
    <button class="explore_our_services_button">Book Now</button>
    </div>
    </div>
    ';
    echo $print;
    
}
?>