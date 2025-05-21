<?php
session_start();
require_once 'config/connexion.php'; // Connexion PDO

// Initialiser une variable d'erreur
$error_message = '';

// Vérifier que le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données soumises
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Vérifier si tous les champs sont remplis
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $error_message = 'Veuillez remplir tous les champs.';
    }


   // Vérifier si l'email existe déjà
   $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
   $stmt->execute([$email]);
   if ($stmt->fetch()) {
       $_SESSION['error_message'] = 'Cet email est déjà utilisé.';
       header('Location: public/inscrire.php');
       exit;
   }
    // Si il n'y a pas d'erreurs, procéder à l'inscription
    if (empty($error_message)) {
        // Hacher le mot de passe
        $password_hache = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $role = 'client'; // par défaut lors de l'inscription
        $insert_stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password,role) VALUES (?, ?, ?, ?,?)");
        if ($insert_stmt->execute([$first_name, $last_name, $email, $password_hache,$role])) {
            header('Location: public/authentifier.php');
        }  else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo $error_message; // Afficher le message d'erreur
    }
}
?>
