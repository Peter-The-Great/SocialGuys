</div><div class="container">
  <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">Login
  </button>  
</div>

<div class="modal fade bd-modal-lg" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
          <img class="img-fluid rounded" src="img/logo.png">
        </div>
        <div class="d-flex flex-column text-center">
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
                  <label>Select your favourite type of content</label>
                      <select class="form-control">
                        <option selected disabled>-- Select here --</option>
                        <option>Speedruns</option>
                        <option>Tournements</option>
                      </select>
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
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="sign.php" class="text-info"> Sign Up</a>.</div>
      </div>
    </div>
  </div>
</div>