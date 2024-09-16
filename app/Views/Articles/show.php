<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Artilcles<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= anchor('/articles', "List") ?> |

<div>
  <p><?= esc($article->title) ?></p>
  <?php if ($article->image): ?>
    <img src="<?= url_to("Article\Image::get", $article->id) ?>" alt="iamge">
    <?= form_open("articles/" .$article->id . "/image/delete") ?>
        <button>Remove</button>
    <?=form_close() ?>
  <?php else: ?>
    <?= anchor('articles/' . $article->id . '/image/edit', "Edit Image") ?>
  <?php endif ?>
  <p><?= esc($article->content) ?></p>
</div>


<?php if ($article->isOwner() || auth()->user()->can('article.edit')): ?>
  <?= anchor(url_to('Articles::edit', $article->id), 'Edit') ?> |
<?php endif ?>

<?php if ($article->isOwner() || auth()->user()->can('article.delete')): ?>
  <?= anchor(url_to('Articles::confirmDelete', $article->id), 'Delete') ?>
<?php endif ?>


<?= $this->endSection() ?>