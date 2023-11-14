<!--DOCTYPE -->
<html lang="fr" dir="ltr">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="test.css">



</script>

    <title></title>

  </head>
  <body>
    <!--- menu --->
<header>
  <nav class="navv">
    <ul class="header">
      <li class="nav"><a class="active" href="test.php"><img src="img/pp.png" alt=""> </a></li>
      <li class="nav"><a href="tableausuper.php"> <img src="img/day.png" alt=""> </a></li>
    </ul>

</nav>
</header>
<!-- le graphe -->

<div class="semaine">

<?php
// fichier  pour les 5 jours
//Ouvre le fichier csv
$fic = "fichiercentlignes.csv";
$tabSite = array();
$i = 0;
$j = 0;

if ($fp = fopen ($fic,'r') or die ("erreur dans l'ouverture 1"))
{
    while($rep = fgetcsv($fp, 1000, ';'))
    {
        $ligne[$i] = $rep[0] or die ("Ligne 10");
        $tabSite[$i] = $ligne[$i];
        $i++;
    }
    fclose ($fp);
}
else
{
    echo ("Erreur d'ouverture du fichier");
}

for($j=0; $j < $i; $j++)
{
    $tabSite[$j]=explode(",",$ligne[$j]) or die ("Ligne 22");


}

foreach ($tabSite as $element)
{

}
//Permet d'afficher le jours precis
$csv = [];
$file = fopen("fichiercentlignes.csv", "r");
while($data = fgetcsv($file, 1000, ",")) { $csv[] = $data; }
fclose($file);

$week = [];

foreach(array("this", "last") as $keyword)
{
  $week[$keyword] = [];

  foreach(array("monday", "tuesday", "wednesday", "thursday", "friday") as $day)
  {
    $date = date("d/m/Y", strtotime("{$day} {$keyword} week"));

    foreach($csv as $value)
    {
      if(date("d/m/Y", intval($value[0])) == $date)
      {
        $week[$keyword][$day] = $value;
      }
    }

    if(!isset($week[$keyword][$day]))
    {
      $week[$keyword][$day] = false;
    }
  }
}


// calcul de la moyenne
$weight = array_column($csv, 1);

$weight_average = array_sum($weight) / count($weight);

$moy = $weight_average / 100;





// met le poids en %
      $ceLundi =$week["this"]["monday"][1] / 100;

      $ceMardi = $week["this"]["tuesday"][1] / 100;

      $ceMercredi =$week["this"]["wednesday"][1] / 100;

      $ceJeudi = $week["this"]["thursday"][1] / 100;

      $ceVendredi = $week["this"]["friday"][1] / 100;

//semaine derniere
      $LundiDernier =$week["last"]["monday"][1] / 100;

      $MardiDernier = $week["last"]["tuesday"][1] / 100;

      $MercrediDernier =$week["last"]["wednesday"][1] / 100;

      $JeudiDernier = $week["last"]["thursday"][1] / 100;

      $VendrediDernier = $week["last"]["friday"][1] / 100;

//convertie le jours en int
$jour = date("w", time());

 ?>

<div class="Lundi">

          <div class="moyenne">


                    <?php
                    echo'<div class="progress-wrap progress" data-progress-percent='.$moy.'>';
                    echo'<div class="progress-bar progress"><p>'.$moy.'%</p></div>';?>

                     </div>
                     <p class="JD">moyenne</p>
          </div>
          <div class="LundiDernier" onclick="update(0);">
            <?php
              echo '<div class="CeMercredii">';
              echo '<div class="progres-w progres"  data-progres-cent='. $LundiDernier .'>' ;
              echo '<div class="progres-barr progres"><p>'.$LundiDernier.'%</p> <img src="img/ClickMe.png" alt=""></div>';
              echo '</div>';
              echo '<p class="JD"> Lundi Dernier</p>';
            ?>

        </div>
      </div>

        <?php
            if ($jour >= 1 and $jour <= 5 ) {
              echo '<div class="CeMercredi">';
              echo '<div class="progres-ww progres"  data-progres-centt='. $ceLundi .'>' ;
              echo '<div class="progres-barrr progres"><p>'.$ceLundi.'%</p><img src="img/ClickMe.png" alt=""></div>';
              echo '</div>';
              echo '<p class="JD">Ce Lundi</p>';
              echo'</div>';
            }


        ?>

