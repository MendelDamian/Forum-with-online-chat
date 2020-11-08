<?php require_once 'includes/baseTopSite.inc.php'; ?>

<?php

if (isset($_SESSION['user_id']) === true && isset($_SESSION['username']) === true) {
  header('Location: index.php');
}

if (isset($_POST['submit']) === true) {
  $userContr = new UserController();
  $results = $userContr->loginUser($_POST['username'], $_POST['password']);

  if ($results['success'] === true) {
    $next_url = isset($_GET['next_url']) ? $_GET['next_url'] : 'index.php';
    header('Location:' . $next_url);
  } {
    echo '<div class="errorBox">' . $results['ErrorMessage'] . '</div>';
  }
}

?>

<div class="auth">
  <form action="" method="POST" class="auth">
    <h1>Logowanie</h1>
    <input type="text" placeholder="Nazwa użytkownika..." name="username" onfocus="this.removeAttribute('readonly');" required autofocus>
    <input type="password" placeholder="Hasło..." name="password" onfocus="this.removeAttribute('readonly');" required>

    <input type="submit" name="submit" value="Zaloguj" class="button">
    <p class="links"><a href="register.php">Rejestracja</a></p>
  </form>
</div>

<?php $footer=false; require_once 'includes/baseBottomSite.inc.php'; ?>