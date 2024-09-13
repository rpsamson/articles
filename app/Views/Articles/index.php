<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Artilcles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Articles</h2>
<?= anchor('/articles/new', "New") ?>
<?php foreach ($articles as $article) : ?>
  <div>
    <h5><?= anchor(url_to('Articles::show', $article->id), $article->title)  ?></h5>
    <em>By <?= $article->firstname ?></em>
    <p> <?= $article->content ?></p>
  </div>
<?php endforeach ?>
<?= $pager->simpleLinks() ?>
<?= $this->endSection() ?>

