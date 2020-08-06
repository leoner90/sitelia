<?php
function isUserLoggedIn() {
  if (isset($_SESSION['id']) and isset($_SESSION['hash'])) {
  //OPENS FROM DIFFERENT PLACES WHERE PATCH IS DIFFERENT
    if (file_exists('../pages/bdConnect.php')) {
      include '../pages/bdConnect.php';
    }
    if (file_exists('../../../pages/bdConnect.php')) {
      include '../../../pages/bdConnect.php';
    }
    $dbname = $hostingName . "sitelia";
    $conn = new mysqli($servername, $username, $serverpassword, $dbname);
    $sql = "SELECT  hash FROM users WHERE id='" . intval($_SESSION['id']) . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['hash'] == $_SESSION['hash']) {
      return 1;
    } else {
      return 0;
    }
  } else {
    return 0;
  }
}
