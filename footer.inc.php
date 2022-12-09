  </body>
</html>
<?php
  if (isset($mysqli) && $mysqli && $mysqli->connect_errno === 0) {
    $mysqli->close();
  }
?>
