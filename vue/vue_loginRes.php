<?php
/**
 * Created by PhpStorm.
 * User: Alexandre.BASEIA
 * Date: 28.02.2018
 * Time: 15:51
 */

ob_start();
$titre = "login";
if (isset($_SESSION)){
    session_destroy();
}
$resultatsF = getLogin($_POST['fLogin'], $_POST['fPass']);
?>

<!-- ________________________ Contenu de la page ______________________________-->




    <table class="table textcolor">
        <tr>
            <?php
            // Affichage des entêtes du tableau (-1 pour enlever le champ statut)

            for ($i=0; $i<$resultatsF->columnCount(); $i++)
            {
                $entete = $resultatsF->getColumnMeta($i);
                echo "<th>" . $entete['name'] . "</th>";
            }
            ?>
        </tr>
        <?php foreach ($resultatsF as $resultat) :?>
            <!-- Affichage des résultats de la BD -->
            <tr>
                <td><?=$resultat['login'];?></td>
                <td><?=$resultat['passwd'];?></td>
            </tr>
        <?php endforeach;?>
    </table>

    <hr/>





<!--____________________________________________________________________________-->


        <!--End Main Content-->
        <div id="footerInnerSeparator"></div>


    <div id="footerOuterSeparator"></div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
