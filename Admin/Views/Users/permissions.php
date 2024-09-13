<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?> Permissions <?= $this->endSection() ?>
<?= $this->section('content') ?> 
   <h2>Permissions</h2>
   <?= form_open("admin/users/" . $user->id ."/permissions") ?>
     <label for="permissions">
         <input type="checkbox" name="permissions[]"  value="article.edit" 
          <?= $user->hasPermission('article.edit') ? "checked" : "" ?> />article.edit
     </label>
     <label for="permissions">
         <input type="checkbox" name="permissions[]"  value="article.delete" 
          <?= $user->hasPermission('article.delete') ? "checked" : "" ?> />article.delete
     </label>
     <button>Save</button>
   <?= form_close() ?>


<?= $this->endSection() ?>