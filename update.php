<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';
?>

<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="#">php.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/handson3/home.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Create</a>
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

<?php

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

$errors = [
    'name' => "",
    'price' => "",
    'discount' => "",
    'sold' => "",
    'location' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = updateUser($_POST, $userId);
        uploadImage($_FILES['picture'], $user);
        header("Location: home.php");
    }
}

?>

<?php include '_form.php' ?>
