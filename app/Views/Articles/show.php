<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Artilcles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= anchor('/articles', "List") ?>

<div>
  <p><?= esc($article->title) ?></p>
  <p><?= esc($article->content) ?></p>
</div>

<?= anchor('/articles/edit/'   . $article->id, 'Edit') ?> | 
<?= anchor('/articles/delete/' . $article->id, 'Delete') ?>


<?= $this->endSection() ?>

