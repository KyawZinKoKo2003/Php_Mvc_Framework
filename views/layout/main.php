<?php

use app\core\Application;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3 bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                    <li class="nav-item">
                        <a class="nav-link active text-white view overlay" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white active" href="/contact">Contact</a>
                    </li>

                </ul>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                  <?php if(Application::isGuest()): ?>
                    <li class="nav-item mr-auto active">
                        <a class="nav-link active text-white" href="/register">register</a>
                    </li>
                    <li class="nav-item mr-auto">
                        <a class="nav-link  active text-white" href="/login">login</a>
                    </li>
                  <?php else: ?>
                    <li class="nav-item mr-auto active">
                        <a class="nav-link active btn text-white  btn-primary" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item mr-auto active">
                        <a class="nav-link active text-white" href="/logout">Welcome <?php echo Application::$app->user->getDisplayName(); ?>(logout)</a>
                    </li>
                  <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-lg">
        <?php if (Application::$app->session->getFlash('success')) { ?>
            <div class="alert alert-success mt-3">
                <?php echo Application::$app->session->getFlash('success'); ?>
            </div>
        <?php } ?>
        {{content}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>
