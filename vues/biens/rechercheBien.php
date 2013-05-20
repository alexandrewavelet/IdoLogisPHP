<h1>Recherche de biens</h1>

<form method="POST" action="cBien.php?action=resultatRecherche">
	<table>
		<tr>
			<td>Ville</td>
			<td>
				<select name='commune' id='commune'>
					<option value="">Toutes</option>
					<?php
						while ($row = mysql_fetch_row($listeCommunes)) {
							echo '<option value="'.$row[0].'">'.$row[2].' - '.$row[1].'</option>';
						}
					?>
				</select>
 			</td>
		</tr>
		<tr>
			<td>Nombre de chambres </td>
			<td>
				<select name="nbchambres" id="nbchambres" >
					<option value="> 0">Tous</option>
					<option value="= 1">1</option>
					<option value="= 2">2</option>
					<option value="= 3">3</option>
					<option value="= 4">4</option>
					<option value="> 4">5 ou plus</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Prix </td>
			<td>entre <input type="text" id="prixmin" name="prixmin"/> et <input type="text" id="prixmax" name="prixmax"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="submit" name="submit" value="envoyer" class="btn btn-danger"/></td>
		</tr>
	</table>
</form>