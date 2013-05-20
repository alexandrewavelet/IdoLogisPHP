<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Idologis - Administration</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="dc.keywords" content=""/>
		<meta name="rating" content="general" />
		<meta name="robots" content="all"/>
		<meta name="author" content="Alexandre wavelet"/>
		<meta name="revisit-after" content="7 days"/>
		<link rel="stylesheet" media="screen" href="bootstrap/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" media="screen" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" media="screen" href="style/design.css">

		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<?php include("modeles/connexion_BDD.php"); include("modeles/fonctions_admin.php"); ?>
	<body>
		<div id="entete" >
			<img src="../style/images/logo_accueil.jpg">
			<p>1 Place de la République  59300 Valenciennes <br> Tel :03 27 00 00 00  Fax : 03 27 00 00 01</p>
		</div>

		<div id="menu">
			<a href="index.php">Accueil</a> 
			<a href="cGestionBien.php?action=formulaireCreation">Ajout d'un bien</a> 
			<a href="cGestionBien.php">Liste des biens</a> 
			<a href="../index.php">Retour au site</a>
		</div>
		
		<div id="corp">