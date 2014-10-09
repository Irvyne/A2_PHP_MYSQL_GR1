<?php include __DIR__.'/_header.php'; ?>

<?php
echo '<article>';
    echo '<header><h1>'.$article['title'].'</h1></header>';
    echo '<p>'.$article['content'].'</p>';
echo '</article>';
?>

<?php include __DIR__.'/_footer.php'; ?>