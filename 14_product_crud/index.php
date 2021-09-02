<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';

if ($search) {
  $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_Date DESC');
  $statement->bindValue(':title', "%$search%");
} else {

  $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_Date DESC');
}

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
    <form action="">
      <input type="text" name="search" class="form-control search-input " value="<?php echo $search ?>">
      <button type="submit" class="btn btn-primary">search</button>
      <a href="index.php" class="btn btn-secondary">reset</a>
    </form>
    <p>
      <a href="create.php" class="btn btn-success">Create Product</a>
    </p>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Picture</th>
        <th scope="col">Product Name</th>
        <th scope="col">Description</th>
        <th scope="col">Create At</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($products as $index => $value): ?>
        <tr>
          <th scope="row"> <?php echo $index + 1 ?></th>
          <td>
            <?php
            if ($value['image']) {
              echo '<img src="' . $value['image'] . '" alt="' . $value['title'] . '" width="60px" height="60px">';
            }
            ?>
          </td>
          <td><?php echo $value['title']; ?></td>
          <td><?php echo $value['description']; ?></td>
          <td><?php echo $value['create_date']; ?></td>
          <td><?php echo $value['price']; ?></td>
          <td>
            <a href="update.php?id=<?php echo $value['id'] ?>" type="button" class="btn btn-sm btn-primary">Edit</a>
            <form action="delete.php" method="post" style="display: inline-block">
              <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
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