<?php

$title = "SA universities";

require "includes/head.php";


$heading = "SOUTH AFRICA'S UNIVERSITIES";
require "includes/nav.php";
require "includes/dbconnection.php";

$uni_options = $_POST['universities'];

$select = 'SELECT * FROM universities ';
$province_choice='All SA universities';
if (isset($uni_options)) {

    if ($uni_options != 'All') {

        $choice = $uni_options;
        $province_choice=$choice.' province universities';
        $select .= "WHERE province_name = '$choice' ";
    }

}

$result = mysqli_query($conn, $select);


?>


<form action="" method="post" id="universities">

    <p>Please select the province which has universities you are interested in.</p>

    <select name="universities">

        <option value="All" selected="selected">All</option>
        <option value="Eastern Cape">Eastern Cape</option>
        <option value="Free State">Free State</option>
        <option value="Gauteng">Gauteng</option>
        <option value="Limpopo">Limpopo</option>
        <option value="Mpumalanga">Mpumalanga</option>
        <option value="North West">North West</option>
        <option value="Northern Cape">Northern Cape</option>
        <option value="Western Cape">Western Cape</option>

    </select>

    <input type="submit" value="Submit" class="button-primary">


</form>

<h3><?php echo $province_choice?></h3>
<!-- Table -->

<table class="table">

    <thead>

    <tr>

        <td>Name</td>
        <td>Province name</td>
        <td>Original website</td>
        <td>Location</td>
        <td>Telephone and Fax</td>

    </tr>

    </thead>

    <tbody>

    <?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>

                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['province_name'] ?></td>
                <td><a target='_blank'
                       href="<?php echo $row['origional_website'] ?>"><?php echo $row['origional_website'] ?></a></td>
                <td><?php echo $row['location'] ?></td>
                <td><?php echo $row['telephone_and_fax'] ?></td>

            </tr>
            <?php
        }
    }
    ?>

    </tbody>

</table>


<?php
require "includes/footer.php";
?>
