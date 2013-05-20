<h1>Liste des biens</h1>

<?php 
	if (mysql_num_rows($listeBiens)==0) {
		echo '<p> Il n\'y a pas de resultats.</p>';
	}else{
?>	
		<table>
			<tr><th> Photo </th>
				<th> Intitulé </th>
				<th> Lieu </th>
				<th> Détail </th>
			</tr>
<?php
		while ($row=mysql_fetch_array($listeBiens)) {	
			echo '<tr>
				<td><img src="style/biens/miniatures/'.$row['photoBien'].'" /></td>
				<td>'.$row['IntituleBien'].' </td> 
				<td>'.$row['NomCommune'].' </td>
				<td><a href="cBien.php?action=detail&idBien='.$row['IdBien'].'">Consulter</a></td> 
			</tr> ';

		}
		echo "</table>";
	}
?>