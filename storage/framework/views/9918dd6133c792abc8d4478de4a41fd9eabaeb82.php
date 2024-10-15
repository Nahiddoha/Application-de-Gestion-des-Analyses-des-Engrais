<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription</title>
    <link rel="stylesheet" href="css/style_inscription.css">
    <style>
        body{
    background-image: url(images/engrais.jpg);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
}

form {
    display: flex;
    flex-direction: column;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.5);
    box-shadow: 0px 0px 20px 0px #0000001a;
    backdrop-filter: blur(10px);
  }
  
  h1{
    text-align: center;
  }

  label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="password"] {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  select {
    display: block;
    padding: 0.5rem;
    font-size: 1rem;
    border-radius: 0.25rem;
    border: 1px solid #ccc;
  }
  
  option {
    font-size: 1rem;
  }
  
  input[type="radio"] {
    margin-right: 5px;
  }
  .sexe{
    display: flex;
  }
  
  input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 15px;
  }
  
  input[type="submit"]:hover {
    background-color: #45a049;
  }

  a {
    color: green;
    font-size: 16px;
    text-decoration: none;
  }
    </style>
</head>
<body>
        <form action="<?php echo e(route('users.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
	    <h1>Inscription</h1>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" >
		<div id="msg1"></div><br>
      
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" >
        <div id="msg2"></div><br>

		<label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@ocpgroup\.ma$" >
        <div id="msg3"></div><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" >
        <div id="msg4"></div><br>

        <label for="confirmpassword">Confirmation du mot de passe:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" >
		<div id="msg5"></div><br>

        <label for="mission">Mission</label>
        <select name="mission" id="mission">
            <option value="#">Choisir votre mission</option>
            <option value="controleur">Contrôleur</option>
            <option value="analyste">Analyste</option>
        </select>
		<div id="msg6"></div><br>
      
        <label for="sexe">Sexe:</label>
		<div class="sexe">
        <input type="radio" id="homme" name="sexe" value="homme" class="sexe">Homme
        <input type="radio" id="femme" name="sexe" value="femme" class="sexe">Femme
		</div>
		<div id="msg7"></div><br>
        <input type="submit" value="S'inscrire">
        <p>Vous avez deja compte?<a href="authentification.php">Connexion</a></p>
</form>     
</body>
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/contact.blade.php ENDPATH**/ ?>