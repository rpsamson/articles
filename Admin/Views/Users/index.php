<?= $this->extend('Layouts/default') ?>
<?= $this->section('title') ?> Users <?= $this->endSection() ?>
<?= $this->section('content') ?> 
   <h2>Users</h2>
    <table>
        <thead>
            <th>Email</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Active?</th>
            <th>Banned?</th>
            
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= anchor(url_to('\Admin\Controllers\Users::show' , $user->id), $user->email) ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->lastname ?></td>
                <td><?= yesno($user->active) ?></td>
                <td><?= yesno($user->isBanned()) ?></td>
                
               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?= $pager->links() ?>


<?= $this->endSection() ?>