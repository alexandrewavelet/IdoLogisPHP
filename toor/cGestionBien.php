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
 
	case 'formulaireCreation' :
		$listeCommunes = getListeDesCommunes();
		$listeSecteurs = getListeDesSecteurs();
		include("vues/biens/formulaireCreationBien.php");
	break;

	case 'formulaireModification' :
		$id = $_GET['idBien'];
		$bien = getLesInfosDuBien($id);
		$listeCommunes = getListeDesCommunes();
		$listeSecteurs = getListeDesSecteurs();
		include("vues/biens/formulaireModificationBien.php");
	break;

	case 'validerCreation' :
		$intituleBien=$_POST['intitule'];
		$nbChambresBien=$_POST['nbchambre'];
		$garageBien=$_POST['garage'];
		$jardinBien=$_POST['jardin'];
		$prixBien=$_POST['prix'];
		$energieBien=$_POST['energie'];
		$communeBien=$_POST['commune'];
		if (isset($_FILES['photo'])) {
			$image = $_FILES['photo'];
			$infoImage = enregistrerImage($image);
		}else{
			$infoImage[0] = true;
			$infoImage[1] = "defaut.jpg";
		}

		if ($communeBien == "creation") {
			$nomCommune=$_POST['nomCommune'];
			$codePostal=$_POST['codePostal'];
			$secteur=$_POST['nomSecteur'];
			$idCommune = creerCommune($nomCommune,$codePostal,$secteur);
		}else{
			$idCommune = $_POST['nomCommune'];
		}
		
		if ($infoImage[0]) {
			$info = creerBien($intituleBien,$nbChambresBien,$garageBien,$jardinBien,$prixBien,$energieBien,$idCommune,$infoImage[1]);
		}else{
			$info = $infoImage[1];
		}

		$listeBiens = getListeDesBiens();
		$coupDeCoeur = getCoupDeCoeur();
		include("vues/biens/listeBiens.php");
	break;

	case 'validerModification' :
		$id = $_POST['idBien'];
		$intituleBien=$_POST['intitule'];
		$nbChambresBien=$_POST['nbchambre'];
		$garageBien=$_POST['garage'];
		$jardinBien=$_POST['jardin'];
		$prixBien=$_POST['prix'];
		$energieBien=$_POST['energie'];
		$communeBien=$_POST['commune'];

		if ($communeBien == "creation") {
			$nomCommune=$_POST['nomCommune'];
			$codePostal=$_POST['codePostal'];
			$secteur=$_POST['nomSecteur'];
			$idCommune = creerCommune($nomCommune,$codePostal,$secteur);
		}else{
			$idCommune = $_POST['nomCommune'];
		}

		$info = modifierLeBien($id, $intituleBien, $nbChambresBien, $garageBien, $jardinBien, $prixBien, $energieBien, $idCommune);

		$listeBiens = getListeDesBiens();
		$coupDeCoeur = getCoupDeCoeur();
		include("vues/biens/listeBiens.php");
	break;

	case 'validerPhoto' :
		$image = $_FILES['image'];
		$id = $_POST['idBien'];
		$info = modifierPhotoDuBien($id,$image);

		$listeBiens = getListeDesBiens();
		$coupDeCoeur = getCoupDeCoeur();
		include("vues/biens/listeBiens.php");
	break;

	case 'formulairePhoto' :
		$id = $_GET['idBien'];
		$bien = getLesInfosDuBien($id);		
		include("vues/biens/formulairePhotoBien.php");
	break;

	case 'supprimerBien' :
		$id = $_GET['idBien'];
		$info = supprimerBien($id);

		$listeBiens = getListeDesBiens();
		$coupDeCoeur = getCoupDeCoeur();
		include("vues/biens/listeBiens.php");
	break;

	case 'mettreNouveauCoupDeCoeur' :
		$id = $_GET['idBien'];
		$info = setCoupDeCoeur($id);

		$listeBiens = getListeDesBiens();
		$coupDeCoeur = getCoupDeCoeur();
		include("vues/biens/listeBiens.php");
	break;

	case 'initial':
		$listeBiens = getListeDesBiens();
		$coupDeCoeur = getCoupDeCoeur();
		include("vues/biens/listeBiens.php");
	break;
 
}

include("includes/basPage.php");

?>