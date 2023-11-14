
<!--DOCTYPE -->
<html lang="fr" dir="ltr">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="table.css">




    <title></title>


  </head>
  <body>
    <!--- menu --->

    <a class="retour" href="test.php">  <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path d="M30 16.5H11.74l8.38-8.38L18 6 6 18l12 12 2.12-2.12-8.38-8.38H30v-3z"></path></svg><img src="img/pp.png" alt=""></a>


<div class="table">
  <table class="table table-hover">
    <thead class="table">
      <tr>

        <th scope="col"> Le jour</th>
        <th scope="col">Nombre de pains jetés</th>
        <th scope="col">le poids</th>
      </tr>
    </thead>
    <tbody >
      <tr>
        <?php

  $fichier = "fichiercentlignes.csv";
  $fic = fopen($fichier, 'r');
  for ($ligne = fgetcsv($fic, 1024, ","); !feof($fic); $ligne = fgetcsv($fic, 1024, ",")) {

    echo '<tr class="table">';
    $j = sizeof($ligne);



      echo "<td class ='date'>".date("d-m-Y H:i:s", intval($ligne[0]))."</td>";
        echo "<td class ='nombre'>".$ligne[1]."</td>";
          echo "<td class='kg' >".$ligne[2]." "."kg</td>";


    echo "</tr>";
    }
  ?>

      </tr>


    </tbody>
  </table>

</div>


</body>
