<?php
// $servername = "localhost";
// $username = "smart";
// $password = "SwxzLkzgH9YDmN5a";
// $dbname = "smartmedsolutions";
include('./config/conn.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
  // $_GET['message']
  // $_GET['altertype']
  header('Location: index.php?message=There was a problem. Please email documents&altertype=danger');
}
?>

<?php
if($_POST['company']){
    $company = strip_tags($_POST['company']);
  // print('<h2>'.$_POST['company'].'</h2>');
  // print('<h2>'.$company .'</h2>');
 }

 if($_POST['address']){
  $address = strip_tags($_POST['address']);
// print('<h2>'.$_POST['address'].'</h2>');
// print('<h2>'.$address .'</h2>');
}

if($_POST['phone']){
  $phone = strip_tags($_POST['phone']);
// print('<h2>'.$_POST['phone'].'</h2>');
// print('<h2>'.$phone .'</h2>');
}
?>


<?php
$sql = "INSERT INTO license (company, address, phone, imageno)
VALUES ('$company', '$address', '$phone', '1000')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
  header('Location: index.php?message=There was a problem. Please email documents&altertype=danger');
}

$conn->close();

// print('<h2>'.$_FILES["fileToUploadDEA"]["name"].'</h2>');
// print('<h2>'.$_FILES["fileToUploadDEA"]["name"].'</h2>');

$_FILES["fileToUploadDEA"]["name"] = $last_id.'-'.$_FILES["fileToUploadDEA"]["name"];

// print('<h2>'.$_FILES["fileToUploadDEA"]["name"].'</h2>');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUploadDEA"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUploadDEA"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUploadDEA"]["size"] > 500000) {
  // echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUploadDEA"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUploadDEA"]["name"])). " has been uploaded.";
  } else {
    // echo "Sorry, there was an error uploading your file.";
  }
}

?>


<?php
// ==============================================================

// print('<h2>'.$_FILES["fileToUploadCLIA"]["name"].'</h2>');
$_FILES["fileToUploadCLIA"]["name"] = $last_id.'-'.$_FILES["fileToUploadCLIA"]["name"];
// print('<h2>'.$_FILES["fileToUploadCLIA"]["name"].'</h2>');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUploadCLIA"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUploadCLIA"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUploadCLIA"]["size"] > 500000) {
  // echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUploadCLIA"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUploadCLIA"]["name"])). " has been uploaded.";
  } else {
    // echo "Sorry, there was an error uploading your file.";
  }
}

//  print('<h1>'.$uploadOk.'</h1>');
if($uploadOk==1){
 header('Location: index.php?message=Upload Successful&altertype=success');
}else{
 header('Location: index.php?message=There was a problem. Please email documents&altertype=danger');
 }
?>