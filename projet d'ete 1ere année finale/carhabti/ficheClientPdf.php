<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
 require("fpdf/fpdf.php");
 $numeroClient=$_GET['num_c'];//passé par url
 $requete = $db->prepare('SELECT * FROM client  WHERE numero_client=? ');
 $requete->execute(array($numeroClient));
while ($client=$requete->fetch()) {
    $nom=$client['nom'];
    $prenom=$client['prenom'];
    $cin=$client['cin'];
    $sexe=$client['sexe'];
    $tel=$client['tel'];
    
    $adresse=$client['adresse'];
    $mail=$client['mail'];
    $num_permis=$client['numero_permis'];

    $pdf=new FPDF();
    $pdf->AddPage();
    
    $pdf->Rect(5,5,200,400,"D");
    $pdf->SetFont("Arial", "B",25);
    //$pdf->SetTextColor(0, 180, 216);
    $pdf->SetXY(10,20);
    $pdf->Cell(200, 70, "Fiche Client ",0,0,"C");
    $pdf->SetFont("Arial", "B", 25);
    $pdf->SetTextColor(0, 180, 216);
    $image1 = "img\logoAgence.png";
$pdf->Cell(100, 60,$pdf->Image($image1,10,15,50.78),0,0,'L',true);
  //  $pdf->Cell(100, 60, "CARHABTI",0,1,"R");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetTextColor(0, 0,0);
    $pdf->SetXY(15, 85);
    $pdf->Cell(0,10,"Nom du Client :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $nom,0,1,"C");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetTextColor(0, 0,0);
    $pdf->SetX(15);
    $pdf->Cell(0, 10,"Prenom :" ,0,1,"L");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont("Arial", "", 14);
    $pdf->Cell(0, 10, $prenom,0,1,"C");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetTextColor(0, 0,0);
    $pdf->SetX(15);
    $pdf->Cell(0, 10,"NCIN du Client :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $cin,0,1,"C");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetTextColor(0, 0,0);
    $pdf->SetX(15);
    $pdf->Cell(0, 10,"Sexe :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $sexe,0,1,"C");
    $pdf->SetFont("Arial", "B", 14);
        $pdf->SetTextColor(0, 0,0);
        $pdf->SetX(15);
    $pdf->Cell(0, 10,"Numero de Telephone :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $tel,0,1,"C");

    $pdf->SetTextColor(0, 0,0);
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetX(15);
    $pdf->Cell(0, 10,"Adresse :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $adresse,0,1,"C");
    $pdf->SetTextColor(0, 0,0);
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetX(15);
    $pdf->Cell(0, 10,"Adresse Mail :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $mail,0,1,"C");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetTextColor(0, 0,0);
    $pdf->SetX(15);

    $pdf->Cell(0, 10,"Numero De Permis :" ,0,1,"L");
    $pdf->SetFont("Arial", "", 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, $num_permis,0,1,"C");
    $requete1= $db->prepare('SELECT * FROM liste_noire  WHERE numero_client=? ');
    $requete1->execute(array($numeroClient));
    $reponse1 = $requete1->fetch();
    if (!empty($reponse1)) {
        $pdf->SetTextColor(0, 180, 216);
        $pdf->SetFont("Arial", "B", 16);
        $pdf->SetX(15);
        $pdf->Cell(0, 10, "Ce Client est dans la liste noire :", 0, 1, "L");
        $pdf->SetFont("Arial", "B", 14);
        $pdf->SetTextColor(0, 180, 216);
        $pdf->Cell(0, 10, "Cause", 0, 1, "C");
  
        $pdf->SetFont("Arial", "", 14);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, $reponse1['cause'], 0, 1, "C");
    }
  
    $pdf->Output();
}
?>