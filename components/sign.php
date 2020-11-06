<main class="container">
        <div class="login-box mx-auto shadow p-3 mb-5 bg-white rounded">
            <!-- Shadow, Center in the middle of screen -->
            <!-- Logo-->
            <center><img class="rounded" type="image/svg+xml" style="max-width: 20%; height:auto;" src="img/logo.svg"></center>
            <h4 class="card-title mb-4 mt-1">Sign in</h4>
            <!-- Forum Itself -->
            <form method="POST" action="php/auth.php">
                <div class="form-group">
                    <input type="mail" name="email" class="form-control" id="email" placeholder="someone45@gmial.com">
                </div>
                <div class="form-group">
                <label>Profile Picture</label>
                <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                <label>Select your favourite type of content</label>
                    <select class="form-control">
                    <option selected disabled>-- select here --</option>
                    <option>Tournements</option>
                    <option>SpeedRun</option>
                    </select>
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
                    <button id="submit" type="submit" class="btn btn-dark btn-block" name="Sign">Sign Up</button>
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
    </main>