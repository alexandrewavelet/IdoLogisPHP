<h1>Création d'un bien</h1>

<form method='POST' action='cGestionBien.php?action=validerCreation' enctype="multipart/form-data">
	<table>
		<tr>
			<td>Intitule du bien</td>
			<td> <input type='text' required name='intitule' id='intitule' /> </td>
		</tr>
		<tr>
			<td>Nombres de chambres</td>
			<td> <input type='text' required name='nbchambre' id='nbchambre' /> </td>
		</tr>
		<tr>
			<td>Garage</td>
			<td> <input type='text' required name='garage' id='garage' /> </td>
		</tr>
		<tr>
			<td>Jardin</td>
			<td> <input type='text' required name='jardin' id='jardin' /> </td>
		</tr>
		<tr>
			<td>Prix du bien</td>
			<td> <input type='text' required name='prix' id='prix' /> </td>
		</tr>
		<tr>
			<td>Energie du bien</td>
			<td>
				<select required name="energie" id="energie" >
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
					<option value="F">F</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Photo : </td>
			<td><input type="file" id="photo" name="photo" accept="image/*" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<th colspan="2">Commune</th>
		</tr>
		<tr>
			<td><input type="radio" name="commune" value="existante" checked/>Commune Existante</td>
			<td>
				<select name='nomCommune' id='nomCommune'>
					<?php
						while ($row = mysql_fetch_row($listeCommunes)) {
							echo '<option value="'.$row[0].'">'.$row[2].' - '.$row[1].'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="radio" name="commune" value="creation"/>Créer une commune</td>
			<td>
				Nom : <input type='text' name='nomCommune' id='nomCommune' /><br>
				Code postal : <input type='text' name='codePostal' id='codePostal' /><br>
				Secteur : 
				<select name='nomSecteur' id='nomSecteur'>
					<?php
						while ($row = mysql_fetch_row($listeSecteurs)) {
							echo '<option value="'.$row[0].'">'.$row[1].'</option>';
						}
					?>
				</select>
			</td>
		</tr>
	</table>

	<input type="submit" id="submit" name="submit" value="enregistrer">
</form>