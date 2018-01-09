<?php
  if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 1) {
?>
      <meta http-equiv="refresh" content="0; URL='../vues/ficheLocalisation.php'">
<?php

        }else{
          ?>
      <meta http-equiv="refresh" content="0; URL='../vues/index.html'">
<?php
        }

?>
