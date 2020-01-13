<?php
include('conf.php');
include('header.php');
?>


<div class="x_panel">
<div class="x_content">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
      <h1>
        List of Acknowledged nodes
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Acknowledged nodes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <!--  <form role="form" action="" method="POST">

              <div class="box-body">

                  <div class="col-md-4">
                    
                  <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                </div>

                 <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>




                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role">
                    <option disabled selected="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                   
                  </select>
                </div>


                 <div class="box-footer">
                <button type="submit" class="btn btn-info" name="btn_register">Register</button>
              </div>

            </div> -->
            <!-- col-md-4 wrapper -->
            

                

                  <div class="col-md-8">

                      <div style="overflow-x:auto;">
                    
                    <table class="table table-striped" id="tbl_register">
                      
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NAME</th>
                          <th>EMAIL</th>
                          <th>PASSWORD</th>
                          <th>ROLE</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        <?php

                          $select=$pdo->prepare("SELECT * FROM tbl_user ORDER BY user_id ASC");

                          $select->execute();

                          while($row=$select->fetch(PDO::FETCH_OBJ)){

                            echo '


                              <tr>
                              <td>'.$row->user_id.'</td>
                              <td>'.$row->username.'</td>
                              <td>'.$row->useremail.'</td>
                              <td>'.$row->password.'</td>
                              <td>'.$row->role.'</td>
                              <td><a href="registration.php?id='.$row->user_id.'" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash" title="delete"></span></a></td>
                              </tr>




                            ';
                          }

                        ?>

                      </tbody>

                    </table>
                  </div>

                  </div>

                  <!-- col-md-8 wrapper -->




                
                
                
              </div>
              <!-- /.box-body -->

          </form>   
          </div>
          <!-- /.box box-info -->

    
    <!-- /.content -->
  </div>
</div>
</div>

<?php
include('footer.php');
?>
