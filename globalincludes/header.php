<?php
  if(isset($acctyid))
    if($acctyid == 1)
      $superadminpowers = '<li><a href="#" data-toggle="modal" data-target="#superadminpowers">Master Admin Privelleges</a></li>';
    else
      $superadminpowers = "";
  if($pagelvl=='1'){
    echo '
          <!--Navbar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.php">Student Advising System</a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="view/students.php">All Students</a></li>
                            <li><a href="view/curriculums.php">All Curriculums</a></li>
                            <li><a href="view/subjects.php">All Subjects</a></li>
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#newstudent">New Student</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#newcurriculum">New Curriculum</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#newsubject">New Subjects</a></li>
                          </ul>
                        </li>
                        <li><a href="import/import.php">Import</a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, '.$accfname.' '.$acclname.'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="admin/admin.php">View Profile</a></li>
                              <li><a href="#" data-toggle="modal" data-target="#about-modal">About</a></li>
                              '.$superadminpowers.'
                              <li role="separator" class="divider"></li>
                              <li><a href="backend/logout.php">Logout</a></li>
                            </ul>
                        </li>
                      </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!--Navbar end-->
          ';
    }
    if($pagelvl=='2'){
        echo '
            <!--Navbar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="../index.php">Student Advising System</a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="../view/students.php">All Students</a></li>
                            <li><a href="../view/curriculums.php">All Curriculums</a></li>
                            <li><a href="../view/subjects.php">All Subjects</a></li>
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#newstudent">New Student</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#newcurriculum">New Curriculum</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#newsubject">New Subjects</a></li>
                          </ul>
                        </li>
                        <li><a href="../import/import.php">Import</a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, '.$accfname.' '.$acclname.' <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="../admin/admin.php">View Profile</a></li>
                              <li><a href="#" data-toggle="modal" data-target="#about-modal">About</a></li>
                              '.$superadminpowers.'
                              <li role="separator" class="divider"></li>
                              <li><a href="../backend/logout.php">Logout</a></li>
                            </ul>
                        </li>
                      </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!--Navbar end-->
            ';
    }
    if($pagelvl=='3'){
      echo '
      <!--Navbar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="../index.php">Student Advising System</a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!--Navbar end-->
          ';
    }
    echo '

    ';
