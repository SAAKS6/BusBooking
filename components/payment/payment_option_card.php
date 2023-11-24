<?php
function generatePaymentOptions($array)
{
    $print = '
    <div class="option_img">
        <img src="'.$array['payment_option_img'].'" 
        alt="Payment option partner image">
    </div>';

    echo $print;
}
