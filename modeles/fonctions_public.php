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

function rechercherBiens($commune,$nbChambres,$prixMin,$prixMax){
	if($commune != ""){
		$commune = "AND CommuneBien = ".$commune;
	}
	if(!empty($prixMax)){
		$prixMax = "AND PrixBien < ".$prixMax;
	}
	if(empty($prixMin)){
		$prixMin = 0;
	}
	$req = 'SELECT * FROM commune, bien WHERE bien.communeBien=commune.idCommune '.$commune.' AND NbChambresBien'.$nbChambres.' AND PrixBien > '.$prixMin.' '.$prixMax;
	$res = mysql_query($req);
	return $res;
}

?>