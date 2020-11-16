<nav class="navbar navbar-expand-xl d-flex justify-content-between navbar-dark bg-twitch mb-4">
    <a class="navbar-brand nav-item mr-auto" href="./">
    <img src="img/logo.png" class="img-fluid socialguys rounded" alt="Social Guys"> <no class="text-blank">Social Guys</no>
    </a>
    <form class="form-inline mx-4 my-3">
    <input class="form-control mr-sm-2" type="search" size="40" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-info my-2 my-sm-0 btn-round" type="submit">Search
    </button>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse my-2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
                <?php
            if(!isset($_SESSION['loggedin'])) {
                echo "
                <li class='nav-item'>";
                require('components/login.php');  
                echo "</li>";
            }
            else{
                echo "<li class='nav-item'>
                <a class='nav-link text-blank' href='logout.php'>Logout</a>
                </li>";
            }
            ?>
        </ul>
    </div>
</nav>