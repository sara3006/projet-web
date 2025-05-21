<?php
$host = '127.0.0.1';  // Adresse du serveur MySQL (localhost)
$username = 'root';    // Nom d'utilisateur MySQL
$password = '';        // Mot de passe MySQL (vide si tu n'en as pas défini)
$dbname = 'agence';    // Nom de la base de données à tester

// Essayer de se connecter avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connexion PDO réussie à la base de données $dbname !";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

