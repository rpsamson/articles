<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<!-- Show Flash Messages  -->
  <?php if (session()->has('message')) : ?>
     <span><?= session('message') ?></span>
  <?php endif; ?>

  <?php if (session()->has('error')) : ?>
     <span><?= session('error') ?></span>
  <?php endif; ?>

  
  <nav>
      <?= anchor(url_to('/'), 'HOME') ?>  |
      <?php if (auth()->loggedIn() ) : ?>
         Hello <?= auth()->user()->firstname ?> |

         <?= anchor(url_to('articles'), 'ARTICLES') ?>  |
         <?= anchor(url_to('admin/users'), 'USERS') ?>  |
         <?= anchor(url_to('logout'), 'LOGOUT') ?>  
      <?php else : ?>
         <?= anchor(url_to('login'), 'LOGIN') ?> 
      <?php endif ?>
  </nav>
  <div>
    <?= $this->renderSection('content') ?>
  </div>
</body>
</html>