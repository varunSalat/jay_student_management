<?php include('./partial/header.php'); ?>
<?php include('./partial/dbconn.php'); ?>


<div class="box1">
    <h2>STUDENT - COURSE </h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ASSIGN COURSE
    </button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>

            <th>Course ID</th>
            <th>Course Name</th>
            <th>department Name</th>
            <th>Contact No.</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php

            $query = "select * from `dashboard`";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($dashboard_row = mysqli_fetch_assoc($result)){

                    $s_query = "SELECT * FROM `students` WHERE `id`='{$dashboard_row['sid']}'";
                    $s_result = mysqli_query($conn, $s_query);
                    $s_row = mysqli_fetch_assoc($s_result);

                    $c_query = "SELECT * FROM `courses` WHERE `c_id`='{$dashboard_row['cid']}'";
                    $c_result = mysqli_query($conn, $c_query);
                    $c_row = mysqli_fetch_assoc($c_result);
      
      
            ?>
        <tr>
            <td><?php echo $s_row['id'] ?></td>
            <td><?php echo $s_row['first_name'] ?> <?php echo $s_row['last_name'] ?></td>

            <td><?php echo $c_row['c_id'] ?></td>
            <td><?php echo $c_row['title'] ?></td>
            <td><?php echo $c_row['department'] ?></td>
            <td><?php echo $s_row['contact'] ?></td>
            <!-- !NEED TO  ADD FUNCTIONALITY AT HERE -->
            <td>
                <a href="delete_course.php?id=<?php echo $row['c_id'] ?>" class="btn"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="delete_icon"
                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg></a>
            </td>
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
<form action="insert_dashboard.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ASSIGN COURSE TO STUDENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">Student ID</label>
                        <input type="text" name=f_name class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Course ID</label>
                        <input type="text" name=l_name class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="assign_students" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('./partial/footer.php'); ?>