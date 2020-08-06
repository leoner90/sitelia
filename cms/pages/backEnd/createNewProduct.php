<?php session_start();
$newName = htmlspecialchars(trim($_POST['name']));
$newDescription = htmlspecialchars(trim($_POST['description']));
$newPrice = htmlspecialchars(trim($_POST['price']));
$productID = htmlspecialchars(trim($_POST['productID']));
$oldColors = $_POST['oldColors']; // json stringified color + img url
$newColors = $_POST['newColors']; // Array of new colors with same index as new images
$newColors = json_decode($newColors);
$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' );
$blacklist = array(".php", ".phtml", ".php3", ".php4");
$newName = str_replace("'", "\'", $newName);
$newDescription = str_replace("'", "\'", $newDescription);

//FIELDS ERROR CHECK
if ($newName == ""  || strlen($newName) > 100 ) {
  $errors[] =  '<p > PRODUCT NAME CANNOT BE EMPTY , OR EXCEED 100 SYMBOLS</p>';
}
if ($newDescription == "" ) {
  $errors[] =  '<p> DESCRUPTION  CANNOT BE EMPTY </p>';
}
if ($newPrice == "" || $newPrice > 2147483648  || $newPrice < -2147483648 ||  !is_numeric($newPrice) ) {
  $errors[] =  '<p> INCORRECT PRICE </p>';
}
if (!empty($newColors)) {
  for ($i = 0 ; $i < sizeof($newColors) ; $i++) {
    if(strlen($newColors[$i]->color) == 0 ) {
      $errors[] =  '<p> NEW  COLOR CANNOT BE EMPTY New color # '.$i.'</p>';
    }
  }
  //Check tha all images are selected . Checking only new colors ,as if you change old color img it becomes new color
  if(!isset($_FILES['file']['name'])) {
    $errors[] = '<p> Select all images</p>';
  } elseif(sizeof($newColors) > sizeof($_FILES['file']['name'])) {
    $errors[] = '<p> Select all images</p>';
  }
} else {
  $errors[] =  '<p>Product should have at least one color </p>';
}




//IMAGES SIZE AND type check
if (isset($_FILES['file']['name']) && sizeof($_FILES['file']['name']) > 0) {
  for ($i = 0; $i < sizeof($_FILES['file']['name']); $i++) {
    if ($_FILES['file']['size'][$i] > 2097150 or $_FILES['file']['size'][$i] == 0 ) {
      $errors[] = '<p> File size is too big!. 2mb allowed. New Img # '.$i.'</p>';
    } else {
      if (!in_array($_FILES['file']['type'][$i], $types)){
        $errors[] =  '<p> Allowed only: *.png, *.gif, *.jpg New Img #'.$i.'</p>';
      }
    }
    foreach ($blacklist as $item) {
      if(preg_match("/$item\$/i", $_FILES['file']['name'][$i])) {
        $errors[] =   '<p>PHP file not allowed! New Img #'.$i.'</p>';
      }
    }
  }
}
//IF NO ERRORS
if (empty($errors)) {
  //SAVE TO DB AND GET ID FOR FOLDER CREATION
  include '../../../pages/bdConnect.php';
  $dbname = $hostingName."sitelia";
  $conn = new mysqli($servername, $username, $serverpassword, $dbname);
  $conn->set_charset("utf8");
  $sql = "INSERT INTO products (name, price, description) VALUES ('$newName', '$newPrice', '$newDescription')";
  if (!$conn->query($sql)) {
    echo $errors =   json_encode('<p>Error description:' . $conn -> error.'</p>');
    exit;
  }
  $productID = $conn->insert_id;

  //SAVE IMAGES TO THE SERVER
  if (isset($_FILES['file']['name']) && sizeof($_FILES['file']['name']) > 0) {
    for ($i = 0; $i < sizeof($_FILES['file']['name']); $i++) {
      $sourcePath = $_FILES['file']['tmp_name'][$i]; //временный путь и имя файла
      $img_name = time() . $i . $_FILES['file']['name'][$i]; // unic name
      $newColors[$i]->imgUrl = $img_name;
      $targetPath = "../../../img/products/ID".$productID."/" ;  // путь и имя куда сохраняется файл
      if (!is_dir($targetPath)) {
        mkdir($targetPath);
      }
      $targetPath = $targetPath . $img_name;  // путь и имя куда сохраняется файл
      $saveImg =  move_uploaded_file($sourcePath, $targetPath);
      if(!$saveImg ) {
        echo $errors =   json_encode('<p>Not uploaded because of error'.$_FILES["file"]["error"][$i].'</p>');
        exit;
      }
    }
  }
  //Default img first image of all images
  $defaultImg = $newColors[0]->imgUrl;
  //JSOM object of all colors and images
  $newMysqlColor = json_encode($newColors);

  //Save to DB REST OF INFOы
  $sql = "UPDATE products SET color ='$newMysqlColor', defaultImg='$defaultImg'  WHERE id='$productID'";
  $result = $conn->query($sql);
  if (!$conn->query($sql)) {
    echo $errors =   json_encode('<p>Error description:' . $conn -> error.'</p>');
    exit;
  }
  $conn->close();
  //IF ERRORS -RETURN ERROS
} else {
  $errors = json_encode($errors);
  echo $errors;
  exit;
}