</div>

<div class="Mardi">

          <div class="moyenne">
              <?php
              echo'<div class="progress-wrap progress" data-progress-percent='.$moy.'>';
              echo'<div class="progress-bar progress"><p>'.$moy.'%</p></div>';?>
             </div>
             <p class="JD">Moyenne</p>
          </div>

          <div class="MardiDernier" onclick="update(1);">


                        <?php
                          echo '<div class="CeMercredii">';
                          echo '<div class="progres-mardi progres"  data-progres-centm='. $MardiDernier .'>' ;
                          echo '<div class="progres-barrmardi progres"><p>'.$MardiDernier.'%</p><img src="img/ClickMe.png" alt=""></div>';
                          echo '</div>';
                          echo '<p class="JD"> Mardi Dernier</p>';
                        ?>

                    </div>
                    </div>


                  <?php


                  if ($jour >= 2 and $jour <= 5 ) {
                    echo '<div class="CeMercredi">';
                    echo '<div class="progres-mardii progres"  data-progres-centmm='. $ceMardi .'>' ;
                    echo '<div class="progres-barrmardii progres"><p>'.$ceMardi.'%</p><img src="img/ClickMe.png" alt=""></div>';
                    echo '</div>';
                    echo '<p class="JD">Ce Mardi</p>';
                    echo'</div>';
                  }


                   ?>




</div>

<div class="Mercredi">

            <div class="moyenne">
                <?php
                echo'<div class="progress-wrap progress" data-progress-percent='.$moy.'>';
                echo'<div class="progress-bar progress"><p>'.$moy.'%</p></div>';?>
               </div>
               <p class="JD">Moyenne</p>
            </div>
          <div class="MercrediDernier" onclick="update(2);">

            <?php
              echo '<div class="CeMercredii">';
              echo '<div class="progres-Mercredi progres"  data-progres-centme='. $MercrediDernier .'>' ;
              echo '<div class="progres-barrMercredi progres"><p>'.$MercrediDernier.'%</p><img src="img/ClickMe.png" alt=""></div>';
              echo '</div>';
              echo '<p class="JD"> Mercredi Dernier</p>';
            ?>

        </div>
        </div>




                  <?php

                    if ($jour >= 3 and $jour <= 5 ) {
                      echo '<div class="CeMercredi">';
                      echo '<div class="progres-Mercredii progres"  data-progres-centmme='. $ceMercredi .'>' ;
                      echo '<div class="progres-barrMercredii progres"><p>'.$ceMercredi.'%</p><img src="img/ClickMe.png" alt=""></div>';
                      echo '</div>';
                      echo '<p class="JD">Ce Mercredi</p>';
                      echo'</div>';
                    }


                   ?>





</div>

<div class="Jeudi">

            <div class="moyenne">
                <?php
                echo'<div class="progress-wrap progress" data-progress-percent='.$moy.'>';
                echo'<div class="progress-bar progress"><p>'.$moy.'%</p></div>';?>
               </div>
               <p class="JD">Moyenne</p>
            </div>

          <div class="JeudiDernier" onclick="update(3);">
            <?php
              echo '<div class="CeMercredii">';
              echo '<div class="progres-Jeudi progres"  data-progres-centj='. $JeudiDernier .'>' ;
              echo '<div class="progres-barrJeudi progres"><p>'.$JeudiDernier.'%</p><img src="img/ClickMe.png" alt=""></div>';
              echo '</div>';
              echo '<p class="JD"> Jeudi Dernier</p>';
            ?>


              </div>

          </div>


                  <?php

                      if  ($jour >= 4 and $jour <= 5 ) {

                        echo '<div class="CeMercredi">';
                        echo '<div class="progres-Jeudii progres"  data-progres-centje='. $ceJeudi .'>' ;
                        echo '<div class="progres-barrJeudii progres"><p>'.$ceJeudi.'%</p><img src="img/ClickMe.png" alt=""></div>';
                        echo '</div>';
                        echo '<p class="JD">Ce Jeudi</p>';
                        echo'</div>';
                      }


                   ?>




