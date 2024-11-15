<?php
     require('connection.inc.php');
     require('functions.inc.php');
     include('includes/header.php');
     include('includes/navbar.php');
     include('includes/searchbox.php');
     ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">

      <div class="form-group">
        <Label>Name:</Label>
                <input type="text" class="form-control" name="name" placeholder="Name:">
            </div>
            <div class="form-group">
            <Label>Email:</Label>
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
            <Label>Password:</Label>
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
            <Label>Confirm Password:</Label>
                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password:">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
      </div>
</form>
    </div>
  </div>
</div>

<div class="container-fluid">

<!-- data  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <button type="button" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add Admin Profile
            </button>
        </h6>
    </div>
    <div class="card-body">
        <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            echo'<h5> '.$_SESSION['status'].' </h5>';
            unset($_SESSION['status']);
        }
        ?>
        <div class="table-responsive">
        <?php
                $query = "SELECT * FROM admin";
                $query_run = mysqli_query($con, $query);
            ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspaceing="0">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>
  <tbody>
  <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['password']; ?></td>
                                <td>
                                    <form action="register_edit.php" method="post">
                                        <input type ="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">

                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
  </tbody>
        </table>
        </div>
    </div>
</div>

</div>

<?php
     include('includes/script.php');
     include('includes/footer.php');
     ?>