<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Artilcles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= anchor('/articles', "List") ?>

<div>
  <p><?= esc($article->title) ?></p>
  <p><?= esc($article->content) ?></p>
</div>

<?= anchor(url_to('Articles::edit',   $article->id), 'Edit') ?> | 
<?= anchor(url_to('Articles::confirmDelete', $article->id), 'Delete') ?> 



<?= $this->endSection() ?>

