<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="css/auth.css">
    <style>
      body{
    background-image: url(images/engrais.jpg);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
}

.login {
    width: 300px;
    margin: auto;
    background: rgba(255, 255, 255, 0.5);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px 0px #0000001a;
    margin-top: 20vh;
    padding-right: 50px;
    backdrop-filter: blur(10px);
  }
  
  h1 {
    margin: 0 0 20px;
    font-size: 24px;
    font-weight: 600;
    color: #333;
    text-align: center;
  }
  
  input {
    display: block;
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: none;
    box-shadow: 0px 0px 20px 0px #0000001a;
    font-size: 16px;
  }
  
  .btn {
    background-color: green;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    margin-top: 5px;
    margin-left: 30%;
  }
  
  a {
    color: green;
    font-size: 16px;
    text-decoration: none;
  }

  .c1{
     margin-left: 20%;
  }

  #remember_me{
    display: inline;
    width: 5%;
  }
  
    </style>
</head>
<body>
 
    <div class="login">
      <h1>Connexion</h1>
      <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" placeholder="Entrer votre Email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <div >
        <input type="checkbox" id="remember_me" name="remember-me">Remember me
        <a href="reset-password.php" class="c1" id="a">Forgot password?</a> 
      </div>
        <button type="submit" class="btn">Connexion</button>
      </form>

      <p>Vous n'avez pas de compte?<a href="inscription.php">S'inscrire</a></p>
    </div>

    <script src="js/script.js"></script>
    
</body>
</html>
</body>
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/confirm.blade.php ENDPATH**/ ?>