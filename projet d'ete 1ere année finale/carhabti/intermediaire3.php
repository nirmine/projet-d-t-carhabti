
<?php
function validerReservation($numeroReservation)
/*convertir l'état d'une réservation
 de l'état validée vers l'état en cours de traitement càd la voiture est prise en charge
 */
{
    try
    {
    $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
    'root', '');
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }

    $requete = $db->prepare('UPDATE reservation SET etat_de_reservation=? WHERE numero_reservation=? ');
    $requete->execute(array('en cours',$numeroReservation));


}
?>
<?php
$numeroReservation=$_GET['numR'];
validerReservation($numeroReservation);
echo "
<script type=\"text/javascript\">
window.location.replace(\"contrat.php?num=$numeroReservation\");
</script>
";
?>