
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PHP PROJECT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            <?php if(isset($_SESSION["auth"])): ?>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
            </li>
            <?php endif; ?>

            <?php if(!isset($_SESSION["auth"])): ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="regestier.php">Regestier</a>
            </li>

            <?php else: ?>

            <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>

            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul> 
            <?php endif; ?>        
            </ul>
        </div>
        </nav>