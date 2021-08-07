<?php

/**
 * @var array $menu
 * @var array $dumps
 * @var View $this
 * @var string $content
 */

use ZnLib\Web\View\View;

?>

<?= $content ?>

<?php
if(isset($dumps)) {
    foreach ($dumps as $dump) {
        dump($dump);
    }
}
?>

