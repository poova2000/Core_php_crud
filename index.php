<?php

include "header.php";
include "config.php";


if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $languages=$_POST['languages_known'];
    $languages_known=implode(',',$languages);

  

    $insert_query="INSERT INTO crud_table (name,email,address,phone,gender,languages_known) VALUES ('$name','$email','$address',$phone,'$gender','$languages_known')";
    $result=mysqli_query($conn,$insert_query);
    if($result){
      echo "insert successfully";
    }


}
?>

    <body>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Core Php <b>CRUD</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Data</span></a>
                            <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="crud">
                    <thead>
                        <tr>
                            <!-- <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll" />
                                    <label for="selectAll"></label>
                                </span>
                            </th> -->
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>languages Known</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $i=1;
                           $select_query="select * from crud_table ";
                           $result=mysqli_query($conn,$select_query);
                           while($row=mysqli_fetch_assoc($result)){
                       
                        ?>
                         
                        <tr>
                          
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['gender'];?></td>
                            <td><?php echo $row['languages_known'];?></td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" name="<?php echo $id ;?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
<?php
                    }
                    ?>
                       
                    </tbody>
                </table>
               
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="index.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Dsata</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" 
                                name="phone" class="form-control" required />
                            </div>
                            <!-- <div class="form-group "> -->
                                <label>Gender</label><br>
                                <input type="radio" name="gender"  value="Male" /> Male
                                <input type="radio" name="gender" value="Female" /> Female
                                <input type="radio" name="gender" value="Other"/> Others
                            <!-- </div> -->
                            <!-- <div class="form-group "> -->
                                <br>
                                <label>Language Known</label><br>
                                <input type="checkbox" name="languages_known[]" value="Tamil" />  Tamil
                                <input type="checkbox" name="languages_known[]" value="English"/>  English
                                <input type="checkbox" name="languages_known[]"  value="Hindi"/>  Hindi
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                            <input type="submit" name="add" class="btn btn-success" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                            <input type="submit" class="btn btn-info" value="Save" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $_POST[''] ;?></p>
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>


    <script>
$(document).ready(function() { 
        $('#crud').DataTable( { 
           
        } ); 
    } ); 

    </script>
</html>