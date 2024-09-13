<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?> Groups <?= $this->endSection() ?>
<?= $this->section('content') ?> 
   <h2>Groups</h2>
   <?= form_open("admin/users/" . $user->id ."/groups") ?>
     <label for="groups">
         <input type="checkbox" name="groups[]"  value="user" 
          <?= $user->inGroup('user') ? "checked" : "" ?> />user
     </label>
     <label for="groups">
       <?php if($user->id === auth()->user()->id) : ?>
           <input type="checkbox" checked disabled> admin
           <input type="hidden" name="groups[]" value="admin" >
       <?php else : ?>
         <input type="checkbox" name="groups[]"  value="admin" 
          <?= $user->inGroup('admin') ? "checked" : "" ?> />admin
       <?php endif ?>
     </label>
     <button>Save</button>
   <?= form_close() ?>


<?= $this->endSection() ?>