<?php
  include "connection.php";
  header('Content-Type: application/json');
  header('Cache-Control: no-cache, must-revalidate');
  $auditorium = $_GET['auditorium'];
  $sqlSelect = $dbh->prepare("SELECT * FROM $db.lesson WHERE $db.lesson.auditorium = :auditorium");
  $sqlSelect->execute(array('auditorium' => $auditorium));
    $cell=$sqlSelect->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($cell);
?>