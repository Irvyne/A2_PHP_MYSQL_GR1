<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

// TODO afficher 6 articles

require __DIR__.'/_header.php';

$errors = [];

if (!empty($_POST['submitArticle'])) {
    $mandatoryFields = ['title', 'content', 'category'];
    foreach ($mandatoryFields as $mandatoryField) {
        if (empty($_POST[$mandatoryField])) {
            $errors[] = $mandatoryField.' cannot be empty';
        }
    }

    // If no errors
    if (0 === sizeof($errors)) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $enabled = isset($_POST['enabled']) ? true : false;
        $image = isset($_POST['image']) ? $_POST['image'] : null;
        $category = $_POST['category'];
        $tags = isset($_POST['tags']) ? $_POST['tags'] : null;

        $successfullyAdded = addArticle($link, $title, $content, $enabled, $image, $category, 1);
        if ($successfullyAdded) {
            $success = 'Article have been successfully added!';
        } else {
            $errors[] = 'An error occurred!';
        }
    }
}

$articles = getArticles($link);

include __DIR__.'/templates/form.php';
