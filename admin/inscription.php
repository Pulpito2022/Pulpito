<?php
                require 'database.php';
                $connectdb = Database::connect();

    if(isset($_POST['code']) || isset($_POST['prenom']) || isset($_POST['nom']) || isset($_POST['gsm']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['password_retype'])){
        if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['gsm']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom  = htmlspecialchars($_POST['nom']);
            $gsm  = htmlspecialchars($_POST['gsm']);
            $email  = htmlspecialchars($_POST['email']);
            $password  = htmlspecialchars($_POST['password']);
            $password_retype  = htmlspecialchars($_POST['password_retype']);
            $code  = htmlspecialchars($_POST['code']);

            $check = $connectdb->prepare("SELECT code FROM pulpito_code_inscription WHERE code= ? ");
            $check->execute(array($code));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row == 1){
                $check = $connectdb->prepare('SELECT prenom, email, password from pulpito_utilisateurs where email = ?');
                $check->execute(array($email));
                $data = $check->fetch();
                $row = $check->rowCount();
                if($row == 0){
                    if(strlen($prenom)<= 25){
                        if(strlen($gsm)<= 15){
                            if(strlen($nom)<= 25){
                                if(strlen($email)<= 100){
                                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        if($password == $password_retype){
                                            $password = hash('sha256', $password);
                                            $ip = $_SERVER['REMOTE_ADDR'];
                                            $insert = $connectdb->prepare('INSERT INTO pulpito_utilisateurs(prenom, tel, nom, email, password, ip) VALUES(:prenom, :gsm, :nom, :email, :password, :ip)');
                                            $insert->execute(array(
                                                'prenom' => $prenom,
                                                'nom' => $nom,
                                                'gsm' => $gsm,
                                                'email' => $email,
                                                'password' => $password,
                                                'ip' => $ip,
                                            ));
                                            header('Location:../index.php?reg_err=success');
                                        }else header('Location:../index.php?reg_err=password');
                                    }else header('Location:../index.php?reg_err=email');
                                }else header('Location:../index.php?reg_err=email_lenght');
                            }else header('Location:../index.php?reg_err=nom_lenght');
                        }else ('Location:../index.php?reg_err=gsm_lenght');
                    }else header('Location:../index.php?reg_err=prenom_lenght');
                }else header('Location:../index.php?reg_err=already');
            }else header('Location:../index.php?reg_err=code_x');        
        }
    }else header('Location:../index.php?reg_err=champ_vide');  
    $connectdb = Database::disconnect();
?>