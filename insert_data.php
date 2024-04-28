<?php include('./partial/dbconn.php'); ?>

<?php
if(isset($_POST['add_students'])){

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];

    if($fname == "" || empty($fname)){
        header('location:index.php?message=you need to fill the first name!');
    }
    else if($lname == "" || empty($lname)){
        header('location:index.php?message=you need to fill the last name!');
    }
    else if($age == "" || empty($age)){
        header('location:index.php?message=you need to fill the age!');
    }
    else if($contact == "" || empty($contact)){
        header('location:index.php?message=you need to fill the Contact No!');
    }
    else{
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`,`contact`) VALUES ('$fname', '$lname', '$age','$contact');";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }
}



?>