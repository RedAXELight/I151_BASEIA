<?php
/**
 * Created by PhpStorm.
 * User: Alexandre.BASEIA
 * Date: 28.02.2018
 * Time: 15:51
 */
$titre = "login";
if (isset($_SESSION)){
    session_destroy();
}
?>

<!-- ________________________ Contenu de la page ______________________________-->




    <table class="table textcolor">
        <tr>
            <?php
            // Affichage des entêtes du tableau (-1 pour enlever le champ statut)

            for ($i=0; $i<$resultats->columnCount(); $i++)
            {
                $entete = $resultats->getColumnMeta($i);
                echo "<th>" . $entete['name'] . "</th>";
            }
            ?>
        </tr>
        <?php foreach ($resultats as $resultat) :?>
            <!-- Affichage des résultats de la BD -->
            <tr>
                <td><?=$resultat['login'];?></td>
                <td><?=$resultat['passwd'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
    </header>
    </article>
    <hr/>





<!--____________________________________________________________________________-->

          <div class="span12" id="divMain">
            <h1>Login</h1>
            <?php if (isset($_GET['erreur'])) : ?>
              <h5 class="text-error">Erreur de mot de passe</h5>
            <?php endif ?>
		        <p>
            <form class="form" method="POST" action="..\controleur\controleur.php">
              <table class="table">
                <tr>
                  <td>Login : </td><td><input type="text" placeholder="Entrez votre login" name="fLogin" value="<?= @$_POST['fLogin']; // pour éviter à l'utilisateur de retaper son login ?>"><td>
                </tr>
                <tr>
                  <td>Password : </td>
                  <td>
                      <?php if (isset($_GET['erreur'])) : ?>
                      <div class="control-group error"><div class="controls">
                        <input type="password" placeholder="Entrez le bon password" class="inputError" name="fPass" value="<?= @$_POST['fPass']; // pour éviter à l'utilisateur de retaper son mdp ?>">
                      <?php else : ?>
                      <div class="control-group"><div class="controls">
                        <input type="password" placeholder="Entrez votre password" name="fPass" value="<?= @$_POST['fPass']; // pour éviter à l'utilisateur de retaper son mdp ?>">
                      <?php endif ?>

                    </div></div>
                  </td>
                </tr>
                <tr>
                  <td><input class="btn" type="submit" value="login" /></td><td><input type="reset" class="btn"value="effacer"/>
                  </td>
                </tr>
              </table>
            </form>
            </p>
          </div>
        <!--End Main Content-->
        </div>
        <div id="footerInnerSeparator"></div>
      </div>
    </div>

    <div id="footerOuterSeparator"></div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';