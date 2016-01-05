<?php
require_once  '_defines.php';
require_once 'view parts/_page_base.php';
?>

<?php
var_dump($_POST);
$in_post = array_key_exists('register',$_POST);

$nom_ok = false;
if (array_key_exists('nom', $_POST)) {
  $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
  $nom_ok = (1 === preg_match('/^[A-Za-z]{3,}$/', $nom));
}

$prenom_ok = false;
if (array_key_exists('prenom', $_POST)) {
  $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
  $prenom_ok = (1 === preg_match('/^[A-Za-z]{5,}$/', $prenom));
}

$pseudo_ok = false;
if (array_key_exists('pseudo', $_POST)) {
  $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
  $pseudo_ok = (1 === preg_match('/^[a-z0-9]{4,}$/', $pseudo));
}

$email_ok = false;
if (array_key_exists('email', $_POST)) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  $email_ok = (false !== $email);
}

$password_ok = false;
if (array_key_exists('password', $_POST)) {
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$!*?]{4,}$/', $password));
}

if ($nom_ok &&$prenom_ok && $pseudo_ok && $email_ok && $password_ok) {

  header("Location: index.php");
  exit;
}
?>
  <div id="main"></div>

<form id="formulaire" name="inscription"  method="post" class="inscription.php">
  <p><label for="prenom">Prénom </label> : <input type="text" name="prenom" id="prenom"
     class="<?php echo $in_post && ! $prenom_ok ? 'error' : '';?>"
    value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>" /></p>

  <p><label for="nom">Nom</label> : <input type="text" name="nom" id="nom"
        value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>"/></p>

  <p><label for="email">Email</label> : <input type="text" name="email" id="email"
       value="<?php echo array_key_exists('email', $_POST) ? $_POST['email'] : '' ?>"  /></p>

  <p><label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"
        value="<?php echo array_key_exists('pseudo', $_POST) ? $_POST['pseudo'] : '' ?>" /></p>

  <p><label for="password">Password</label> : <input type="text" name="password" id="password"
    value="<?php echo array_key_exists('password', $_POST) ? $_POST['password'] : '' ?>"/></p>
  <p><input type="submit" name="register" id="register" value="S'inscrire" /> </p>

</form>

<?php
require_once 'view parts/_footer.php';
?>


