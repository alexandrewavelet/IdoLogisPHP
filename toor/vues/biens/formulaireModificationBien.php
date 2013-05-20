<h1>Modifier un bien</h1>

<form method='POST' action='listeBiens.php?action=modifierBien'>
	<input type='hidden' name='idBien' id='idBien' <?php echo 'value="'.$id.'"'; ?> >
	<table>
		<tr>
			<td>Intitule du bien</td>
			<td> <input type='text' required name='intitule' id='intitule' <?php echo 'value="'.$bien['IntituleBien'].'"';?>/> </td>
		</tr>

		<tr>
			<td>Nombres de chambres</td>
			<td> <input type='text' required name='nbchambre' id='nbchambre' <?php echo 'value="'.$bien['NbChambresBien'].'"';?>/> </td>
		</tr>

		<tr>
			<td>Garage</td>
			<td> <input type='text' required name='garage' id='garage' <?php echo 'value="'.$bien['GarageBien'].'"';?>/> </td>
		</tr>
		<tr>
			<td>Jardin</td>
			<td> <input type='text' required name='jardin' id='jardin' <?php echo 'value="'.$bien['JardinBien'].'"';?>/> </td>
		</tr>

		<tr>
			<td>Prix du bien</td>
			<td> <input type='text' required name='prix' id='prix' <?php echo 'value="'.$bien['PrixBien'].'"';?>/> </td>
		</tr>

		<tr>
			<td>Energie du bien</td>
			<td>
				<select required name="energie" id="energie" >
					<?php
						if ($bien['EnergieBien'] == "A") {
							echo '<option value="A" selected>A</option>';
						}else{
							echo '<option value="A">A</option>';
						}
						if ($bien['EnergieBien'] == "B") {
							echo '<option value="B" selected>B</option>';
						}else{
							echo '<option value="B">B</option>';
						}
						if ($bien['EnergieBien'] == "C") {
							echo '<option value="C" selected>C</option>';
						}else{
							echo '<option value="C">C</option>';
						}
						if ($bien['EnergieBien'] == "D") {
							echo '<option value="D" selected>D</option>';
						}else{
							echo '<option value="D">D</option>';
						}
						if ($bien['EnergieBien'] == "E") {
							echo '<option value="E" selected>E</option>';
						}else{
							echo '<option value="E">E</option>';
						}
						if ($bien['EnergieBien'] == "F") {
							echo '<option value="F" selected>F</option>';
						}else{
							echo '<option value="F">F</option>';
						}
					?>
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr><th colspan="2">Commune</th></tr>
		<tr>
			<td><input type="radio" name="commune" value="existante" checked/>Commune Existante</td>
			<td>
				<select name='nomCommune' id='nomCommune'>
					<?php
						while ($row = mysql_fetch_row($listeCommunes)) {
							if ($row[0] == $bien['CommuneBien']) {
								echo '<option value="'.$row[0].'" selected>'.$row[2].' - '.$row[1].'</option>';
							}else{
								echo '<option value="'.$row[0].'">'.$row[2].' - '.$row[1].'</option>';
							}
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