<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Inscription';
require_once 'view parts/_page_base.php';


?>

<h3><?= $site_data[PAGE_ID] ?></h3>


<div id="main">
<form action="#" method="post" class="contact-form">
        <p><label for="prenom">Prénom</label> : <input type="text" name="name" /></p>
        <p><label for="nom">Nom</label> : <input type="text" name="name" /></p>		
        <p><label for="courriel">Courriel</label> : <input type="text" name="email" /></p>
	    <p><label for="pseudo">Pseudo</label> : <input type="text" name="name" /></p>
        <p><label for="mot de passe">Mot de passe</label> : <input type="text" name="name"  />	</p>		
        <p><input type="submit" value="S'inscrire" /> </p>

</form>
</div>
<?php require_once 'view parts/_page_bottom.php'; ?>


