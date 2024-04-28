<?php include('./partial/dbconn.php'); ?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    $query = "delete from `courses` where `c_id`='$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:course.php?delete_msg=You have successfully deleted  the record.');
    }

    }
?>