</div>

<div class="Vendredi">
            <div class="moyenne">
              <?php
              echo'<div class="progress-wrap progress" data-progress-percent='.$moy.'>';
              echo'<div class="progress-bar progress"><p>'.$moy.'%</p></div>';?>
             </div>
               <p class="JD">Moyenne</p>
            </div>

            <div class="VendrediDernier" onclick="update(4);">
            <?php
                          echo '<div class="CeMercredii">';
                          echo '<div class="progres-Vendredi progres"  data-progres-centv='. $VendrediDernier .'>' ;
                          echo '<div class="progres-barrVendredi progres"><p>'.$VendrediDernier.'%</p><img src="img/ClickMe.png" alt=""></div>';
                          echo '</div>';
                          echo '<p class="JD"> Vendredi Dernier</p>';
            ?>


              </div>
            </div>

            <?php

                      if ($jour >= 5 and $jour <= 5) {
                        echo '<div class="CeMercredi">';
                        echo '<div class="progres-Vendredii progres"  data-progres-centve='. $ceVendredi .'>' ;
                        echo '<div class="progres-barrVendredii progres"><p>'.$ceVendredi.'%</p><img src="img/ClickMe.png" alt=""></div>';
                        echo '</div>';
                        echo '<p class="JD">Ce Vendredi</p>';

                      }

             ?>





</div>

</div>

<div class="stats__overlay">
      <div class="stats__overlay-back">
      <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path d="M30 16.5H11.74l8.38-8.38L18 6 6 18l12 12 2.12-2.12-8.38-8.38H30v-3z"></path></svg>
      <p id="jour">2009-2010</p>
      </div>
      <div class="stats__overlay-avg">
      <p class="poids" id="poids">0.69</p>
      <p>le poids de la journée :</p>
      </div>
      <div class="stats__overlay-info">
      <div class="stats__overlay-info-half">
      <p class="pains">nombre de pains jetés:</p>
      <p  class="pains"id="date">72</p>
      </div>
      <div  class="stats__overlay-info-half">
      <p class="pains">le jour : <br> l'heure: </p>
      <p class="nombre" id="pains">nombre</p>
      </div>
      </div>
</div>

<div class="stats__overlayy">
      <div class="stats__overlayy-back">
      <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path d="M30 16.5H11.74l8.38-8.38L18 6 6 18l12 12 2.12-2.12-8.38-8.38H30v-3z"></path></svg>
      <p id="jours">2009-2010</p>
      </div>
      <div class="statss">
        <div class="stats__overlayy-avg">
        <p class="poids" id="poidds">0.69</p>
        <p>le poids de la journée :</p>
        </div>
        <div class="stats__overlayy-info">
        <div class="stats__overlayy-info-half">
        <p class="pains">nombre de pains jetés:</p>
        <p class="nombre" id="painss">nombre</p>
        </div>
        <div  class="stats__overlayy-info-half">
        <p class="pains">le jour : <br> l'heure: </p>

              <p  class="pains"id="datte">72</p>
        </div>
        </div>
      </div>

</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript">



var header = $('.stats__header');

var nums = $('.stats__item-num');

var overlay = $('.stats__overlay');

var back = $('.stats__overlay-back');

var isOpen = false;

var vAvg = $('#poids');

var vGames = $('#pains');

var vGoal = $('#date');

var bar  = $('.CeMercredi');

var vYear = $('#jour');

var tab =<?php echo json_encode($tabSite); ?> ;

console.log(<?php echo json_encode($tabSite); ?>);

