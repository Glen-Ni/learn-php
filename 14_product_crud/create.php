<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title = '';
$image = '';
$description = '';
$price = 0;
date_default_timezone_set("Asia/Shanghai");
$create_date = date('Y-m-d H:i:s');

//echo $create_date;

//echo $_POST;
//echo '<pre>';
//var_dump($_POST);
//echo '</pre>';
//echo '<pre>';
//var_dump($_FILES);
//echo '</pre>';
//exit;

function randomStr($n)
{
  $str = '';
  $characters = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
  for ($i = 0; $i < $n; $i++) {
    $num = rand(0, strlen($characters) - 1);
    $str .= $characters[$num];
  }
  return $str;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $image = $_FILES['image'] ?? null;
  $filePath = '';

  if ($title === '') {
    $errors[] = 'Product title is required!';
  }

  if ($price === '') {
    $errors[] = 'Product price is required!';
  }

  if (!is_dir('uploaded_files')) {
    mkdir('uploaded_files');
  }

  if ($image && $image['tmp_name']) {
    $filePath = 'uploaded_files/' . randomStr(10) . '/' . $image['name'];
    mkdir(dirname($filePath));
    move_uploaded_file($image['tmp_name'], $filePath);
  }

//  move_uploaded_file();
  if (empty($errors)) {
    $statement = $pdo->prepare("INSERT INTO products(title, image, description, price, create_date) VALUES(:title, :image, :description, :price, :create_date)");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $filePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':create_date', $create_date);
    $statement->execute();

    header('Location: index.php');
  }
//$products = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Product</title>
  <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./style/app.css">
</head>
<body>
<h1>Create New Product</h1>
<?php if (count($errors) > 0): ?>
  <?php foreach ($errors as $error): ?>
    <div class="alert alert-danger" role="alert">
      <div><?php echo $error ?></div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="image-file" class="form-label">upload image</label>
    <br>
    <input type="file" id="image-file" name="image">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">description</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">price</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $price ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
