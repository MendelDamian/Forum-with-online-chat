<header>
  <div class="left">
    <a href="index.php"><img src="assets/images/logo.png" alt="Logo" class="logo"></a>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="users.php">Użytkownicy</a></li>
      <li><a href="">Top 10</a></li>
      <li><a href="">Szukaj</a></li>
      <li><a href="index.php#chat">Chat</a></li>
    </ul>
  </div>
  <div class="right">
    <ul>
      <?php
      if (isset($_SESSION['username']) && isset($_SESSION['username'])) {
        echo '<li><a href="index.php" class="main">' . $_SESSION['username'] . '</a></li>';
        echo '<li><a href="logout.php">Wyloguj się</a></li>';
      } else {
        echo '<li><a href="register.php">Zarejestruj się</a></li>';
        echo '<li><a href="login.php">Zaloguj się</a></li>';
      }
      ?>
    </ul>
  </div>
</header>