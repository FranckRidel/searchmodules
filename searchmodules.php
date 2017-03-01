<!DOCTYPE html>
<html>
<head>
	<title>Recherche de modules PHP</title>
	<meta charset="utf8" />
</head>
<body>

<h1>Recherche de modules PHP</h1>

<p>Tapez le nom entier ou partiel du module à rechercher<br />La liste des fonctionnalités qu'ils contiennent d'afficheront<br />Laissez le champs vide pour afficher la totalité des modules installés</p>

<form action="#" method="post">
	<label>Module à afficher <br /></label><input type="text" name="recherche" placeholder="Nom du module" />
	<input type="submit" value="Rechercher" />
</form>
<br />

<?php

if (isset($_POST['recherche'])){
	$modules = get_loaded_extensions();
	natcasesort($modules);

	foreach ($modules as $cle => $valeur){
		if(preg_match('#'.$_POST['recherche'].'#i', $valeur)){
				echo '<strong>' . strtoupper($valeur) . '</strong> : <br />';

				$functions = get_extension_funcs($valeur);
				natcasesort($functions);
				foreach ($functions as $cle => $valeur){
					echo $valeur . "<br />";
				}

				echo "<hr><br />";
		}
	}
}
?>


</body>
</html>
