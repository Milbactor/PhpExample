<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  ini_set("track_errors", 1);

  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = 'pass123';
  $DB_NAME = 'university2';

//  function success($msg) {
//    echo "<div class=\"success\">$msg</div>";
//  }

  /**
   * Outputs the specified error message.
   */
  function error($msg) {
    echo "<div class=\"error\">$msg</div>";
  }

  /**
   * Outputs the specified error message and aborts finishes handling of the
   * request.
   */
  function error_exit($msg) {
    error($msg);
    include 'footer.inc.php';
    exit();
  }

  /**
   * Returns the value of $var if it is set and one of the following holds:
   *
   *   1. $pred is NULL.
   *   2. $pred is an array containing $var.
   *   3. $pred is a callable that yields true on input $var.
   *
   * In all other cases $default is returned.
   */
  function get_value($var, $default, $pred) {
    if (!isset($var)) {
      return $default;
    }

    if ($pred === NULL) {
      return $var;
    }

    if (is_array($pred) && in_array($var, $pred, true)) {
      return $var;
    }

    if (is_callable($pred) && call_user_func($pred, $var)) {
      return $var;
    }

    return $default;
  }

  /**
   * Performs the specified query using the given parameters.
   *
   * @param query
   *        A prepared statement as accepted by mysqli::prepare.
   * @param params
   *        An arry containing arguments as they must be passed to
   *        mysqli_stmt::bind_param. Note that all but the first argument must
   *        be a variable reference. Pass NULL if the parameterized query does
   *        not take paramaters.
   * @return The executed statement.
   */
  function query($query, $params) {
    global $mysqli;

    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
      error_exit($mysqli->error);
    }

    if (isset($params)) {
      if (!call_user_func_array('mysqli_stmt_bind_param',
                                array_merge(array($stmt), $params))) {
        error_exit($stmt->error);
      }
    }

    if (!$stmt->execute() || !$stmt->store_result()) {
      error_exit($stmt->error);
    }

    return $stmt;
  }

  /**
   * Returns the given preset value if it is set, otherwise a row from the
   * (executed) SQL statement is fetched. The value of the variable $var, which
   * is assumed to be updated by this fetch operation, is then returned (but
   * not before resetting the data pointer to row 0).
   */
  function get_first_value($stmt, &$var, $preset) {
    if (isset($preset)) {
      return $preset;
    }

    if (!$stmt->fetch()) {
      return NULL;
    }

    $stmt->data_seek(0);
    return $var;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
  <head>
    <title>University Management System</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery-1.5.min.js"></script>
    <script type="text/javascript" src="jquery.watermark-3.1.1.min.js"></script>
    <script type="text/javascript">
      //function formChangeHandler() {
      //  $.ajax({
      //    url: 'ms.php',
      //    context: $(this).closest('form'),
      //    success: function(data, textStatus) {
      //      alert('a');
      //      this.html(this.html() + 'ok');
      //      $(this).find('*').change(formChangeHandler);
      //    }
      //  });
      //}

      $(document).ready(function() {
        $(':text').each(function() {
          var title = $(this).attr('title');
          $(this).watermark(title);
        });

        /*
         * Some forms should be submitted and (indirectly) updated after each
         * change.
         */
        //$('.immediate_update').change(formChangeHandler);
        $('.immediate_update select').change(function() {
          $(this).closest('form').attr('method', 'get');
          $(this).closest('form').submit();
        });
      });
    </script>
  </head>
  <body>
<?php
  /*
   * Unless specifically requested otherwise, we create here the interface
   * (connection) to the database; this connection will be closed in
   * footer.inc.
   */
  $mysqli = NULL;
  if (!isset($noAutoConnect)) {
    $mysqli = @new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($mysqli->connect_errno !== 0) {
      error_exit("Failed to connect to the database: $mysqli->connect_error.
                 Has it been <a href=\"create_db.php\">created</a>?");
    }
  }
?>
