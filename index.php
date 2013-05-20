<?php include("includes/hautPage.php"); 

$req='select * from Bien, coupdecoeur, commune where coupdecoeur.IdBienCoupDeCoeur=Bien.idBien and commune.idCommune=Bien.CommuneBien';
$cdc=mysql_query($req);
$bien = mysql_fetch_array($cdc);

?>

<h1>Index</h1>
<h2>Coup de coeur</h2>
	<div class="pull-left"><?php echo '<img src="style/biens/'.$bien['photoBien'].'" />'; ?></div>
		<table>

			<tr>
				<td>Intitule du bien : </td>
				<td><?php echo $bien['IntituleBien']; ?></td>
			</tr>

			<tr>
				<td>Nombres de chambres : </td>
				<td><?php echo $bien['NbChambresBien']; ?></td>
			</tr>

			<tr>
				<td>Prix du bien : </td>
				<td><?php echo $bien['PrixBien']; ?></td>
			</tr>

			<tr>
				<td>Commune du bien : </td>
				<td><?php echo $bien['NomCommune']; ?></td>
			</tr>

			<tr>
				<td></td>
				<td><?php echo '<a href="cBien.php?action=detail&idBien='.$bien['IdBien'].'">Détail</a>'; ?></td>
			</tr>
</table>

<?php include("includes/basPage.php"); ?>