<?php
  include 'header.inc.php';
?>
  <form id="add_schedule" class="immediate_update" method="post" action="ms.php">
    <select name="subject_id">
<?php
  $stmt = query("SELECT id, subject_name FROM subject", NULL);
  $stmt->bind_result($subjectId, $subjectName);
  $selectedSubjectId = get_first_value($stmt, $subjectId, @$_GET['subject_id']);
  while ($stmt->fetch()) {
    $selected = ($selectedSubjectId == $subjectId) ? 'selected="selected"' : '';
    echo "<option value=\"$subjectId\" $selected>$subjectName</option>";
  }
?>
    </select>
    <select name="teacher_id">
<?php
  $stmt = query("SELECT id, first_name, last_name FROM person, teacher_subject 
                 WHERE person.id = teacher_subject.teacher_id AND subject_id = ?",
                array('s', &$selectedSubjectId));
  $stmt->bind_result($teacherId, $firstName, $lastName);
  $selectedTeacherId = get_first_value($stmt, $teacherId, @$_GET['teacher_id']);
  while ($stmt->fetch()) {
    $selected = ($selectedTeacherId == $teacherId) ? 'selected="selected"' : '';
    echo "<option value=\"$teacherId\" $selected>$lastName $firstName</option>";
  }
?>
    </select>
    <select name="week_day">
<?php
  $WEEK_DAYS = array('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
  $selectedWeekDay = get_value(@$_GET['week_day'], 'mon', $WEEK_DAYS);
  foreach ($WEEK_DAYS as $day) {
    $selected = ($selectedWeekDay == $day) ? 'selected="selected"' : '';
    echo "<option value=\"$day\" $selected>$day</option>";
  }

  $selectedRoom = get_value(@$_GET['room'], '', NULL);
?>
    </select>
    <select name="timeslot_id">
<?php
//  $stmt = query("SELECT id, start_time, end_time FROM timeslot WHERE id IN
//                 (SELECT id FROM schedule WHERE subject_id = ? AND teacher_id = ?)",
//                array('ss', $selectedSubjectId, $selectedTeacherId));
  $stmt = query("SELECT id, start_time, end_time FROM timeslot", NULL);
  $stmt->bind_result($timeslotId, $startTime, $endTime);
  $selectedTimeslotId = get_first_value($stmt, $timeslotId, @$_GET['timeslot_id']);
  while ($stmt->fetch()) {
    $selected = ($selectedTimeslotId == $timeslotId) ? 'selected="selected"' : '';
    echo "<option value=\"$timeslotId\" $selected>$startTime - $endTime</option>";
  }
?>
    </select>
    <input name="room" title="room" size="5"
             value="<?php echo $selectedRoom; ?>" />
<?php
  $teacherId = @$_POST['teacher_id'];
  $subjectId = @$_POST['subject_id'];
  $timeslotId = @$_POST['timeslot_id'];
  $weekDay = @$_POST['week_day'];
  $room = @$_POST['room'];
  echo $teacherId;
  if (isset($teacherId, $subjectId, $timeslotId, $weekDay, $room)) {
    $stmt = $mysqli->prepare("INSERT INTO schedule
                             (teacher_id, subject_id, timeslot_id, week_day, room)
                             VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss',
                      $teacherId, $subjectId, $timeslotId, $weekDay, $room);
    $stmt->execute(); 
//   if ($stmt->execute()) {
 //     success('Successfully stored the record.');
 //   } else {
 //     error("Cannot store new record: $mysqli->error.");
 //   }

    $stmt->close();
  }
?>
    <input type="submit" value="store" />
  </form>
<?php
//  $stmt = $mysqli->prepare("SELECT id, first_name, last_name 
//                            FROM person, teacher_subject 
//                            WHERE person.id = teacher_subject.teacher_id
//                            AND subject_id = ?");
//  $stmt->bind_param('s', $subjectId);
//
//  if (!$stmt->execute()) {
//    error($mysqli->error);
//  }
//
//  $stmt->bind_result($teacherId, $firstName, $lastName);
?>
<?php
  include 'footer.inc.php';
?>
