<?php
session_start();
require("db.php");

if (isset($_SESSION['ssn_id'])) {
    $current_user=$_SESSION['ssn_id'];
    $category=$_REQUEST['category'];
    $question=$_REQUEST['question'];
    $answer=$_REQUEST['answer'];
    $rand=uniqid();

    if ($category== "Category") {
        echo "Please Select a Category";
    }else {
        $query=mysqli_query($conn,"INSERT INTO questions (`owner`,`question_unique_id`,`question`,`answer`,`category`) VALUES ('$current_user','$rand','$question','$answer','$category') ");
        if ($query) {
            echo "Posted";
        }else{
            echo "failed";
        }
    }
}else{
    echo "Please Register OR Login Account.!";
}






?>