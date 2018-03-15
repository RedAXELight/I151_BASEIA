<?php
/**
 * Created by PhpStorm.
 * User: Alexandre.baseia
 * Date: 15.03.2018
 * Time: 08:04
 */


ob_start();

$titre = 'Rent A Snow - Ajouter un snow';

?>
    <div class="contentArea">
        <div class="divPanel notop page-content">
            <div class="row-fluid">

                <!-- ________________________ Contenu de la page ______________________________-->

                <div class="span12" id="divMain">
                    <h1>Ajout de snow</h1>
                    <?php if (isset($_POST['erreur'])) : ?>
                        <h5 class="text-error">Erreur de mot de passe</h5>
                    <?php endif ?>
                    <p>
                    <form class="form" method="POST" action="index.php?action=vue_ajouter">
                        <table class="table">
                            <tr>
                                <td>IDSurf :</td>
                                <td><input type="text" placeholder="Entrez le code de votre surf" name="fID"
                                           value="<?= @$_POST['fID']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Marque :</td>
                                <td>
                                    <?php if (isset($_POST['erreur'])) : ?>
                                        <input type="text" placeholder="Entrez la marque" class="inputError"
                                               name="fMarque" value="<?= @$_POST['fMarque']; ?>">
                                    <?php else : ?>
                                        <input type="text" placeholder="Entrez la marque" name="fMarque"
                                               value="<?= @$_POST['fMarque']; ?>">
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Boots :</td>
                                <td><input type="text" placeholder="Entrez les boots compatibles" name="fBoots"
                                           value="<?= @$_POST['fID']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Type :</td>
                                <td><input type="text" placeholder="Entrez le type de snow" name="fType"
                                           value="<?= @$_POST['fID']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Disponibilité :</td>
                                <td><input type="integer" placeholder="Entrez la disponibilité en magasin" name="fDispo"
                                           value="<?= @$_POST['fDispo']; ?>"></td>
                            </tr>

                            <tr>
                                <td><input class="btn" type="submit" value="Ajouter"/></td>
                                <td><input type="reset" class="btn" value="Effacer"/></td>
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