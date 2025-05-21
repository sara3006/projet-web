<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Authentification - MonSite</title>
  <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
  <section class="auth__container">
    <div class="auth__box">
      <h2>Authentification</h2>
      <form action="login.php" method="POST" class="auth__form">
        <div class="input__group">
          <label for="email"><b>Email</b></label>
          <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
        </div>
        
        <div class="input__group">
          <label for="password"><b>Mot de passe</b></label>
          <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <?php
if (isset($_GET['error'])) {
    var_dump($_GET['error']); // pour voir si l'erreur est bien passée
}
?>


        <?php if (!empty($_GET['error'])): ?>
          <div id="erreur" style="color: red; font-weight: bold;">
            <?php echo htmlspecialchars($_GET['error']); ?>
          </div>
        <?php endif; ?>

        <div class="button__group">
          <button type="submit" name="se connecter" class="btn">Se connecter</button>
          <button type="reset" class="btn btn--reset">Réinitialiser</button>
        </div>
      </form>
      <p class="auth__footer">
        Pas encore inscrit ? <a href="../public/inscrire.php">créer un compte</a>
      </p>
    </div>
  </section>
  <footer class="footer">
    <div class="footer__bar">© 2025 MonSite. Tous droits réservés.</div>
  </footer>
</body>
</html>
