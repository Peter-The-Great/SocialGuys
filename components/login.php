<?php
session_start();
require('php/database.php');
  //query om de categorien te vinden in de database
  $query = "SELECT * FROM `categorie`";
  
  //maak een resultaat door te verbinden met de database
  $result = $conn->query($query);
?>
<div class="container">
<div class="row justify-content-center"> <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-round">Click Here !</button> <!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs" id="tab01">
                            <h6 class="text-muted">Sign in </h6>
                        </div>
                        <div class="tabs active" id="tab02">
                            <h6 class="font-weight-bold">Sign up</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">
                        <fieldset id="tab011">
                          <div class="bg-light">
                                <h5 class="text-center mb-4 mt-0 pt-4">Sign in</h5>
                                <form method="POST" action="php/auth.php">
                                    <div class="form-group">
                                      <label>Email</label>
                                        <input type="mail" name="email" class="form-control" id="email" placeholder="someone45@gmial.com">
                                    </div>    
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" id="username" class="form-control" placeholder="Peter857" type="text">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" id="password" class="form-control" placeholder="********" type="password">
                                    </div>
                                    <div class="form-group">
                                        <button id="submit" type="submit" class="btn btn-dark btn-block" name="Inloggen">Login</button>
                                    </div>
                                    <?php
                                          if(isset($_GET['error'])) {
                                            if ($_GET['error'] == "password") {
                                                echo "<p style='color: red;'>That account does not exist or the password you provided was incorrect.</p>";
                                            }
                                            else if ($_GET['error'] == "captcha") {
                                                echo "<p style='color: red;'>Google could not verrify that you where a human.</p>";
                                            }
                                            else {
                                                echo "<p style='color: red;'>There was a connection issue between you and our servers.</p>";
                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                        </fieldset>
                        <fieldset class="show" id="tab021">
                            <div class="bg-light">
                                <h5 class="text-center mb-4 mt-0 pt-4">Sign up</h5>
                                <form action="../php/account_maken_verwerk.php" method="POST" enctype="multipart/form-data">
                                  <label>Username:<label>
                                  <input type="text" required name="Naam"><br>
                                  <lable>Email:</label>
                                  <input type="text" name="Email" required><br>
                                  <label>Password:</label>
                                  <input type="password" required name="password"><br>
                                  <label>Categorie:</label><select name="categorie">
                                    <?php 
                                        foreach($result as $catagorie)
                                        {
                                          echo "<option value='".$catagorie['Categorie_ID']."'>";
                                          echo $catagorie['Naam'];
                                          echo "</option>";
                                        }
                                      ?>
                                  </select><br>
                                  <label>Profile photo</label><input type="file" name="profiel"><br>
                                  <input type="submit" name="accountMaken" value="Sign Up">
                                  <input type="submit" onclick="window.history.back(); return;" value="Cancel">
                                </form>
                             </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php 
require('components/scripts.php');
?>
<script defer src="js/login.js"></script>
</div>             