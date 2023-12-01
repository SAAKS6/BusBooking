<table class="table_titles">
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Depature</th>
        <th>Trip Time</th>
        <th>Arrival</th>
        <th>Price</th>
        <th>Seats</th>
        <th></th>
    </tr>
</table>

<table class="table_list">
    <form action="./schedual_process_form.php" method="post">
        <input type="hidden" name="selectedSchedual" value="' . $row['Id'] . '">
        <tr>
            <td>' . $row['Id'] . '</td>
            <td>' . $row['Date'] . '</td>
            <td>' . $row['Departure'] . '</td>
            <td>' . $row['TripTime'] . '</td>
            <td>' . $row['Arrival'] . '</td>
            <td>' . $row['Price'] . '</td>
            <td>' . $row['Seats'] . '</td>
            <td>
                <div class="progress_book_now">
                    <input type="submit" value="Book Now" name="book_now">
                </div>
            </td>
        </tr>
    </form>
</table>