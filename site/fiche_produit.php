<?php

require_once('inc/init.inc.php');




// 1 : On va verifie qu'il ya bien un id dans l'URL (no vide, numeric).
// 2 : on recupare les infos du produit 
// 3 : on va verifier que l'id correspond bien à un produit existant sinon redirection vers boutique
// 4 : on va afficher le infos du produit 
// 5 : on gere le nombre de produit 
// 6 : on va faire le traitement pour ajouter le produit au panier 
// 7 : suggestion d'autre produits.

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) ){

   $resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
   $resultat -> bindParam(':id_produit', $_GET['id'], PDO::PARAM_INT);
   $resultat -> execute();

   if($resultat -> rowCount() > 0){// le produit existe bien !
   	$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
   	extract($produit);
   	debug($produit);

   }
    else{// le produit n'exsiste pas :REDIRECTION !
        header('location:boutique.php');

    }

}
else{
	header('location:boutique.php');
}
if(!empty($_POST)){
	ajouterProduit($id_produit, $_POST['quantite'], $photo, $titre, $prix); // Id, quantite, prix, titre,
	// Fonction codée dans le fichier fonction.php
}



$page = 'Boutique';
require_once('inc/header.inc.php');
?>
<h1>Titre Du produit</h1>

<img src="<?= RACINE_SITE ?>photo/" width="250" />
<p>Détails du produit : </p>
<ul>
	<li>Référence : <b><?= $reference ?></b></li>
	<li>Catégorie : <b><?= $categorie ?></b></li>
	<li>Couleur : <b><?= $couleur ?></b></li>
	<li>Taille : <b><?= $taille ?></b></li>
	<li>Public : <b><?= $public ?></b></li>
	<li>Prix : <b style="color: red; font-size:20px"><?= $prix ?>€ TTC</b></li>
</ul>
<br/>
<p>Description du produit : <br/>
<em><?= $description ?></em></p>	

<fieldset>
	<legend>Acheter ce produit :</legend>

    <?php if ($stock > 0) : ?>
	<form method="post" action="">
		<label>Quantité :</label
		<select name="quantite">
			<?php for($i=1; $i <= 5 && $i <= $stock; $i++) : ?>
			<option><?= $i ?></option>
			<?php endfor; ?>
		</select>
		<input type="submit" value="Ajouter au panier" />
	</form>
    <?php else: ?>
	<i style="color: red">Rupture de stock!</i>
<?php endif; ?>

</fieldset>


<div class="profil" style="overflow:hidden;">
	<h2>Suggestions de produits</h2>
	
	<!-- Dans le PHP faire une requête qui va récupérer des produits (limités à 5): 
		Soit des produits de la même catégorie (sauf celui qu'on est en train de visiter)
		
		Soit les produits des autres catégories
	-->

	
	
</div>



<?php
require_once('inc/footer.inc.php');
?>