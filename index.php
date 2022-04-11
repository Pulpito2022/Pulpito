

<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/af84e599fb.js" crossorigin="anonymous"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"> </script>
        <title>Pulpito</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200;300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">
        <link rel="" href="JS/script.js">
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <header class="">
            <div class="row h-100 align-items-center">
                <div class="col text-center">
                        <h1 class="hello d-inline-block ms-4 ms-sm-0 my-0 pulPol hide">Pulpito</h1>                    
                </div>
                <div class="col text-end pulPol">
                    <button class="d-none d-sm-inline-flex px-2 me-5 butPul" type="button" data-bs-toggle="modal"
                    data-bs-placement="right" data-bs-target="#userModal"><h3>Mon espace</h3></button>
                    <a href="" type="button" data-bs-toggle="modal"
                    data-bs-placement="right" data-bs-target="#userModal"><i class="fi-xnluxl-user d-sm-none membrePul me-4"></i></a>
                </div>
            </div>
        </header>

        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <i class="fi-xnsuxl-tools-solid fs-1"></i>
            <h2 class="text-center pulPol ">Un peu de patience, plus d'infos à venir !</h2>
        </div>

        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content pulPol">
                    <div class="modal-header">
                            <h4 class="form-header active" id="btnConnexion">Se connecter</h4>
                            <h4 class="form-header " id="btnInscription">S'inscrire</h4>
                    </div>
                    <?php

                        if(isset($_GET['login_err'])){
                            $err = htmlspecialchars($_GET['login_err']);

                            switch($err){
                                case 'password':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Mot de passe incorrect !</p>
                                <?php
                                break;
                                case 'email':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Email incorrect !</p>
                                <?php
                                break;
                                case 'already':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Compte incorrect !</h5>
                                <?php
                                break;
                            }

                        }
                    ?>
                    <?php
                        if(isset($_GET['reg_err'])){
                            $err = htmlspecialchars($_GET['reg_err']);

                            switch($err){
                                case 'success':
                                    ?>
                                        <h5 class="text-success text-center mt-5">Inscription réussie !</p>
                                <?php
                                break;
                                case 'password':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Mot de passe différent !</p>
                                <?php
                                break;
                                case 'email':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Email non valide !</p>
                                <?php
                                break;
                                case 'email_lenght':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Email trop long !</p>
                                <?php
                                break;
                                case 'prenom_lenght':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Prénom trop long !</p>
                                <?php
                                break;
                                case 'nom_lenght':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Nom trop long !</p>
                                <?php
                                break;
                                case 'gsm_lenght':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">GSM non valide !</p>
                                <?php
                                break;
                                case 'already':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Compte déjà existant !</p>
                                <?php
                                break;
                                case 'code_x':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Veuillez introduire le code d'inscription reçu par mail !</p>
                                <?php
                                break;
                                case 'champ_vide':
                                    ?>
                                        <h5 class="text-danger text-center mt-5">Veuillez remplir tous les champs !</p>
                                <?php
                                break;
                            }

                        }
                    ?>

                    <div class="modal-body align-items-center" id="formContainer">
                        <form id="formConnexion" action="admin/connexion.php" method="post">
                            <input type="email" name="email" class="form-control mb-2" aria-describedby="emailHelp" placeholder="Adresse Email">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                            <button class="butPul mt-3" type="submit"><h5 class="pulPol px-2">Connexion</h5></button>
                        </form>
                        <form id="formInscription" class="toggleForm" action="admin/inscription.php" method="post">
                            <input type="text" name="code" class="form-control mb-2" placeholder="Code d'activation">
                            <div class="row">
                                <div class="col">                                
                                    <input type="text" name="prenom" class="form-control mb-2" placeholder="Prénom">
                                </div>
                                <div class="col">                                
                                    <input type="text" name="nom" class="form-control mb-2" placeholder="Nom">
                                </div>
                            </div>
                            <input type="text" name="gsm" class="form-control mb-2" placeholder="Numéro de GSM">
                            <input type="email" name="email" class="form-control mb-2" aria-describedby="emailHelp" placeholder="Adresse Email">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Mot de passe">
                            <input type="password" name="password_retype" class="form-control mb-2" placeholder="Confirmez le mot de passe">
                            <button class="butPul mt-3" type="submit"><h5 class="pulPol px-2">Inscription</h5></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>                



        

        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script type="text/javascript">
            function _(e) {
                return document.getElementById(e);
            };

            const formConnexion = _('formConnexion');
            const formInscription = _('formInscription');
            const btnConnexion = _('btnConnexion');
            const btnInscription = _('btnInscription');

            btnConnexion.addEventListener('click', () => {
                btnInscription.classList.remove('active');
                btnConnexion.classList.add('active');
                if(formConnexion.classList.contains('toggleForm')){
                    formContainer.style.transform = 'translate(0%)';
                    formContainer.style.transition = 'transform .8s';
                    formConnexion.classList.remove('toggleForm');
                    formInscription.classList.add('toggleForm');
                }
            });


            btnInscription.addEventListener('click', () => {
                btnConnexion.classList.remove('active');
                btnInscription.classList.add('active');
                if(formInscription.classList.contains('toggleForm')){
                    formContainer.style.transform = 'translate(-94%)';
                    formContainer.style.transition = 'transform .5s';
                    formInscription.classList.remove('toggleForm');
                    formConnexion.classList.add('toggleForm');
                }
            });

        </script>
        <?php 
        if(!empty($_GET)):?>
            <script type="text/javascript">
                $(window).on("load", function () {
                    $("#userModal").modal("show");
                });
            </script>
        <?php endif ?>
        <?php 
        if(isset($_GET['reg_err'])):?>
            <script type="text/javascript">
                    btnConnexion.classList.remove('active');
                    btnInscription.classList.add('active');
                    if(formInscription.classList.contains('toggleForm')){
                        formContainer.style.transform = 'translate(-94%)';
                        formContainer.style.transition = 'transform .5s';
                        formInscription.classList.remove('toggleForm');
                        formConnexion.classList.add('toggleForm');
                    };
            </script>
        <?php endif ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html>