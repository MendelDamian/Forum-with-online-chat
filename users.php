<?php require_once 'includes/baseTopSite.inc.php'; ?>
<?php
$userContr = new UserController();
$users = $userContr->getAllUsernames();
echo 'Użytkownicy na forum: ';
$usersCount = count($users);
for ($i=0; $i < $usersCount; $i++) { 
  echo '<a href="" style="color: ' . $users[$i]['color'] . ';">' . $users[$i]['username'] . '</a>';
  echo $i < $usersCount - 1 ? ', ' : ''; // Join usernames with commas
}

?>
<?php require_once 'includes/baseBottomSite.inc.php'; ?>
