<?php
/**
 * Created by PhpStorm.
 * User: Alexandre.baseia
 * Date: 21.03.2018
 * Time: 15:26
 */


ob_start();

$titre = 'Rent A Snow - Modifier snow';

?>

    <div class="contentArea">
        <div class="divPanel notop page-content">
            <div class="row-fluid">

                <!-- ________________________ Contenu de la page ______________________________-->

                <div class="span12" id="divMain">


                    <table>
                        <?php foreach ($resultats as $resultat) : ?><!--Ici on utilise la variable $resultats retournée dans la fonction GetSnow, cela permet de faire sortir les elements obtenus avec la requete afin de les utiliser ici-->
                            <!--Variables pour récuperer le contenu du foreach-->
                            <?php
                            //Les différents elements sont donc "etalés" ici et attribués à un nom qui permet d'afficher dans les champs du formulaire le contenus du surf choisi
                            $Id = $resultat['idsurf'];
                            $Marque = $resultat['marque'];
                            $Boots = $resultat['boots'];
                            $Type = $resultat['type'];
                            $Dispo = $resultat['disponibilite'];
                            ?>


                        <?php endforeach; ?>
                    </table>


                    <h1>Modifier le snow <?= @$_GET['id'] ?></h1>
                    <?php if (isset($_POST['erreur'])) : ?>
                        <h5 class="text-error">Erreur champs</h5>
                    <?php endif ?>
                    <p>
                    <form class="form" method="POST" action="index.php?action=updSnow">
                        <table class="table">

                            <input type="text" placeholder="Entrez la marque" name="fId" class="hidden"
                                   value="<?= $Id; ?>">


                            <tr>
                                <td>Marque :</td>
                                <td>
                                    <input type="text" placeholder="Entrez la marque" name="fMarque"
                                           value="<?= $Marque; ?>">

                                </td>
                            </tr>
                            <tr>
                                <td>Boots :</td>
                                <td><input type="text" placeholder="Entrez les boots compatibles" name="fBoots"
                                           value="<?= $Boots; ?>"></td>
                            </tr>
                            <tr>
                                <td>Type :</td>
                                <td><input type="text" placeholder="Entrez le type de snow" name="fType"
                                           value="<?= $Type; ?>"></td>
                            </tr>
                            <tr>
                                <td>Disponibilité :</td>
                                <td><input type="integer" placeholder="Entrez la disponibilité en magasin" name="fDispo"
                                           value="<?= $Dispo; ?>"></td>
                            </tr>

                            <tr>
                                <td><input class="btn" type="submit" value="Ajouter"/></td>
                            </tr>
                        </table>
                    </form>
                    </p>
                </div>
            </div>
            <div id="footerOuterSeparator"></div>
        </div>
    </div>


<?php
$contenu = ob_get_clean();
require "gabarit.php";
