<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/_header.php';

if (!empty($_GET['id'])) {
    $article = getArticle($link, $_GET['id']);

    if (null === $article)
        header('Location: index.php');
} else {
    header('Location: index.php');
}

include __DIR__.'/templates/article.php';