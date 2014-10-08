<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

function getArticles($link) {
    $sql = 'SELECT * FROM article';
    $result = mysqli_query($link, $sql);

    $articles = [];

    while ($article = mysqli_fetch_assoc($result)) {
        $articles[] = $article;
    }

    return $articles;
}

function getArticle($link, $id) {
    $sql = 'SELECT * FROM article WHERE id='.mysqli_real_escape_string($link, $id);
    $result = mysqli_query($link, $sql);

    return mysqli_fetch_assoc($result);
}

function addArticle($link, $title, $content, $enabled, $image, $categoryId, $userId) {
    $sql = 'INSERT INTO article (id, title, content, enabled, image, category_id, user_id) VALUES (NULL, ?, ?, ?, ?, ?, ?)';
    $prepareStatement = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($prepareStatement, 'ssisii', $title, $content, $enabled, $image, $categoryId, $userId);

    return mysqli_stmt_execute($prepareStatement);
}

function updateArticle($link, $id, array $update) {
    $sql = 'UPDATE article SET ';

    $i = 0;
    foreach ($update as $column => $value) {
        if ($i > 0) {
            $sql .= ', ';
        }

        $sql .= $column.'=';

        if (is_string($value)) {
            $sql .= '"';
        }

        $sql .= mysqli_real_escape_string($link, $value);

        if (is_string($value)) {
            $sql .= '"';
        }

        $i++;
    }
    $sql .= ' WHERE id='.mysqli_real_escape_string($link, $id);

    return mysqli_query($link, $sql);
}

function removeArticle($link, $id) {
    $sql = 'DELETE FROM article WHERE id='.mysqli_real_escape_string($link, $id);
    return mysqli_query($link, $sql);
}
