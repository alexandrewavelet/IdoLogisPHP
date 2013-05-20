<?php 
include("includes/hautPage.php");
if(isset($_POST['submit'])){
	echo "<h1>Contact</h1>";
	$email=$_POST['email'];
	$objet=$_POST['objet'];
	$commentaire=$_POST['commentaire'];


	if(empty($commentaire)){
		echo "Veuillez indiquer un message.";	
	}
	else{
		if(!empty($email)){
			$commentaire=$commentaire."\r\nEn attente d'une réponse le client a laissé son adresse email".$email."";
			$commentaire = wordwrap($commentaire, 70, "\r\n");
		}
    	$mailEnvoye = mail('helal.nour@hotmail.fr', $objet, $commentaire);
 		if ($mailEnvoye) {
 			echo "<p>Votre email a bien été envoyé, merci de nous avoir contacté.</p>";
 		}else{
 			echo "<p>Il y a eu une erreur pendant l'envoi du mail, veuillez réessayer.</p>";
 		}	
	}
	
}else{
?>	
<h1>Contact</h1>
<p>Une question, suggestion, ou un problème? Utilisez le formulaire ci-dessous pour contacter l'administrateur du site. Indiquez-y votre mail si votre message nécessite une réponse.</p>
<form method="POST" action="contact.php">
	<table class="formulaire">
		<tr>
			<td><label for="email">email</label></td>
			<td><input type="email" id="email" name="email"/></td>
		</tr>
		<tr>
			<td><label for="objet">objet</label></td>
			<td><input required type="text" required id="objet" name="objet"/></td>
		</tr>
		<tr>
			<td valign="top"><label for="commentaire">commentaire</label></td>
			<td><textarea required id="commentaire" name="commentaire"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" id="submit" name="submit" value="Envoyer"/></center></td>
		</tr>
	</table>
</form>
<?php 
}
include("includes/basPage.php");
?>