//cette semaine :
  //lundi
      var Lundi = <?php echo json_encode($ceLundi =$week["this"]["monday"][0]); ?>;

      var Lundii = <?php echo json_encode($ceLundi =$week["this"]["monday"][1]); ?>;

      var Lundiii = <?php echo json_encode($ceLundi =$week["this"]["monday"][2]); ?>;

  //mardi
      var Mardi = <?php echo json_encode($ceMardi =$week["this"]["tuesday"][0]); ?>;

      var Mardii = <?php echo json_encode($ceMardi =$week["this"]["tuesday"][1]); ?>;

      var Mardiii = <?php echo json_encode($ceMardi =$week["this"]["tuesday"][2]); ?>;

  //Mercredi
      var Mercredi = <?php echo json_encode($ceMercredi =$week["this"]["wednesday"][0]); ?>;

      var Mercredii = <?php echo json_encode($ceMercredi =$week["this"]["wednesday"][1]); ?>;

      var Mercrediii = <?php echo json_encode($ceMercredi =$week["this"]["wednesday"][2]); ?>;

  //jeudi
    var Jeudi = <?php echo json_encode($ceJeudi =$week["this"]["thursday"][0]); ?>;

    var Jeudii = <?php echo json_encode($ceJeudi =$week["this"]["thursday"][1]); ?>;

    var Jeudiii = <?php echo json_encode($ceJeudi =$week["this"]["thursday"][2]); ?>;

    //Vendredi
    var Vendredi = <?php echo json_encode($ceVendredi =$week["this"]["friday"][0]); ?>;

    var Vendredii = <?php echo json_encode($ceVendredi =$week["this"]["friday"][1]); ?>;

    var Vendrediii = <?php echo json_encode($ceVendredi =$week["this"]["friday"][2]); ?>;




// lors du click , affiche  le poids ,le jours et le nombre de passage devant le capteur
entrance()
nums.css('opacity', '1');

$(document).on('ready')

      bar.on('click', showOverlay);

      back.on('click', showOverlay);

function entrance() {
          bar.addClass('active');

          header.addClass('active');

          header.on('transitionend webkitTransitionend', function() {

          bar.css('transition-delay', '1');

          header.off('transitionend webkitTransitionend');

  });
}

function showOverlay() {

        if (!isOpen) {

          overlay.addClass('active').removeAttr('style');

          bar.css('transition', 'all 0.4s cubic-bezier(0.86, 0, 0.07, 1)').removeClass('active');

          header.removeClass('active');

          nums.css('opacity', '0');

          isOpen = true;

         updateInfo($(this).parent().index());

       } else {

            overlay.css('transition', 'all 0.4s cubic-bezier(0.755, 0.05, 0.855, 0.06)').removeClass('active');

            bar.addClass('active').removeAttr('style');

            header.addClass('active');


            nums.css('opacity', '1');

            isOpen = false;
          }
}

var dat = [
          {

            jour: 'Lundi',

            poids: Lundii,

            date: timeConverter(Lundi),

            pains: Lundiii

          },

          {


            jour: 'Mardi',

            poids: Mardii,

            date: timeConverter(Mardi),

            pains: Mardiii

          },
          {

            jour: 'Mercredi',

            poids: Mercredii,

            date: timeConverter(Mercredi),

            pains: Mercrediii


          },
          {

            jour: 'Jeudi',

            poids: Jeudii,

            date: timeConverter(Jeudi),

            pains: Jeudiii

          },
          {
            jour: 'Vendredi',

            poids: Vendredii,

            date: timeConverter(Vendredi),

            pains: Vendrediii

          }

];

function updateInfo(index) {

  vYear.text(dat[index].jour);

  vAvg.text(dat[index].poids);

  vGoal.text(dat[index].pains);

  vGames.text(dat[index].date);

}

//--------------------------------- pour la semaine denieres------------------


var Year = $('#jours');

var Avg = $('#poidds');

var Games = $('#painss');

var Goal = $('#datte');

var overlayy = $('.stats__overlayy');

var backk = $('.stats__overlayy-back');

var barr  = $('.CeMercredii');


entrancee()

nums.css('opacity', '1');

$(document).on('ready')

  barr.on('click', showOverlayy);

  backk.on('click', showOverlayy);

function entrancee() {

        barr.addClass('active');

        header.addClass('active');

        header.on('transitionend webkitTransitionend',
  function() {

        barr.css('transition-delay', '1');

        header.off('transitionend webkitTransitionend');

  });
}

