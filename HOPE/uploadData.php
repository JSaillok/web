<?php 
include_once 'header.php';
?>
<head>
   <title>adminHome</title>
</head>
   <section class="index-intro">
      <?php 
         if (isset($_SESSION["id"])){
            echo "<p class='welcome'> Hello there ". $_SESSION["username"]."!</p>" ;
         }
         ?>
   </section>
      <input type='file' id='file' class= "upload-button" accept='.json ' onchange="readFile(this)"/>
      <label class= "upload-button" for="file">Choose a File...</label>
      <button id = "upload"> Upload </button>

      <input type="submit" class="delete-button" name="Delete" value="Delete All" />

      <script src="scripts/dataMan.js"></script>
<?php 
include_once 'footer.php';
?>