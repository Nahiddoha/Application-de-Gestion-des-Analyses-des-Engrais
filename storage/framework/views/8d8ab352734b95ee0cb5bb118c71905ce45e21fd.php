<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <link rel="stylesheet" href="css/auth.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="log">
  <h1 class="text-center mb-4">Connexion</h1>
  <form action="<?php echo e(route('projet.login')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('get'); ?>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <?php endif; ?>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" placeholder="Entrer votre Email" name="email" >
    </div>

    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" placeholder="Entrer le mot de passe" name="password" >
    </div>

    <div class="form-check mb-3">
      <input type="checkbox" class="form-check-input" id="remember_me" name="remember-me">
      <label class="form-check-label" for="remember_me">Remember me</label>
      <a href="reset-password.php" class="ml-2" id="a">Forgot password?</a>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
  </form>

  <p class="mt-3 mb-0">Vous n'avez pas de compte? <a href="<?php echo e(route('inscription')); ?>">S'inscrire</a></p>
</div>




</body>
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/authentification.blade.php ENDPATH**/ ?>