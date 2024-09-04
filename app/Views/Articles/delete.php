<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Article<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= anchor('/articles', "List") ?>



<h2> <?= $article->title ?> </h2> 
<p>Are You Sure you want to delete this ? </p>   

<?= form_open('articles/' . $article->id) ?>
    <input type="hidden" name="_method" value="DELETE" />
    <button type=submit>Yes</button>
<?= form_close() ?>



<?= $this->endSection() ?>

