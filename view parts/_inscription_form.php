<?php
require_once  '_defines.php';
require_once 'view parts/_page_base.php';
?>

<?php
var_dump($_POST);
$in_post = array_key_exists('register',$_POST);
$msg_nom = ' ';

$nom_ok = false;
if (array_key_exists('nom', $_POST)) {
  $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
  $nom_ok = (1 === preg_match('/^[A-Za-z]{3,}$/', $nom));
if( ! $nom_ok){
$msg_nom = 'Le nom ne doit contenir que des lettres (min 3).';
}
}
$msg_prenom = ' ';
$prenom_ok = false;
if (array_key_exists('prenom', $_POST)) {
  $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
  $prenom_ok = (1 === preg_match('/^[A-Za-z]{3,}$/', $prenom));
  if(! $prenom_ok){
    $msg_prenom = 'Le prenom ne doit contenir que des lettres (min 3).';
  }
}

$pseudo_ok = false;
$msg_pseudo = ' ';
if (array_key_exists('pseudo', $_POST)) {
  $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
  $pseudo_ok = (1 === preg_match('/^[a-zA-Z0-9]{4,}$/', $pseudo));
  if (! $pseudo_ok){
    $msg_pseudo = ' le pseudo doit contenir des lettres et des chiffres (min 4)';
  }
}
$msg_email= ' ';
$email_ok = false;
if (array_key_exists('email', $_POST)) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  $email_ok = (false !== $email);
  if(! $email_ok){
    $msg_email = 'l\'email doit contenir au moins @';
  }
}
$msg_password = ' ';
$password_ok = false;
if (array_key_exists('password', $_POST)) {
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$!*?]{4,}$/', $password));
if(!$password_ok){
  $msg_password = ' le password ne doit contenir des lettres % , $ , ! , * , ? (min 4)';
}
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
  <span><?php echo $msg_prenom ?></span>

  <p><label for="nom">Nom</label> : <input type="text" name="nom" id="nom"
        class="<?php echo $in_post && ! $nom_ok ? 'error' : '';?>"
        value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>"/></p>
  <span><?php echo $msg_nom ?></span>

  <p><label for="email">Email</label> : <input type="text" name="email" id="email"
     class="<?php echo $in_post && ! $email_ok ? 'error' : '';?>""
    value="<?php echo array_key_exists('email', $_POST) ? $_POST['email'] : '' ?>"  /></p>
  <span><?php echo $msg_email ?></span>

  <p><label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"
       class="<?php echo $in_post && ! $pseudo_ok ? 'error' : '';?>""
       value="<?php echo array_key_exists('pseudo', $_POST) ? $_POST['pseudo'] : '' ?>" /></p>
  <span><?php echo $msg_pseudo ?></span>

  <p><label for="password">Password</label> : <input type="text" name="password" id="password"
     class="<?php echo $in_post && ! $password_ok ? 'error' : ''; ?>"
     value="<?php echo array_key_exists('password', $_POST) ? $_POST['password'] : '' ?>"/></p>
  <span><?php echo $msg_password ?></span>

  <p><input type="submit" name="register" id="register" value="S'inscrire" /> </p>

</form>

<?php
require_once 'view parts/_footer.php';
?>


