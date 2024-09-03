<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Artilcles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= anchor('/articles', "List") ?>

<?php if (session()->has('errors')) :?>
  <ul>
    <?php foreach (session()->errors as $error) :?>
        <li><span><?= $error ?></span></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?= form_open('/articles/update/' . $article->id) ?>
  <label for="title">Title</label>
  <input type="text" name="title" value="<?= set_value('title', $article->title)?>"/>

  <label for="content">Content</label>
  <textarea  name="content" ><?= set_value('content', $article->content)?></textarea>

  <button type=submit>Save</button>
<?= form_close() ?>



<?= $this->endSection() ?>