function showOverlayy() {

          if (!isOpen) {

                    overlayy.addClass('active').removeAttr('style');

                    barr.css('transition', 'all 0.4s cubic-bezier(0.86, 0, 0.07, 1)').removeClass('active');

                    header.removeClass('active');

                    nums.css('opacity', '0');

                    isOpen = true;

           //update($(this).parent().index());
           //console.log($(this).parent().index());


          } else {

            overlayy.css('transition', 'all 0.4s cubic-bezier(0.755, 0.05, 0.855, 0.06)').removeClass('active');

            barr.addClass('active').removeAttr('style');

            header.addClass('active');

            nums.css('opacity', '1');

            isOpen = false;

          }
}

// Convert a Unix timestamp to time
function timeConverter(timestamp){

          var timestamp = parseInt(timestamp);

          var day = new Date(timestamp * 1000);

          var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

          var year = day.getFullYear();

          var month = months[day.getMonth()];

          var date = day.getDate();

          var hour = day.getHours();

          var min = day.getMinutes();

          var sec = day.getSeconds();

          var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;

          return time ;

};
//semaine derniere :

//lundi

        var LundiD = <?php echo json_encode($LundiDernier =$week["last"]["monday"][0]); ?>;

        var LundiiD = <?php echo json_encode($LundiDernier =$week["last"]["monday"][1]); ?>;

        var LundiiiD = <?php echo json_encode($LundiDernier =$week["last"]["monday"][2]); ?>;

//mardi

        var MardiD = <?php echo json_encode($MardiDernier =$week["last"]["tuesday"][0]); ?>;

        var MardiiD = <?php echo json_encode($MardiDernier =$week["last"]["tuesday"][1]); ?>;

        var MardiiiD = <?php echo json_encode($MardiDernier =$week["last"]["tuesday"][2]); ?>;

//Mercredi
        var MercrediD = <?php echo json_encode($MercrediDernier =$week["last"]["wednesday"][0]); ?>;

        var MercrediiD = <?php echo json_encode($MercrediDernier =$week["last"]["wednesday"][1]); ?>;

        var MercrediiiD = <?php echo json_encode($MercrediDernier =$week["last"]["wednesday"][2]); ?>;

//jeudi

          var JeudiD = <?php echo json_encode($JeudiDernier =$week["last"]["thursday"][0]); ?>;

          var JeudiiD = <?php echo json_encode($JeudiDernier =$week["last"]["thursday"][1]); ?>;

          var JeudiiiD = <?php echo json_encode($JeudiDernier =$week["last"]["thursday"][2]); ?>;

//Vendredi

          var VendrediD = <?php echo json_encode($VendrediDernier =$week["last"]["friday"][0]); ?>;

          var VendrediiD = <?php echo json_encode($VendrediDernier =$week["last"]["friday"][1]); ?>;

          var VendrediiiD = <?php echo json_encode($VendrediDernier =$week["last"]["friday"][2]); ?>;

function timeConverterr(timestampp){

        var timestampp = parseInt(timestampp);

        var day = new Date(timestampp * 1000);

        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        var year = day.getFullYear();

        var month = months[day.getMonth()];

        var date = day.getDate();

        var hour = day.getHours();

        var min = day.getMinutes();

        var sec = day.getSeconds();

        var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;

        return time ;

};



var data = [
  {

    jour: 'Lundi',

    poids: LundiiD,

    date:timeConverterr(LundiD),

    pains: LundiiiD

  },
  {

    jour: 'Mardi',

    poids: MardiiD,

    date:timeConverterr(MardiD),

    pains: MardiiiD

  },
  {

    jour: 'Mercredi',

    poids: MercrediiD,

    date:timeConverterr(MercrediD),

    pains: MercrediiiD

  },
  {

    jour: 'Jeudi',

    poids: JeudiiD,

    date:timeConverterr(JeudiD),

    pains: JeudiiiD

  },
  {

    jour: 'Vendredi',

    poids: VendrediiD,

    date:timeConverterr(VendrediD),

    pains: VendrediiiD

  }

];


