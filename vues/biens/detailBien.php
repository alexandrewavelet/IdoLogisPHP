<h1>Bien n°<?php echo $bien['IdBien']; ?></h1>
	<div class="pull-left"><?php echo '<img src="style/biens/'.$bien['photoBien'].'" />'; ?></div>
		<table>
			<tr>
				<td>Intitulé : </td>
				<td><?php echo $bien['IntituleBien']; ?></td>
			</tr>

			<tr>
				<td>Nombres de chambres : </td>
				<td><?php echo $bien['NbChambresBien']; ?></td>
			</tr>

			<tr>
				<td>Garage : </td>
				<td><?php echo $bien['GarageBien']; ?></td>
			</tr>

			<tr>
				<td>Jardin : </td>
				<td><?php echo $bien['JardinBien']; ?></td>
			</tr>

			<tr>
				<td>Prix : </td>
				<td><?php echo $bien['PrixBien']; ?> Euros</td>
			</tr>

			<tr>
				<td>Classe Energétique : </td>
				<td><?php echo $bien['EnergieBien']; ?></td>
			</tr>

			<tr>
				<td>Commune : </td>
				<td><?php echo $bien['NomCommune']; ?></td>
			</tr>
</table>
<table>
	<tr>
		<th colspan="2">Commercial à joindre</th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $bien['PrenomCommercial'].' '.strtoupper($bien['NomCommercial']); ?></td>
	</tr>
	<tr>
		<td>Téléphone : </td>
		<td><?php echo $bien['TelCommercial']; ?></td>
	</tr>
	<tr>
		<td>Email : </td>
		<td><?php echo $bien['MailCommercial']; ?></td>
	</tr>
</table>