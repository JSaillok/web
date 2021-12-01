<?php 
include_once 'header.php'
?>
      <section class="index-intro">
         <?php 
            if (isset($_SESSION["id"])){
               echo "<p> Hello there ". $_SESSION["username"]."!</p>" ;
            }
            ?>
         <h1>Introduction</h1>
         <p>Paragraph</p>
      </section>
      <section class="index-categories">
         <h2>Basic Categories</h2>
         <div class="index-categories-list">
            <div class="">
               <h3>Random</h3>
            </div>
            <div class="">
               <h3>Random</h3>
            </div>
            <div class="">
               <h3>Random</h3>
            </div>
            <div class="">
               <h3>Random</h3>
            </div>
         </div>
      </section>
<?php 
include_once 'footer.php'
?>