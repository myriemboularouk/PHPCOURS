<?php


if(!empty($_POST)){// est-ce que le formulaire a été activé.

   if(empty($_POST['telephone'])){
      echo '<p style="background:green; color: white; padding: 5px">Veuillez renseigner un numero de telephone ! </p>';
   }

   else{ 
      if(strlen($_POST['telephone']) > 10) {
         echo '<p style="background:red; color: white; padding: 5px">Veuillez taper 10 chiffres au maximum ! </p>';
      }  
   }

if(empty($_POST['nom && prenom'])) {
      echo '<p style="background:green; color: white; padding: 5px">Veuillez renseigner un nom et un prenom ! </p>';
   }
   else{ 
      if(strlen($_POST['nom && prenom']) < 3){
         echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner ton nom et ton prenom ! </p>';
      }

   }
   
   
   echo '<pre>';
   print_r($_POST);
   echo '</pre>';
   
   foreach($_POST as $indice => $valeur){
      echo ucfirst($indice) . ':  <strong>' . $valeur . '</strong><br/>';
   }
   
   echo '<hr/>';
  
  echo 'telephone  : <strong> '. $_POST['telephone'] . '</strong><br/>';

   echo 'Adresse  : <strong> '. $_POST['adresse'] . '</strong><br/>';

   echo 'Date de Naissance  : <strong> '. $_POST['datenaissance'] . '</strong><br/>';

   echo 'Ville  : <strong> '. $_POST['ville'] . '</strong><br/>';
   echo 'Code Psotal   <strong>: '. $_POST['codepostal'] . '</strong><br/>';
   echo 'Sexe  : <strong> '. $_POST['sexe'] . '</strong><br/>';
   echo 'Description  : <strong> '. $_POST['description'] . '</strong><br/>';
  


}





?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
 <form method="post" action="">
   <label>Nom * </label><br/>
   <input type="text" name="nom" /><br/><br/>

   <label>Prenom *</label><br/>
   <input type="text" name="prenom" /><br/><br/>

   <label>Telephone * </label><br/>
   <input type="text" name="telephone" /><br/><br/>

   <label>Profession </label><br/>
   <input type="text" name="profession" /><br/><br/>

   <label>Ville</label><br/>
   <input type="text" name="ville" /><br/><br/>

   <label>Code Postal </label><br/>
   <input type="text" name="codepostal" /><br/><br/>

   <label for="adresse">adresse</label><br>
   <textarea id="adresse" rows="2" cols="20"></textarea><br>

   <label for="datenaissance">Date de Naissance</label><br>
   <input type="date" name="Date de Naissance"><br><br>

   <label for="sexe">Sexe</label><br>
   <input type="radio" name="sexe" value="homme" checked>Homme
   <input type="radio" name="sexe" value="femme">Femme <br><br>

   <label for="descriotion">description</label><br>
   <textarea id="Date de Naissance" rows="6" cols="20"></textarea><br>
   <input value="enregistrement" type="submit">

 </form>
</body>
</html>