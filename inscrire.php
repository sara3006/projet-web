<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - MonSite</title>
  <link rel="stylesheet" href="../public/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
  <section class="auth__container">
    <div class="auth__box">
      <h2>Créer un compte</h2>
      <form id="formulaire" action="../connecter.php" method="POST" class="auth__form">
     
        <div class="input__group">
        <label for="first_name"><i class="fas fa-user"></i> <b>Prénom</b></label>
          <input type="text" id="first_name" name="first_name" placeholder="Entrez votre prénom" required>
        </div>

        
        <div class="input__group">
        <label for="last_name"><i class="fas fa-user-tag"></i> <b>Nom</b></label>
          <input type="text" id="last_name" name="last_name" placeholder="Entrez votre nom" required>
        </div>

     
        <div class="input__group">
        <label for="email"><i class="fas fa-envelope"></i> <b>Email</b></label>
          <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
        </div>

     
        <div class="input__group">
        <label for="password"><i class="fas fa-lock"></i> <b>Mot de passe</b></label>
          <input type="password" id="password" name="password" placeholder="Créez votre mot de passe" required>
        </div>

      
        <div class="input__group">
        <label for="confirm_password"><i class="fas fa-lock"></i> <b>Confirmer le mot de passe</b></label>
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
        </div>
        <!-- Messages d'erreur JS -->
        <div id="erreur"></div>

<!-- Message d'erreur PHP -->
<?php if (!empty($error_message)) : ?>
  <div id="erreur">
    <?php echo htmlspecialchars($error_message); ?>
  </div>
<?php endif; ?>

        <div class="button__group">
          <button type="submit" name="s_inscrire" class="btn">S'inscrire</button>
          <button type="reset" class="btn btn--reset">Réinitialiser</button>
        </div>
      </form>

      <p class="auth__footer">
        Vous avez déjà un compte ? <a href="../public/authentifier.php">Se connecter </a>
    </p>
    </div>
  </section>
  <script src="../public/script.js"></script>
</body>
</html>
