<?php include('./partial/dbconn.php'); ?>

<?php
if(isset($_POST['assign_students'])){

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    

    if($fname == "" || empty($fname)){
        header('location:dashboard.php?message=you need to fill the Student ID!');
    }
    else if($lname == "" || empty($lname)){
        header('location:dashboard.php?message=you need to fill the Course ID!');
    }
    else{

        $check_query = "select * from `dashboard` where `sid`='$fname' and `cid`='$lname';";
        $check_result = mysqli_query($conn,$check_query);

        if($check_result){

            try {
                $query = "INSERT INTO `dashboard` (`sid`, `cid`) VALUES ('$fname', '$lname');";
                $result = mysqli_query($conn,$query);

                if(!$result){
                    die("Query Failed".mysqli_error());
                }
                else{
                    header('location:dashboard.php?insert_msg=Your data has been added successfully');
                }
            } catch (Exception $e) {
                header('location:dashboard.php?message=Please enter valid Sudent or Course ID');
            }

                    
            
                    
        }
        else{
            header('location:dashboard.php?message=This course is already assigned, Please assign another course.');
        }
            
    }
}



?>