<?php include('./partial/dbconn.php'); ?>

<?php
if(isset($_POST['add_courses'])){

    $cname = $_POST['c_name'];
    $department = $_POST['dept'];
    $credit = $_POST['credit'];

    if($cname == "" || empty($cname)){
        header('location:course.php?message=you need to fill the Course Name!');
    }
    else if($department == "" || empty($department)){
        header('location:course.php?message=you need to fill the Department field!');
    }
    else if($credit == "" || empty($credit)){
        header('location:course.php?message=you need to fill the Credit field!');
    }
    else{
        $query = "INSERT INTO `courses` (`title`, `department`, `credits`) VALUES ('$cname', '$department', '$credit');";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:course.php?insert_msg=Your data has been added successfully');
        }
    }
}



?>