<!doctype html>
<html lang="id">
<?= view('layouts/head') ?>
<body>
    <?= view('layouts/header', ['c' => $c]) ?>
    <?= $content ?>
    <?= view('layouts/footer', ['visitorTotal' => $visitorTotal]) ?>
</body>
</html>
