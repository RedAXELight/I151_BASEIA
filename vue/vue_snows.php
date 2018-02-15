<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 12.05.2017
 * Time: 09:36
 * Updated : Nicolas.Glassey
 * Date : 14.02.2018
 */

ob_start();
$titre = 'Rent A Snow - Nos snows';

?>

<article>
  <header>
    <h2>Nos snows</h2>
    <table class="table textcolor">
      <tr>
      <?php
        // Affichage des entêtes du tableau (-1 pour enlever le champ statut)

        for ($i=0; $i<$resultats->columnCount()-1; $i++)
        {
          $entete = $resultats->getColumnMeta($i);
          echo "<th>" . $entete['name'] . "</th>";
        }
      ?>
      </tr>
      <?php foreach ($resultats as $resultat) :?>
        <!-- Affichage des résultats de la BD -->
        <tr>
          <td><?=$resultat['idsurf'];?></td>
          <td><?=$resultat['marque'];?></td>
          <td><?=$resultat['boots'];?></td>
          <td><?=$resultat['type'];?></td>
          <td><?=$resultat['disponibilite'];?></td>
        </tr>
      <?php endforeach;?>
    </table>
  </header>
</article>
<hr/>

<?php
  $contenu=ob_get_clean();
  require "gabarit.php";