?>
          <!-- Modal -->
            <div class="modal fade bs-example-modal-lg" id="newstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Student</h4>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                      <div id="addstudentnotif"></div>
                    </div>
                    <div class="container-fluid">
                      <form>
                        <div class="col-md-4">
                          <div class="form-group">    
                            <label for="inputpict">Student Picture</label>
                            <input type="file" class="form-control" name="inputpict" id="inputpict">
                        </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                              <div class="col-md-4">
                                <label for="inputstudid">Student ID No.</label>
                                <input type="text" class="form-control" name="inputstudid" id="inputstudid" placeholder="Student No.">
                              </div>
                              <div class="col-md-4">
                                <label for="inputlname">Last Name</label>
                                <input type="text" class="form-control" name="inputlname" id="inputlname" placeholder="Last Name">
                              </div>
                              <div class="col-md-4">
                                <label for="inputfname">First Name</label>
                                <input type="text" class="form-control" name="inputfname" id="inputfname" placeholder="First Name">
                              </div>
                              <div class="col-md-6">
                                <label for="inputcollege">College</label>
                                <select class="form-control" name="inputcollege" id="inputcollege">
                                  <?php
                                      $sql = "SELECT * FROM college";
                                      $result = $conn->query($sql);
                                      while($row = $result->fetch_assoc()){
                                        echo '<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
                                      }
                                  ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label for="inputcurriculum">College</label>
                                <select class="form-control" name="inputcurriculum" id="inputcurriculum">
                                  <?php
                                      $sql = "SELECT * FROM curriculum WHERE college_id = '1'";
                                      $result = $conn->query($sql);
                                      while($row = $result->fetch_assoc()){
                                        echo '<option value="'.$row['curriculum_id'].'">'.$row['curriculum_name'].'</option>';
                                      }
                                  ?>
                                </select>
                              </div>
                              <div class="col-md-12">
                                <label for="inputyrlvl">Year Level</label>
                                <select class="form-control" name="inputyrlvl" id="inputyrlvl">
                                  <option value="1st">1st</option>
                                  <option value="2nd">2nd</option>
                                  <option value="3rd">3rd</option>
                                  <option value="4th">4th</option>
                                  <option value="5th">5th</option>
                                </select>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="addstudentbutton" class="btn btn-primary">Add</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Curriculum Modal -->
            <div class="modal fade bs-example-modal-lg" id="newcurriculum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Curriculum</h4>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                      <div id="addcurriculumnotif"></div>
                    </div>
                    <div class="container-fluid">
                      <form id="curriculumform">
                        <div class="col-md-12">
                            <div class="form-group">
                              <div class="col-md-6">
                                <label for="inputcurriculumadd">Curriculum Name</label>
                                <input type="text" class="form-control" name="inputcurriculumadd" id="inputcurriculumadd" placeholder="Name">
                              </div>
                              <div class="col-md-6">
                                <label for="inputcollegeadd">College</label>
                                <select class="form-control" name="inputcollegeadd" id="inputcollegeadd">
                                  <?php
                                      $sql = "SELECT * FROM college";
                                      $result = $conn->query($sql);
                                      while($row = $result->fetch_assoc()){
                                        echo '<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
                                      }
                                  ?>
                                </select>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="addcurriculumbutton" class="btn btn-primary">Add</button>
                  </div>
                </div>
              </div>
            </div>

          <!-- Subject Modal -->
            <div class="modal fade bs-example-modal-lg" id="newsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Subject</h4>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                      <div id="addsubjectnotif"></div>
                    </div>
                    <div class="container-fluid">
                      <form>
                        <div class="col-md-12">
                            <div class="form-group">
                              <div class="col-md-6">
                                <label for="inputsubcode">Subject Code.</label>
                                <input type="text" class="form-control" name="inputsubcode" id="inputsubcode" placeholder="Subject Code">
                              </div>
                              <div class="col-md-6">
                                <label for="inputsubdesc">Subject Title</label>
                                <input type="text" class="form-control" name="inputsubdesc" id="inputsubdesc" placeholder="Subject Title">
                              </div>
                              <div class="col-md-12">
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                    <div class="col-md-4">
                                      <label for="inputlabunits">Laboratory Units</label>
                                      <input type="text" class="form-control" name="inputlabunits" id="inputlabunits" placeholder="Laboratory Units">
                                    </div>
                                    <div class="col-md-4">
                                      <label for="inputlectunits">Lecture Units</label>
                                      <input type="text" class="form-control" name="inputlectunits" id="inputlectunits" placeholder="Lecture Units">
                                    </div>
                                    <div class="col-md-4">
                                      <label for="inputcredit">Credit</label>
                                      <input type="text" class="form-control" name="inputcredit" id="inputcredit" placeholder="Credit">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="addsubjectbutton" class="btn btn-primary">Add</button>
                  </div>
                </div>
              </div>
            </div>

            <!--About Modal-->
             <div class="modal fade bs-example-modal-lg" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Curriculum</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="col-md-12">
                        <center>
                          <h3>The developers</h3><br>
                          <h5>S.Y. 2018-2019</h5>
                        </center>
                      </div>
                      <div class="col-md-3">
                        <center>
                          <img src="data/img/default.jpg" alt="../data/img/default.jpg" height="200px" width="200px"><br>
                          <p>Adam Jed Biñas</p><br>
                          <p>BSCS 4-A</p><br>
                          <p>Programmer</p><br>
                        </center>
                      </div>
                      <div class="col-md-3">
                        <center>
                          <img src="data/img/default.jpg" alt="../data/img/default.jpg" height="200px" width="200px"><br>
                          <p>Dominic Guillermo</p><br>
                          <p>BSCS 4-A</p><br>
                          <p>Designer</p><br>
                        </center>
                      </div>
                      <div class="col-md-3">
                        <center>
                          <img src="data/img/default.jpg" alt="../data/img/default.jpg" height="200px" width="200px"><br>
                          <p>Alejandre James Papina</p><br>
                          <p>BSCS 4-B</p><br>
                          <p>Programmer</p><br>
                        </center>
                      </div>
                      <div class="col-md-3">
                        <center>
                          <img src="data/img/default.jpg" alt="../data/img/default.jpg" height="200px" width="200px"><br>
                          <p>Aubrey Segovia</p><br>
                          <p>BSCS 4-B</p><br>
                          <p>Designer</p><br>
                        </center>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--About Modal-->
             <div class="modal fade bs-example-modal-lg" id="superadminpowers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Master Admin Privellages</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Add New Account</h3>
                            </div>
                            <div class="panel-body">
                              <div class="col-md-12" id="superad-notifarea"></div>
                              <div class="col-md-6">
                                  <label for="newaccuname">Account Username</label>
                                  <input type="text" class="form-control supadfield" id="newaccuname" placeholder="Username">
                              </div>
                              <div class="col-md-6">
                                  <label for="newaccpass">Account Type</label>
                                  <select class="form-control" id="newacctyid">
                                    <?php
                                      $sql = "SELECT * FROM acc_type";
                                      $result = $conn->query($sql);
                                      while($row = $result->fetch_assoc()){
                                        echo '<option value="'.$row['acc_type_id'].'">'.$row['acc_type_name'].'</option>';
                                      }
                                    ?>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="newaccfname">Account First Name</label>
                                  <input type="text" class="form-control supadfield" id="newaccfname" placeholder="First Name">
                              </div>
                              <div class="col-md-6">
                                  <label for="newacclname">Account Last Name</label>
                                  <input type="text" class="form-control supadfield" id="newacclname" placeholder="First Name">
                              </div>
                              <div class="col-md-6">
                                  <label for="newaccpass">Account Password</label>
                                  <input type="password" class="form-control supadfield" id="newaccpass" placeholder="Password">
                              </div>
                              <div class="col-md-6">
                                  <label for="newaccpassconf">Account Password Confirm</label>
                                  <input type="password" class="form-control supadfield" id="newaccpassconf" placeholder="Confirm Password">
                              </div>
                              <div class="col-md-12">
                                <br><button class="btn btn-success" id="addnewacc" disabled>Add Account</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Update Account Status</h3>
                            </div>
                            <div class="panel-body">
                              <div class="col-md-12" id="superadupdt-notifarea"></div>
                              <div class="col-md-4">
                                <label for="uptaccid">Account</label>
                                <select class="form-control" id="uptaccid">
                                  <?php
                                    $sql = "SELECT * FROM account";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                      echo '<option value="'.$row['account_id'].'">'.$row['acc_fname'].' '.$row['acc_lname'].'</option>';
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label for="uptacctyid">Account Type</label>
                                <select class="form-control" id="uptacctyid">
                                  <?php
                                    $sql = "SELECT * FROM acc_type";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                      echo '<option value="'.$row['acc_type_id'].'">'.$row['acc_type_name'].'</option>';
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label for="uptaccstat">Account Status</label>
                                <select class="form-control" id="uptaccstat">
                                  <option value="1">Active</option>
                                  <option value="2">De-activated</option>
                                  <option value="3">Reset</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                              <div class="col-md-12">
                                <br><button class="btn btn-success" id="updtaccty">Update Account</button>
                              </div>
                            </div>
                        </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

