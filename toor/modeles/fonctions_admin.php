<?php

function getListeDesBiens(){
	$req = 'SELECT * FROM Bien, Commune WHERE Bien.CommuneBien=Commune.idCommune';
	$res = mysql_query($req);
	return $res;
}

function getLesInfosDuBien($id){
	$req = 'SELECT * FROM Bien, Commune, Secteur, Commercial WHERE Bien.CommuneBien = Commune.IdCommune AND Commune.SecteurCommune = Secteur.idSecteur AND Secteur.idSecteur = Commercial.SecteurCommercial AND IdBien = '.$id;
	$res = mysql_query($req);
	$bien = mysql_fetch_array($res);
	return $bien;
}

function getListeDesCommunes(){
	$req = 'SELECT * FROM Commune';
	$res = mysql_query($req);
	return $res;
}

function getCoupDeCoeur(){
	$req = 'SELECT * FROM Bien, coupdecoeur, commune WHERE coupdecoeur.IdBienCoupDeCoeur = Bien.idBien AND commune.idCommune = Bien.CommuneBien';
	$cdc = mysql_query($req);
	$coupDeCoeur = mysql_fetch_array($cdc);
	return $coupDeCoeur;
}

function setCoupDeCoeur($idBien){
	$req = 'UPDATE coupdecoeur SET IdBienCoupDeCoeur = '.$idBien; 
	$res = mysql_query($req);
	$info = 'Le coup de coeur a été modifié.';
	return $info;
}

function supprimerBien($idBien){
	$req='DELETE FROM Bien WHERE IdBien = '.$idBien;
	$res=mysql_query($req);
	$info='Le bien a été supprimé.';
	return $info;
}

function getListeDesSecteurs(){
	$req='SELECT * FROM secteur ORDER BY NomSecteur';
	$res = mysql_query($req);
	return $res;
}

function creerImage($image,$nomImage,$largeur,$dossier){
	$imageRedimensionnee = imagecreatefromjpeg($image['tmp_name']);
	$tailleImage = getimagesize($image['tmp_name']);
	$reduction = ($largeur * 100)/$tailleImage[0];
	$hauteur = (($tailleImage[1] * $reduction)/100);
	$imageFinale = imagecreatetruecolor($largeur , $hauteur) or die ("Erreur");
	imagecopyresampled($imageFinale , $imageRedimensionnee, 0, 0, 0, 0, $largeur, $hauteur, $tailleImage[0],$tailleImage[1]);
	imagejpeg($imageFinale , $dossier.$nomImage, 100);
}

function enregistrerImage($image){
	if($image['error'] = 0){
		$info[0] = false;
		$info[1] = "Erreur lors du transfert de l'image";
	}else{
		$extensions_valides = array('jpg','jpeg');
		$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
		if(in_array($extension_upload,$extensions_valides)){
			$nomImage = md5(uniqid(rand(), true));
			$nomImage = $nomImage.".".$extension_upload;
			$tailleImage = getimagesize($image['tmp_name']);
			$largeur = $tailleImage[0];
			creerImage($image,$nomImage,300,"../style/biens/");
			creerImage($image,$nomImage,100,"../style/biens/miniatures/");
			$info[0] = true;
			$info[1] = $nomImage;
		}else{
			$info[0] = false;
			$info[1] = "Le fichier uploadé n'est pas une image jpeg.";
		}
	}
	return $info;
}

function modifierPhotoDuBien($idBien,$image){
	if($image['error'] = 0){
		$info = "Erreur lors du transfert de l'image";
	}else{
		$extensions_valides = array('jpg','jpeg');
		$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
		if(in_array($extension_upload,$extensions_valides)){
			$req = 'SELECT photoBien FROM bien WHERE IdBien = '.$idBien;
		 	$res = mysql_query($req);
		 	$nomImage = mysql_fetch_row($res)[0];
		 	if($nomImage = "defaut.jpg") {
		 		$nomImage = md5(uniqid(rand(), true));
	 			$nomImage = $nomImage.".".$extension_upload;
	 			$req = 'UPDATE bien SET photoBien = "'.$nomImage.'" WHERE IdBien = '.$idBien;
	 			$res = mysql_query($req);
		 	}
			$tailleImage = getimagesize($image['tmp_name']);
			$largeur = $tailleImage[0];
			creerImage($image,$nomImage,300,"../style/biens/");
			creerImage($image,$nomImage,100,"../style/biens/miniatures/");
			$info = "L'image a bien été modifiée.";
		}else{
			$info = "Le fichier uploadé n'est pas une image jpeg.";
		}
	}
	return $info;
}

function creerCommune($nom,$codePostal,$secteur){
	$req='INSERT INTO Commune VALUES (0,"'.$codePostal.'","'.$nom.'",'.$secteur.')';
	$res = mysql_query($req);
	$idCommune = mysql_insert_id();
	return $idCommune;
}

function creerBien($intituleBien,$nbChambresBien,$garageBien,$jardinBien,$prixBien,$energieBien,$idCommune,$nomImage){
	$req='INSERT INTO Bien VALUES (0,"'.$intituleBien.'",'.$nbChambresBien.',"'.$garageBien.'","'.$jardinBien.'",'.$prixBien.',"'.$energieBien.'","'.$nomImage.'",'.$idCommune.')';
	$res = mysql_query($req);
	$idBien = mysql_insert_id();
	$info = 'Le bien n°'.$idBien.', "'.$intituleBien.'" a été créé.</p>';
	return $info;
}

function modifierLeBien($idBien, $intituleBien, $nbChambresBien, $garageBien, $jardinBien, $prixBien, $energieBien, $idCommune){
	$req = 'UPDATE Bien SET IntituleBien = "'.$intituleBien.'", NbChambresBien = '.$nbChambresBien.', GarageBien = "'.$garageBien.'", JardinBien = "'.$jardinBien.'", PrixBien = '.$prixBien.', EnergieBien = "'.$energieBien.'", CommuneBien = '.$idCommune.' WHERE idBien = '.$idBien;
	$res = mysql_query($req);
	$info = 'Le bien intitulé "'.$intituleBien.'" a été modifié.';
	return $info;
}

?>