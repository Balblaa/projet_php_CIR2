

            <?php

              include "../DB/database.php";
              $conn = dbConnect();
              session_start();
              
              $mail = $_POST['email'];
              $mdp = $_POST['password'];

              $requete = $conn->prepare('SELECT mot_de_passe FROM utilisateur WHERE adresse_email = :email');
              $requete->bindParam(':email', $mail);
              $requete->execute();
              $mdp_email = $requete->fetchAll()[0][0];
              
              if ( $mdp_email == $mdp && $_SESSION['mail'] != $mail){ //si bon mail et mdp alors connecté

                $_SESSION['mail'] = $mail ;

                //echo "Bonjour";

                echo '<script language="Javascript">
                alert("Vous êtes connecté.e !")
                </script>';

              }

              else { //n'est pas connecté car mauvais mdp ou mauvaise adresse mail

                if ( $mail != "" || $mdp != "" ){

                  $_SESSION['mail'] = "" ;

                  //echo "Bonne nuit";

                  echo '<script language="Javascript">
                  alert("Vous nêtes pas connecté.e !")
                  </script>';

                }

              }
              
            ?>