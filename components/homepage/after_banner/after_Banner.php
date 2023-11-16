<?php
function generateAfterBanner($array) {
    echo '<div class="after_banner_inner">';
    echo '<div class="after_banner_inner_img">';
    echo '<img src="' . $array['card_img'] . '" alt="' . $array['card_alt'] . '" />';
    echo '</div>';
    echo '<h2>' . $array['card_text'] . '</h2>';
    echo '</div>';
}
?>