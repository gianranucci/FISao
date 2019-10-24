<?php
use app\assets\AppAsset;
AppAsset::register($this);
?>
<footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; GR Development <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
