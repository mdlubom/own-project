<?php

$title = "Contact us";

require "includes/head.php";

$heading = "Get in touch";

require "includes/nav.php";
require "includes/dbconnection.php";

?>

<h5>
    <p class="contact_us">
        Email us about any questions you may have. We will try our best to get back to you.

    </p>
</h5>

<br>


<?php
if ($_POST["name"] || $_POST["surname"] || $_POST["textarea"] || $_POST['email']) {
    if (preg_match("/[^A-Za-z'-]/", $_POST['name']) || preg_match("/[^A-Za-z'-]/", $_POST['surname'])) {
        echo "invalid name or surname, please re-enter your name and surname";
    }


        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $comment = $_POST['textarea'];
        $email = $_POST['email'];

        echo "Thank you <h5>$name $surname</h5> <br /> Your comment was: <br> $comment";

        $insert_comments = "INSERT INTO comments (name,surname,email_address,comment) VALUES ('$name','$surname','$email','$comment')";
        $result = mysqli_query($conn, $insert_comments);

    }

?>

<form action="" method="POST">
    <br>
    Name: <input type="text" value="<?php echo $name; ?>" name="name" placeholder="Name"/>
    Surname: <input type="text" value="<?php echo $surname; ?>" name="surname" placeholder="Surname"/>
    Email: <input type="email" value="<?php echo $email; ?>" name="email" placeholder="someone@example.com"/>
    <label for="comment">Comment Here:</label>
    <textarea id="comment" placeholder="Please type your comment here !" name="textarea" rows="10" cols="87"></textarea>
    <br>
    <input type="submit" value="Submit" class="button-primary"/>


</form>


<?php

require "includes/footer.php";

?>
