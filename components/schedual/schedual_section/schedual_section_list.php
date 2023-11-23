<?php
function generateDepatureList()
{
    $sqlQuery = 0; //CREATE & EXECUTE THE SQL QUERY to list the schedual

    // schedualID is used to identigy which list the user clicked the BOOK NOW button 
    // so we setting the custome attribute 'listID' in Input tag
    $scheduleId = $sqlQuery['id']; // Assuming 'id' is the unique identifier in your database

    $print = '
        <form action="./schedual_process_form.php" class="schedual_list" method="post">
        <input type="hidden" name="selectedSchedual" value="' . $scheduleId . '">
            <p>' . $sqlQuery['id'] . '</p>
            <p>' . $sqlQuery['date'] . '</p>
            <p>' . $sqlQuery['departure'] . '</p>
            <p>' . $sqlQuery['trip_time'] . '</p>
            <p>' . $sqlQuery['arrival'] . '</p>
            <p>' . $sqlQuery['price'] . '</p>
            <p>' . $sqlQuery['seats'] . '</p>
            <div class="progress_book_now">
            <input type="submit" value="Book Now" name="book_now">
            </div>
        </form>';

    echo $print;
}

function generateReturnList($depature)
{
    $sqlQuery = 0; //CREATE & EXECUTE THE SQL QUERY that get all except the Depature Schedual selected in first step

    // schedualID is used to identigy which list the user clicked the BOOK NOW button 
    // so we setting the custome attribute 'listID' in Input tag
    $scheduleId = $sqlQuery['id']; // Assuming 'id' is the unique identifier in your database

    $print = '
        <form action="./schedual_process_form.php" class="schedual_list" method="post">
        <input type="hidden" name="selectedSchedual" value="' . $scheduleId . '">
            <p>' . $sqlQuery['id'] . '</p>
            <p>' . $sqlQuery['date'] . '</p>
            <p>' . $sqlQuery['departure'] . '</p>
            <p>' . $sqlQuery['trip_time'] . '</p>
            <p>' . $sqlQuery['arrival'] . '</p>
            <p>' . $sqlQuery['price'] . '</p>
            <p>' . $sqlQuery['seats'] . '</p>
            <div class="progress_book_now">
            <input type="submit" value="Next" name="book_now">
            </div>
        </form>';

    echo $print;
}
