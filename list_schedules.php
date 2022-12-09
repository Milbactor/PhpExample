<?php
  include 'header.inc.php';

  /* Read all schedule records from the database. */
  $stmt = query('
    SELECT schedule.id, subject_id, subject_name, teacher_id, first_name,
           last_name, timeslot_id, start_time, end_time, week_day, room
    FROM schedule
    LEFT JOIN (subject, person, timeslot)
    ON (subject_id = subject.id AND teacher_id = person.id AND
        timeslot_id = timeslot.id)', NULL);
  $stmt->bind_result($scheduleId, $subjectId, $subjectName, $teacherId,
                     $teacherFirstName, $teacherLastName, $timeslotId,
                     $startTime, $endTime, $weekDay, $room);
?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Subject ID</th>
          <th>Subject Name</th>
          <th>Teacher ID</th>
          <th>Teacher First Name</th>
          <th>Teacher Last Name</th>
          <th>Timeslot ID</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Week Day</th>
          <th>Room</th>
        <tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Subject ID</th>
          <th>Subject Name</th>
          <th>Teacher ID</th>
          <th>Teacher First Name</th>
          <th>Teacher Last Name</th>
          <th>Timeslot ID</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Week Day</th>
          <th>Room</th>
        <tr>
      </tfoot>
      <tbody>
<?php
  while ($stmt->fetch()) {
  $stmt->bind_result($scheduleId, $subjectId, $subjectName, $teacherId,
                     $teacherFirstName, $teacherLastName, $timeslotId, $startTime,
                     $endTime, $weekDay, $room);
?>
        <tr>
          <td><?= $scheduleId ?></td>
          <td><?= $subjectId ?></td>
          <td><?= $subjectName ?></td>
          <td><?= $teacherId ?></td>
          <td><?= $teacherFirstName ?></td>
          <td><?= $teacherLastName ?></td>
          <td><?= $timeslotId ?></td>
          <td><?= $startTime ?></td>
          <td><?= $endTime ?></td>
          <td><?= $weekDay ?></td>
          <td><?= $room ?></td>
        </tr>
<?php
  }
?>
      </tbody>
    <table>
<?php
  include 'footer.inc.php';
?>