function update(index) {

          Year.text(data[index].jour);

          Avg.text(data[index].poids);

          Goal.text(data[index].date);

          Games.text(data[index].pains);

}




// ------------------- progressbar-----------------------//
// affiche le poids en % dans la bar
  // on page load...
  moyen();

  LundiDernier();

  MardiDernier();

  MercrediDernier();

  JeudiDernier();

  VendrediDernier();

  CeLundi();

  CeMardi();

  CeMercredi();

  CeJeudi();

  CeVendredi();

      // on browser resize...
    $(window).resize(function() {

            moyen();

            LundiDernier();

            MardiDernier();

            MercrediDernier();

            JeudiDernier();

            VendrediDernier();

            CeLundi();

            CeMardi();

            CeMercredi();

            CeJeudi();

            CeVendredi();

    });



    // SIGNATURE PROGRESS
    function moyen() {

        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);

        var getProgressWrapWidth = $('.progress-wrap').height();

        var progressTotal = getPercent * getProgressWrapWidth;

        var animationLength = 1500;

        // on page load, animate percentage bar to data percentage length
        // .stop() used to prevent animation queueing
        $('.progress-bar').stop().animate({

            top: progressTotal

        },
            animationLength);

    };
    //------------------lundi-----------
    function LundiDernier() {

        var getcent = ($('.progres-w').data('progres-cent') / 100);

        var getProgressWWidth = $('.progres-w').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 1500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barr').stop().animate({

            top: progressT

        },
         animationL);

    };
    function CeLundi() {

        var getcent = ($('.progres-ww').data('progres-centt') / 100);

        var getProgressWWidth = $('.progres-ww').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 1500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrr').stop().animate({

            top: progressT
        },
         animationL);

    };
    //--------------------Mardi---------------------------
    function MardiDernier() {

        var getcent = ($('.progres-mardi').data('progres-centm') / 100);

        var getProgressWWidth = $('.progres-mardi').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrmardi').stop().animate({

            top: progressT
        },
        animationL);

    };
    function CeMardi() {

        var getcent = ($('.progres-mardii').data('progres-centmm') / 100);

        var getProgressWWidth = $('.progres-mardii').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrmardii').stop().animate({

            top: progressT
        },
         animationL);

    };
    //--------------------Mercredi---------------------------
    function MercrediDernier() {

        var getcent = ($('.progres-Mercredi').data('progres-centme') / 100);

        var getProgressWWidth = $('.progres-Mercredi').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrMercredi').stop().animate({

            top: progressT
        },
         animationL);

    };
    function CeMercredi() {

        var getcent = ($('.progres-Mercredii').data('progres-centmme') / 100);

        var getProgressWWidth = $('.progres-Mercredii').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrMercredii').stop().animate({
            top: progressT
        },
        animationL);

    };
    //--------------------Jeudi---------------------------
    function JeudiDernier() {

        var getcent = ($('.progres-Jeudi').data('progres-centj') / 100);

        var getProgressWWidth = $('.progres-Jeudi').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;
        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrJeudi').stop().animate({

            top: progressT
        },
         animationL);

    };
    function CeJeudi() {

        var getcent = ($('.progres-Jeudii').data('progres-centje') / 100);

        var getProgressWWidth = $('.progres-Jeudii').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing

        $('.progres-barrJeudii').stop().animate({

            top: progressT
        },
         animationL);

    };
    //--------------------Jeudi---------------------------
    function VendrediDernier() {

        var getcent = ($('.progres-Vendredi').data('progres-centv') / 100);

        var getProgressWWidth = $('.progres-Vendredi').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing


        $('.progres-barrVendredi').stop().animate({
            top: progressT
        },
        animationL);

    };
    function CeVendredi() {

        var getcent = ($('.progres-Vendredii').data('progres-centve') / 100);

        var getProgressWWidth = $('.progres-Vendredii').height();

        var progressT = getcent * getProgressWWidth;

        var animationL = 2500;

        // on page load, animate percentage bar to data percentage length

        // .stop() used to prevent animation queueing


        $('.progres-barrVendredii').stop().animate({
            top: progressT
        },
         animationL);

    };
</script>





<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
