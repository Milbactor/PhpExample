<?php
  include 'header.inc.php';

  // XXX: Icons from
  // http://itweek.deviantart.com/art/Knob-Buttons-Toolbar-icons-73463960

  // XXX: this is used as two separate lists.
  $FIELDS = array(
    'id' => &$id,
    'first_name' => &$firstName,
    'last_name' => &$lastName,
    'gender' => &$gender,
    'birth_date' => &$birthDate,
    'street' => &$street,
    'house_no' => &$houseNo,
    'city' => &$city,
    'zip_code' => &$zipCode,
    'is_student' => &$isStudent,
    'is_teacher' => &$isTeacher,
    'is_admin' => &$isAdmin
  );

  $HEADERS = array(
    'ID' => array('id'),
    'Name' => array('last_name', 'first_name'),
    'Gender' => array('gender'),
    'Birth Date' => array('birth_date'),
    'Address' => array('street', 'house_no', 'city'),
    'Zip' => array('zip_code', 'house_no'),
    'City' => array('city', 'street', 'house_no'),
    'Student?' => array('is_student'),
    'Teacher?' => array('is_teacher'),
    'Admin?' => array('is_admin')
  );

  /*
   * Get the sort preferences. Make sure any non-valid parameter is ignored, so
   * as to guard against SQL injection.
   */
  $sortFields = get_value(@$_GET['sort_fields'],
                          array('last_name asc', 'first_name asc'), 'is_array');
  foreach ($sortFields as &$value) {
    @list($f, $d) = explode(' ', $value, 2);
    $value = get_value($f, 'id', array_keys($FIELDS)) . ' ' .
             get_value($d, 'asc', array('asc', 'desc'));
  }
  $sortDirective = implode(', ', $sortFields);

  /* Get the 'view port' preferences. Again we guard against SQL injection. */
  $start = (int) max(0, get_value(@$_GET['start'], 0, 'is_numeric'));
  $length = (int) max(1, get_value(@$_GET['length'], 15, 'is_numeric'));

  /* Read all student records from the database. */
  $stmt = query("
    SELECT id, first_name, last_name, gender, birth_date, street, house_no,
           city, zip_code,
           (id IN (SELECT id FROM student
                   WHERE student.id = person.id)) AS is_student,
           (id IN (SELECT id FROM teacher
                   WHERE teacher.id = teacher.id)) AS is_teacher,
           (id IN (SELECT id FROM admin
                   WHERE admin.id = admin.id)) AS is_admin
    FROM person
    ORDER BY $sortDirective
    LIMIT ?, ?
  ", array('dd', &$start, &$length));
  call_user_func_array('mysqli_stmt_bind_result',
                       array_merge(array($stmt), array_values($FIELDS)));

  function output_column_header($header, $fields, $dir) {
      foreach ($fields as &$f) {
          $f .= ' ' . $dir;
      }

      echo '<th><a class="nav" href="';
      echo '?' . http_build_query(array('sort_fields' => $fields) + $_GET);
      echo "\">$header</a></th>";
  }

  function output_prev_next_links($size, $start, $length) {
    if ($start <= 0) {
      echo '<span class="disabled">&lt;&lt; prev</span>';
    } else {
      $prevStart = max(0, $start - $length);
      printf('<a class="nav" href="?%s">&lt;&lt; prev</a>',
             http_build_query(array('start' => $prevStart) + $_GET));
    }

    echo ' | ';

    if ($start + $length >= $size) {
      echo '<span class="disabled">next &gt;&gt;</span>';
    } else {
      $nextStart = $start + $length;
      printf('<a class="nav" href="?%s">next &gt;&gt;</a>',
             http_build_query(array('start' => $nextStart) + $_GET));
    }
  }

  $size = $mysqli->query('SELECT count(*) FROM person')->fetch_row();
  output_prev_next_links($size[0], $start, $length);
?>
    <table>
      <thead>
        <tr>
<?php
  foreach ($HEADERS as $header => $fields) {
    output_column_header($header, $fields, 'asc');
  }
?>
        <tr>
      </thead>
      <tfoot>
        <tr>
<?php
  foreach ($HEADERS as $header => $fields) {
    output_column_header($header, $fields, 'desc');
  }
?>
        <tr>
      </tfoot>
      <tbody>
<?php
  while ($stmt->fetch()) {
    $isStudent = $isStudent ? 'yes' : 'no';
    $isTeacher = $isTeacher ? 'yes' : 'no';
    $isAdmin = $isAdmin ? 'yes' : 'no';
?>
        <tr>
          <td><?= $id ?></td>
          <td><?= $lastName ?>, <?= $firstName ?></td>
          <td><?= $gender ?></td>
          <td><?= $birthDate ?></td>
          <td><?= $street ?> <?= $houseNo ?></td>
          <td><?= $zipCode ?></td>
          <td><?= $city ?></td>
          <td><img src="<?= $isStudent ?>.png" alt="<?= $isStudent ?>" /></td>
          <td><img src="<?= $isTeacher ?>.png" alt="<?= $isTeacher?>" /></td>
          <td><img src="<?= $isAdmin ?>.png" alt="<?= $isAdmin?>" /></td>
        </tr>
<?php
  }
?>
      </tbody>
    <table>
<?php
  include 'footer.inc.php';
?>
