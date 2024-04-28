<?php include('./partial/header.php'); ?>
<?php include('./partial/dbconn.php'); ?>


<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    

    $query = "select * from `students` where `id` = '$id'";
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

    if(isset($_POST['update_students'])){
        if(isset($_GET['id_new'])){
            $id_new = $_GET['id_new'];
        }

        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];

        $query = "update `students` set `first_name`='$fname', `last_name`='$lname', `age`='$age',`contact`='$contact' where `id`='$id_new'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }
        else{
            header('location:index.php?update_msg=You have successfully updated  the data!');

        }
    }

?>


<div class="container">

    <form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
    
        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name=f_name class="form-control" value="<?php echo $row['first_name'] ?>">
        </div>
        <div class="form-group">
            <label for="l_name">last Name</label>
            <input type="text" name=l_name class="form-control" value="<?php echo $row['last_name'] ?>">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name=age class="form-control" value="<?php echo $row['age'] ?>">
        </div>
        <div class="form-group">
            <label for="contact">Contact No.</label>
            <input type="text" name=contact class="form-control" value="<?php echo $row['contact'] ?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
    
    </form>
    
</div>






<?php include('./partial/footer.php'); ?>