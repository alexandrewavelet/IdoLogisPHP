<h1>Modification de la photo du bien "<?php echo $bien['IntituleBien']; ?>"</h1>

<div class="pull-left">
	<p>Photo Actuelle :</p>
	<?php echo '<img src="../style/biens/'.$bien['photoBien'].'" />'; ?>
</div>

<h2>Nouvelle photo</h2>
<form action="cGestionBien.php?action=validerPhoto" method="POST" enctype="multipart/form-data">
	<table>
		<input type="hidden" name="idBien" id="idBien" <?php echo 'value="'.$id.'"'; ?> />
		<tr>
			<td><input required type="file" id="image" name="image" accept="image/*" /></td>
			<td><input type="submit" value="valider" /></td>
		</tr>
	</table>
</form>
