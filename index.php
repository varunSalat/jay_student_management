<?php include('./partial/header.php'); ?>
<?php include('./partial/dbconn.php'); ?>



<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD A NEW
        STUDENT</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Contact No.</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php

            // $query = "select * from `students`";

            $query = "call fetch_records();";                           // use of stored procedure
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['contact'] ?></td>
            <td><a href="update_page.php?id=<?php echo $row['id'] ?>" class="btn ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="edit_btn"
                        viewBox="0 0 512 512">

                        <path
                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                    </svg></a><a href="delete_page.php?id=<?php echo $row['id'] ?>" class="btn"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="delete_icon"
                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg></a></td>
        </tr>


        <?php
                }
            }

        ?>




    </tbody>
</table>


<?php

  if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
  }

?>

<?php

  if(isset($_GET['insert_msg'])){
    echo "<h6>".$_GET['insert_msg']."</h6>";
  }

?>

<?php

  if(isset($_GET['update_msg'])){
    echo "<h6>".$_GET['update_msg']."</h6>";
  }

?>

<?php

  if(isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
  }

?>



<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD STUDENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name=f_name class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="l_name">last Name</label>
                        <input type="text" name=l_name class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name=age class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="text" name=contact class="form-control">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('./partial/footer.php'); ?>