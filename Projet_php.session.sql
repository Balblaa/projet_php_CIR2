SELECT Prenom FROM Utilisateur WHERE Adresse_Email = 'bal@ine' AND mot_de_passe = 'poulpe';

<?php
        
        $mail = $_POST['email'];
        $mdp = $_POST['password'];

        $requete = $conn->prepare("SELECT Prenom FROM Utilisateur WHERE Adresse_Email = :email AND mot_de_passe = :motdp;");
        $requete->bindParam(':email', $mail);
        $requete->bindParam(':motdp', $mdp);
        $requete->execute();

        ?>