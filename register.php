<?php require_once 'includes/baseTopSite.inc.php'; ?>

<?php

if (isset($_SESSION['user_id']) === true && isset($_SESSION['username']) === true) {
  header('Location: index.php');
}

if (isset($_POST['submit']) === true) {
  $userContr = new UserController();
  $results = $userContr->registerUser($_POST['username'], $_POST['password'], $_POST['confirm_password']);

  if ($results['success'] === true) {
    header('Location:login.php');
  } {
    echo '<div class="errorBox">' . $results['ErrorMessage'] . '</div>';
  }
}

?>

<div class="auth">
  <form action="" method="POST" class="auth">
    <h1>Rejestracja</h1>
    <input type="text" pattern="^[a-zA-Z0-9]{6,50}$" placeholder="Nazwa użytkownika..." name="username" onfocus="this.removeAttribute('readonly');" required autofocus>
    <input type="password" pattern="^\S{8,128}$" placeholder="Hasło..." name="password" onfocus="this.removeAttribute('readonly');" required>
    <input type="password" pattern="^\S{8,128}$" placeholder="Potwierdź hasło..." name="confirm_password" onfocus="this.removeAttribute('readonly');" required>

    <input type="submit" name="submit" value="Zarejestruj" class="button">
    <p class="links"><a href="login.php">Logowanie</a></p>
  </form>
</div>

<?php $footer=false; require_once 'includes/baseBottomSite.inc.php'; ?>