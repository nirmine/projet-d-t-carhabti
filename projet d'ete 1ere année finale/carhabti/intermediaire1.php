<?php
    session_start();
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
        'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $rep1=$db->prepare('UPDATE vehicule SET kilometrage=? , niveau_carburant=? WHERE numero_vehicule=?');
    $rep1->execute(array($_POST['kilometrageRetour'],$_POST['niveauCarburant'],$_SESSION['num']));
    if((!isset($_POST['nbrEraflure']))&&(!isset($_POST['placeEraflure']))&&(!isset($_POST['prixEraflure'])))
    {
        $pieces=explode("/",$_POST['placeEraflure']);
        if(count($pieces)==$_POST['nbrEraflure'])
        {
            for($i=0;$i<=($_POST['nbrEraflure']-1);$i++)
            {
                $rep2=$db->prepare('INSERT INTO reparation VALUES (?,?,?,?) ');
                $rep2->execute(array($_GET['num'],"reparation",$pieces[$i],"non_encore_traite"));
            }
        }
    }
    else
    {
        echo "Ilya des champs vides";
    }
    if((!isset($_POST['nbrBosse']))&&(!isset($_POST['placeBosse']))&&(!isset($_POST['prixBosse'])))
    {
        $pieces=explode("/",$_POST['placeBosse']);
        if(count($pieces)==$_POST['nbrBosse'])
        {
            for($i=0;$i<=($_POST['nbrBosse']-1);$i++)
            {
                $rep2=$db->prepare('INSERT INTO reparation VALUES (?,?,?,?) ');
                $rep2->execute(array($_GET['num'],"rechange",$pieces[$i],"non_encore_traite"));
            }
        }
    }
    else
    {
        echo "Ilya des champs vides";
    }
    if((!isset($_POST['nbrManque']))&&(!isset($_POST['placeManque']))&&(!isset($_POST['prixManque'])))
    {
        $pieces=explode("/",$_POST['placeManque']);
        if(count($pieces)==$_POST['nbrManque'])
        {
            for($i=0;$i<=($_POST['nbrManque']-1);$i++)
            {
                $rep2=$db->prepare('INSERT INTO reparation VALUES (?,?,?,?) ');
                $rep2->execute(array($_GET['num'],"manque",$pieces[$i],"non_encore_traite"));
            }
        }
    }
    else
    {
        echo "Ilya des champs vides";
    }

?>