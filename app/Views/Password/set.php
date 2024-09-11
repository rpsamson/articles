<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?>Password<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Set Password</h2>
<?php if (session()->has('errors')) :?>
  <ul>
    <?php foreach (session()->errors as $error) :?>
        <li><span><?= $error ?></span></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?= form_open() ?>
  <label for="password">New Password</label>
  <input type="password" name="password" value="<?= old('password')?>" required/>
  <label for="password_confirmation">New Password (again)</label>
  <input type="password" name="password_confirmation" value="<?= old('password_confirmation')?>" required/>
  <button type=submit>Change</button>
<?= form_close() ?>



<?= $this->endSection() ?>

