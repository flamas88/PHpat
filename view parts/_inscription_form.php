<?php
var_dump($_POST);
require_once  '_defines.php';
require_once 'view parts/_page_base.php';
?>


<?php
var_dump($_POST);
$nom_ok = false;
if (array_key_exists('nom', $_POST)) {
  $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
  $nom = filter_var($nom, FILTER_SANITIZE_STRING);

  $nom_ok = (1 === preg_match('/^[a-z0-9]{5,}$/', $nom));
  var_dump($nom);
  var_dump($nom_ok);
}

$prenom_ok = false;
if (array_key_exists('prenom', $_POST)) {
  $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
  $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);

  $prenom_ok = (1 === preg_match('/^[a-z0-9]{5,}$/', $prenom));
  var_dump($prenom);
  var_dump($prenom_ok);
}

$pseudo_ok = false;
if (array_key_exists('pseudo', $_POST)) {
  $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_MAGIC_QUOTES);
  $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);

  $pseudo_ok = (1 === preg_match('/^[a-z0-9]{4,}$/', $pseudo));
  var_dump($pseudo);
  var_dump($pseudo_ok);
}

$email_ok = false;
if (array_key_exists('email', $_POST)) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_MAGIC_QUOTES);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);

  $email_ok = (1 === preg_match('/^[A-Za-z0-9%@&$!*?]{5,}$/', $email));
  var_dump($email);
  var_dump($email_ok);
}

$password_ok = false;
if (array_key_exists('password', $_POST)) {
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
  $password = filter_var($password, FILTER_SANITIZE_STRING);

  $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$!*?]{5,}$/', $password));
  var_dump($password);
  var_dump($password_ok);
}

if ($nom_ok &&$prenom_ok && $pseudo_ok && $email_ok && $password_ok) {

  header("Location: php_donnees_OK.php");
}
?>

  <div id="main"></div>



<form id="formulaire"  method="post" class="_inscription_form.php">
  <p><label for="prenom">Prénom </label> : <input type="text" name="prenom"
    value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>" /></p>

  <p><label for="nom">Nom</label> : <input type="text" name="name"
        <?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?> /></p>

  <p><label for="email">Email</label> : <input type="text" name="email"
        <?php echo array_key_exists('email', $_POST) ? $_POST['email'] : '' ?> /></p>

  <p><label for="pseudo">Pseudo</label> : <input type="text" name="name"
        <?php echo array_key_exists('pseudo', $_POST) ? $_POST['pseudo'] : '' ?> /></p>

  <p><label for="password">Password</label> : <input type="text" name="name" /></p>
  <p><input type="submit" value="S'inscrire" /> </p>

</form>

<?php
require_once 'view parts/_footer.php';
?>


