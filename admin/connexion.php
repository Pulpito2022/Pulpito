<?php
    session_start();
    require_once 'database.php';
    $db = Database::connect();

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $check = $db->prepare('SELECT prenom, email, lien, password password from pulpito_utilisateurs where email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $lien = $data['lien'];
        $row = $check->rowCount();

        echo '<p>'.$data['lien'].'</p>';
        if($row == 1){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $password = hash('sha256', $password);

                if($data['password'] === $password){
                    $_SESSION['prenom'] = $data['prenom'];
                    header('Location:'.$lien);
                }else header('Location:../index.php?login_err=password');
            }else header('Location:../index.php?login_err=email');
        }else header('Location:../index.php?login_err=already');
    }else header('Location:../index.php');
    $db = Database::disconnect();
    ?>