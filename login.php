<?php
session_start();
include('../config/connexion.php'); // Ce fichier définit $pdo

$error_message = ''; // Préparer une variable pour afficher les erreurs

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparer la requête
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérification du mot de passe
        if (strlen($user['password']) < 60) {
            // Ancien mot de passe en clair
            if ($password === $user['password']) {
                // Hachage et mise à jour
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $update = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                $update->execute([$hashed_password, $user['id']]);

                $_SESSION['user'] = $user;
                $_SESSION['role'] = $user['role']; 
                echo "Redirection vers admin...";
                redirectUserByRole($user['role']);
            } else {
                $error_message = "Mot de passe incorrect.";
            }
        } else {
            // Mot de passe déjà haché
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['role'] = $user['role'];
                redirectUserByRole($user['role']); }
             else {
                $error_message = "Mot de passe incorrect.";
            }
        }
    } else {
        $error_message = "Aucun utilisateur trouvé avec cet email.";
    }

    // Gestion des erreurs
    if (!empty($error_message)) {
        header("Location: ../public/authentifier.php?error=" . urlencode($error_message));
        exit();
    }
}

function redirectUserByRole($role) {
    if ($role === 'admin') {
        header("Location: ../admin/admin.php");
    } else {
        header("Location: ../public/home.php");
    }
    exit();
}
?>


