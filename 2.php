<?php
  include "connection.php";
  header('Content-Type: text/xml');
  header('Cache-Control: no-cache, must-revalidate');
  echo '<?xml version="1.0" encoding="utf-8"?>';
  echo "<root>";
  $teachers = $_GET['teacher'];
  $sqlSelect = $dbh->prepare("SELECT * FROM $db.teacher JOIN $db.lesson_teacher ON $db.teacher.ID_teacher = $db.lesson_teacher.FID_teacher JOIN $db.lesson ON $db.lesson_teacher.FID_Lesson1 = $db.lesson.ID_Lesson WHERE $db.teacher.name = :teachers");
  $sqlSelect->execute(array('teachers' => $teachers));
  while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
    $day = $cell[5];
    $number = $cell[6];
    $auditorium = $cell[7];
    $disciple = $cell[8];
    $type = $cell[9];
    echo "<row><teacher>$teachers</teacher><day>$day</day><number>$number</number><auditorium>$auditorium</auditorium><disciple>$disciple</disciple><type>$type</type></row>";
  }
echo "</root>";
?>