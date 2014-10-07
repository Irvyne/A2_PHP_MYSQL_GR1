<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

$config = include __DIR__.'/config/config.php';
include __DIR__.'/functions/database.fn.php';

$link = getDatabaseLink($config['database']);
