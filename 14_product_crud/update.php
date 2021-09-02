<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;

//echo $id;

if (!$id) {
  header('Location: index.php');
  exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($products)) {
  header('Location: index.php');
  exit;
}

$product = $products[0];

//echo '<pre>';
//var_dump($product);
//echo '</pre>';

$title = $product['title'];
$image = '';
$description = $product['description'];
$price = $product['price'];

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
  $filePath = $product['image'] ?? null;

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
    $statement = $pdo->prepare("UPDATE products SET title=:title, description=:description, price=:price, image=:image where id=:id");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $filePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
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
<p>
  <a href="index.php" type="button" class="btn btn btn-success">Back to Products</a>
</p>

<h1>Upadate Product <?php echo $title ?> </h1>
<?php if (count($errors) > 0): ?>
  <?php foreach ($errors as $error): ?>
    <div class="alert alert-danger" role="alert">
      <div><?php echo $error ?></div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
<?php if ($product['image']): ?>
  <img src="<?php echo $product['image'] ?>" alt=" <?php echo $title ?> " width="140" height="140">
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
