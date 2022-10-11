<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser($data)
{
    $users = getUsers();

    $data['id'] = rand(1000000, 2000000);

    $users[] = $data;

    putJson($users);

    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function deleteUser($id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function uploadImage($file, $user)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        $fileName = $file['name'];
        $dotPosition = strpos($fileName, '.');
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;
    if (!$user['name'] || strlen($user['name']) < 5 || strlen($user['name']) > 100) {
        $isValid = false;
        $errors['name'] = '* Product Name is required and must consist of more than 5 characters and less than 100 characters';
    }
    if (!filter_var($user['price'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['price'] = '* Price is required and should only contain numbers';
    }
    if (!filter_var($user['discount'], FILTER_VALIDATE_INT)) {
        // $errors['price'] = 'Price should be a number';
    }
    // if ($user['discount'] && !filter_var($user['discount'], FILTER_VALIDATE_EMAIL)) {
    //     $isValid = false;
    //     $errors['discount'] = 'This must be a valid email address';
    // }

    if (!filter_var($user['sold'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['sold'] = '* Number of sold items is required and should only contain numbers';
    }

    if (!$user['location'] || strlen($user['location']) <= 10 ) {
        $isValid = false;
        $errors['location'] = '* Product location is required and must consist of more than 10 characters ';
    }

    return $isValid;
}
