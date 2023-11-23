<?php
function generateProgressSection($array, $currentProgress){
    $progressClass = ($array['progress_section_no'] <= $currentProgress) ? 'progressCT' : '';

    $print ='
    <div class="progress_outer">
        <div class="progress_inner">
            <div class="progress_circle '.$progressClass.'">
            <h3>'.$array['progress_section_no'].'</h3>
            </div>
        </div>
        <p>'.$array['progress_section_text'].'</p>
    </div>';
    echo $print;
}
?>