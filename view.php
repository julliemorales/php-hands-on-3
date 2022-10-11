<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

?>
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="#">php.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/handson3/home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/handson3/create.php">Create</a>
      </li>
    </ul>
  </div>
</nav>
</div>

<div class="container mb-3">
<div>
    <a href="/handson3/home.php">
    <button class="btn btn-primary"> Back to Home</button>
    </a>
</div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="display-4">View Product: <b><?php echo $user['name'] ?></b></p>
        </div>
        <div class="card-body">
            <a class="btn btn-secondary" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>Product Name:</th>
                <td><?php echo $user['name'] ?></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><?php echo $user['price'] ?></td>
            </tr>
            <tr>
                <th>Discount:</th>
                <td><?php echo $user['discount'] ?></td>
            </tr>
            <tr>
                <th># Sold:</th>
                <td><?php echo $user['sold'] ?></td>
            </tr>
            <tr>
                <th>Location:</th>
                <td><?php echo $user['location'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include 'partials/footer.php' ?>
