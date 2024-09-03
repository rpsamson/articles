<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Article<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= anchor('/articles', "List") ?>



<h2> <?= $article->title . " .Are You Sure you want to delete this ?" ?>  </h2>

<?= form_open('/articles/delete/' . $article->id) ?>
    <button type=submit>Yes</button>
<?= form_close() ?>



<?= $this->endSection() ?>

