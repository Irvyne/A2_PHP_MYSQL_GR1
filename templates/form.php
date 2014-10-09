<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .error {
            background-color: red;
        }
        .success {
            background-color: green;
        }
    </style>
</head>
<body>

<?php
if (isset($errors) && sizeof($errors) > 0) {
    echo '<ul class="error">';
    foreach ($errors as $error) {
        echo '<li>'.$error.'</li>';
    }
    echo '</ul>';
}
if (!empty($success)) {
    echo '<p class="success">'.$success.'</p>';
}
?>

<form action="" method="post">
    <label for="title">Title: </label>
    <input id="title" name="title" type="text" placeholder="Title" required autofocus>
    <br>
    <label for="content">Content: </label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <br>
    <label for="enabled">Enabled: </label>
    <input id="enabled" name="enabled" type="checkbox">
    <br>
    <label for="image">Image: </label>
    <input id="image" name="image" type="file">
    <br>
    <label for="category">Category: </label>
    <select name="category" id="category">
        <option value="1">Animals</option>
        <option value="2">Funny</option>
        <option value="3" selected>Epic Fail</option>
    </select>
    <br>
    <label for="tag1">Cat: </label>
    <input id="tag1" name="tags[]" type="checkbox" value="1">
    <label for="tag2">Dog: </label>
    <input id="tag2" name="tags[]" type="checkbox" value="2">
    <label for="tag3">Fish: </label>
    <input id="tag3" name="tags[]" type="checkbox" value="3">
    <br>
    <input name="submitArticle" type="submit" value="Submit Me">
</form>

</body>
</html>