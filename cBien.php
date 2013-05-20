<?php
session_start();

include("includes/hautPage.php");

if(isset($_GET['action'])){
	$action=$_GET['action'];
}else{
	$action="initial";
}

switch ($action)
{
 
	case 'detail' :
		$id = $_GET['idBien'];
		$bien = getLesInfosDuBien($id);
		include("vues/biens/detailBien.php");
	break;

	case 'recherche' :
		$listeCommunes = getListeDesCommunes();
		include("vues/biens/rechercheBien.php");
	break;

	case 'resultatRecherche' :
		$ville=$_POST['commune'];
		$nbChambres=$_POST['nbchambres'];
		$prixMin=$_POST['prixmin'];
		$prixMax=$_POST['prixmax'];
		$resultat = rechercherBiens($ville,$nbChambres,$prixMin,$prixMax);	
		include("vues/biens/resultatRechercheBien.php");
	break;

	case 'initial':
		$listeBiens = getListeDesBiens();
		include("vues/biens/listeBiens.php");
	break;
 
}

include("includes/basPage.php");

?>