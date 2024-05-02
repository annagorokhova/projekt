<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
  //   $prenom = $_POST['prenom'];
  //  $nom = $_POST['nom'];
  //  $email = $_POST['email'];
  //  $motdepasse = $_POST['motdepasse'];
  //  $type_compte = $_POST['type_compte'];

    // Connexion à la base de données
    $connexion = new mysqli('localhost:8889', 'annag', 'hellowrld1', 'ecommerce');

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Préparer la requête d'insertion
    $requete = $connexion->prepare("INSERT INTO utilisateurs (prenom, nom, email, motdepasse, type_compte) VALUES (?, ?, ?, ?, ?)");

    // Liaison des paramètres
    $requete->bind_param("sssss", $prenom, $nom, $email, $motdepasse, $type_compte);

    // Exécution de la requête
    if ($requete->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription : " . $requete->error;
    }

    // Fermer la connexion
    $connexion->close();
}
?>
