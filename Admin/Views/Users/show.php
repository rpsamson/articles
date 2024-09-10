<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?> User <?= $this->endSection() ?>
<?= $this->section('content') ?> 
   <h2>User</h2>

        <dl>
            <dt>Firstname</dt>
            <dd><?= $user->firstname ?></dd>
            <dt>Lastname</dt>
            <dd><?= $user->lastname ?></dd>
            <dt>Email</dt>
            <dd><?= $user->email ?></dd>
            <dt>Active?</dt>
            <dd><?= yesno($user->active) ?></dd>
            <dt>Banned?</dt>
            <dd><?= yesno($user->isBanned()) ?></dd>
            <dt>Created </dt>
            <dd><?= $user->created_at->humanize() ?></dd>

        </dl>
        <?= form_open('admin/users/' . $user->id . '/toggle-ban') ?>
           <button><?= $user->isBanned() ? "Unban" : "Ban" ?></button>
        <?= form_close() ?>

<?= $this->endSection() ?>