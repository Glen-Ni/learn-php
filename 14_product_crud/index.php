<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_Date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($products);
//echo '<pre>';

?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
  <title>Products</title>
  <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./style/app.css">
  <body>
  <div class="wrapper">
    <h1>Products CRUD</h1>
    <p>
      <a href="create.php" class="btn btn-success">Create Product</a>
    </p>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Description</th>
        <th scope="col">Create at</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($products as $index => $value) {
          echo '<tr>
                <th scope="row">' . ($index + 1) . '</th>
                <td>' . ($value['title']) . '</td>
                <td>' . ($value['description']) . '</td>
                <td>' . ($value['create_date']) . '</td>
                <td>' . ($value['price']) . '</td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </td>
              </tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
  </body>
</html>
<?php
//echo '<pre>';
//var_dump($products);
//echo '<pre>';
//?>