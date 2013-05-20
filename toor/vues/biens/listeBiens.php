<h1>Liste des biens</h1>

<?php
	if(isset($info)){
		echo '<p>'.$info.'</p>';
	}
?>

<h2>Coup de coeur</h2>

<table>
	<tr>
		<td><?php echo '<img src="../style/biens/miniatures/'.$coupDeCoeur['photoBien'].'" />'; ?></td>
		<td><?php echo $coupDeCoeur['IntituleBien'].' ('.$coupDeCoeur['CodePostalCommune'].' - '.$coupDeCoeur['NomCommune'].')'; ?></td>
	</tr>
</table>

<h2>Biens</h2>

<?php

if (mysql_num_rows($listeBiens)==0) {
	echo '<p> Il n\'y a pas de resultats.</p>';
}else{
?>
	<table>
		<tr>
			<th> Photo</th>
			<th> Intitulé </th>
			<th> Lieu </th>
			<th> Modifier </th>
			<th> Supprimer </th>
		</tr>

<?php
		while ($row=mysql_fetch_array($listeBiens)) {			
			echo '<tr>
				<td><img src="../style/biens/miniatures/'.$row['photoBien'].'" /></td>
				<td>'.$row['IntituleBien'].' </td> 
				<td>'.$row['NomCommune'].' </td>
				<td><a href="cGestionBien.php?action=formulaireModification&idBien='.$row['IdBien'].'">Modifier les infos</a><br/><a href="cGestionBien.php?action=formulairePhoto&idBien='.$row['IdBien'].'">Modifier la photo</a></td> 
				<td><a href="cGestionBien.php?action=supprimerBien&idBien='.$row['IdBien'].'">Supprimer</a><td>
				<td><a href="cGestionBien.php?action=mettreNouveauCoupDeCoeur&idBien='.$row['IdBien'].'">Coup De Coeur</a><td>
			</tr> ';
		}
	echo "</table>";
}
?>