<?php

$title = "Bursaries";
require "includes/head.php";
$heading = "BURSARIES";
require "includes/nav.php";
require "includes/dbconnection.php";


$bur_options = $_POST['bursaries'];

$select = 'SELECT * FROM bursaries ';
if (isset($bur_options)) {

    if ($bur_options != 'All') {

        $choice = $bur_options;
        $select .= "WHERE study_category = '$choice' ";

    }

}

$result = mysqli_query($conn, $select);

?>

<form action="" method="post" id="bursaries">

    <p>Please select the bursary field which you are interested in.</p>

    <select name="bursaries">

        <option value="All" selected="selected">All</option>
        <option value="Accounting">Accounting</option>
        <option value="Education">Education</option>

    </select>

    <input type="submit" value="Submit" class="button-primary">

</form>


<?php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <!--Displaying-->


        <h5>Name: </h5>

        <p><?php echo $row['name'] ?></p>

        <h5>Study category: </h5>

        <p><?php echo $row['study_category'] ?></p>

        <h5>Closing date: </h5>

        <p><?php echo $row['closing_date'] ?></p>

        <h5>About: </h5>

        <p><?php echo $row['about'] ?></p>

        <h5>Eligibility: </h5>

        <p><?php echo $row['eligibility'] ?></p>

        <h5>Apply now: </h5>

        <p class="end_of_display">
            <a target='_blank'
               href="<?php echo $row['origional_website'] ?>"><?php echo $row['origional_website'] ?></a></p>


        <?php
    }
}
?>

<?php
require "includes/footer.php";
?>
