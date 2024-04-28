<?php include('./partial/header.php'); ?>
<?php include('./partial/dbconn.php'); ?>


<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    

    $query = "select * from `courses` where `c_id` = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        $row = mysqli_fetch_assoc($result);

    }
}

?>


<?php

    if(isset($_POST['update_course'])){
        if(isset($_GET['id_new'])){
            $id_new = $_GET['id_new'];
        }

        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        $query = "update `courses` set `title`='$fname', `department`='$lname', `credits`='$age' where `c_id`='$id_new'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }
        else{
            header('location:course.php?update_msg=You have successfully updated  the data!');

        }
    }

?>


<div class="container">

    <form action="update_course.php?id_new=<?php echo $id; ?>" method="post">
    
        <div class="form-group">
            <label for="f_name">Course Name</label>
            <input type="text" name=f_name class="form-control" value="<?php echo $row['title'] ?>">
        </div>
        <div class="form-group">
            <label for="l_name">Department Name</label>
            <input type="text" name=l_name class="form-control" value="<?php echo $row['department'] ?>">
        </div>
        <div class="form-group">
            <label for="age">Credit</label>
            <input type="text" name=age class="form-control" value="<?php echo $row['credits'] ?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_course" value="UPDATE">
    
    </form>
    
</div>






<?php include('./partial/footer.php'); ?>