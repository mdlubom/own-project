<?php

$title = "Student_loans";

require "includes/head.php";

$heading = "STUDENT LOANS";

require "includes/nav.php";
require "includes/dbconnection.php";


$edu_options = $_POST['student_loans'];

$select = 'SELECT * FROM student_loans ';
if (isset($edu_options)) {

    if ($edu_options != 'All') {

        $choice = $edu_options;
        $select .= "WHERE name = '$choice' ";
    }

}

$result = mysqli_query($conn, $select);


?>


<form action="" method="post" id="student_loans">

    <p>Please select the Student loan which you may be interested in.</p>

    <select name="student_loans">
        <option value="All" name="all">All</option>
        <option value="NSFAS">NSFAS Student Loan</option>
        <option value="ABSA study loans">ABSA Student Loan</option>
        <option value="FNB Student Loan">FNB Student Loan</option>
        <option value="Nedbank Student Loan">Nedbank Student Loan</option>
        <option value="STANDARD BANK STUDY LOAN">STANDARD BANK STUDY LOAN</option>

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

        <h5>About: </h5>

        <p><?php echo $row['about'] ?></p>

        <h5>Eligibility: </h5>

        <p><?php echo $row['eligibility'] ?></p>

        <h5>Paying back the loan: </h5>

        <p><?php echo $row['paying_loan_back'] ?></p>


        <h5>Apply now: </h5>

        <p class="end_of_display"><a target='_blank' href="<?php echo $row['apply'] ?>"><?php echo $row['apply'] ?></a>
        </p>


        <?php
    }
}
?>




<?php

require "includes/footer.php";

?>
