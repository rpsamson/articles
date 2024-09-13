<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Artilcles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= anchor('/articles', "List") ?>

<div>
  <p><?= esc($article->title) ?></p>
  <p><?= esc($article->content) ?></p>
</div>


<?php if($article->isOwner() || auth()->user()->hasPermission('article.edit')): ?>
  <?= anchor(url_to('Articles::edit',   $article->id), 'Edit') ?> |
<?php endif ?>

<?php if($article->isOwner() || auth()->user()->hasPermission('article.delete')): ?>
  <?= anchor(url_to('Articles::confirmDelete',   $article->id), 'Delete') ?> 
<?php endif ?>


<?= $this->endSection() ?>

