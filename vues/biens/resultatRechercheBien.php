<h1>Résultat de la recherche</h1>

<?php

	if (mysql_num_rows($resultat) == 0) {
		echo "<p>Il n'y a pas de résultats.</p>";
	}else{
		echo '<p>Il y a '.mysql_num_rows($resultat).' biens correspondants aux critères donnés.</p>';

		echo '<table>';
		echo '<tr>
			<th>Photo</th>
			<th>Nom</th>
			<th>Ville</th>
			<th>Détail</th>
		</tr>';

		while ($row = mysql_fetch_array($resultat)) {
			echo '<tr>
				<td><img src="style/biens/miniatures/'.$row['photoBien'].'" /></td>
				<td>'.$row['IntituleBien'].' </td> 
				<td>'.$row['NomCommune'].' </td>
				<td><a href="cBien.php?action=detail&idBien='.$row['IdBien'].'">Consulter</a></td> 
			</tr>';
		}

		echo '</table>';
	}

?>

