<?php 
include_once 'header.php'
?>
      <section class="index-intro">
         <?php 
            if (isset($_SESSION["id"])){
               echo "<p class='welcome'> Hello there ". $_SESSION["username"]."!</p>" ;
               $lat = $_SESSION["lat"];
            }
            ?>
      </section>
      <div id = "map"></div>
      <script src="scripts/initialmap.js"></script>
<?php 
include_once 'header.php'
?>