<?php ?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Accueil</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="views/alldata.php">JEEJ</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">Accueil </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exercice PDO
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="views/alldata.php">Exercices pdo Artist...</a>
                                    <a class="dropdown-item" href= "views/create.php">Page ajouter.</a>                                    
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="views/login.php">Connexion</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">                
                    <div class="card text-center">
                        <div class="card-header">
                            JEEJ
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Yosh</h5>
                            <p class="card-text">Il n'y a rien ici ...</p>
                            <a href="views/alldata.php" class="btn btn-dark">Allez au crud...</a>
                        </div>
                        <div class="card-footer text-muted">
                            créé un jour 
                        </div>
                    </div>
                </div>           
            </div>       
        </div>
        <?php require 'views/footer.php';
        ?>