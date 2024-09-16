<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Edit Image<?= $this->endSection() ?>

<?= $this->section('content') ?>


<?php if (session()->has('errors')) :?>
  <ul>
    <?php foreach (session()->errors as $error) :?>
        <li><span><?= $error ?></span></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>
<h3>Edit Image</h3>

<?= form_open_multipart('articles/' . $article->id . '/image/create') ?>
      <label for="image">Edit Image</label>
      <input type="file" name="image" >
      <button>Upload</button>
<?= form_close() ?>



<?= $this->endSection() ?>

