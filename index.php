<!DOCTYPE HTML>
<html>

<head>
    <script>
        
var ajax = new XMLHttpRequest();

function form1() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("res").innerHTML = ajax.response;
            }
        }
    }
    var group = document.getElementById("groups").value;
    ajax.open("get", "1.php?groups=" + group);
    ajax.send();
}

function form2() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {

                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "<table border ='1'>";
                result += "<tr><th>Teacher</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th></tr>";
                for (var i = 0; i < rows.length; i++) {
                    result += "<tr>";
                    result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[1].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[2].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[3].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[4].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[5].firstChild.nodeValue + "</td>";
                    result += "</tr>";
                }
                result += "</table>";
                document.getElementById("res").innerHTML = result;
            }
        }
    }
    var teacher = document.getElementById("teacher").value;
    ajax.open("get", "2.php?teacher=" + teacher);
    ajax.send();
}



function form3() {
    ajax.onreadystatechange = function() {
    console.dir(ajax);
    let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            
            let result = "<table border ='1'>";
            result += "<tr><th>Auditorium</th><th>Day</th><th>Number</th><th>Disciple</th><th>Type</th></tr>";
            for (var i = 0; i < rows.length; i++) {
                result += "<tr>";
                result += "<td>" + rows[i].auditorium + "</td>";
                result += "<td>" + rows[i].week_day + "</td>";
                result += "<td>" + rows[i].lesson_number + "</td>";
                result += "<td>" + rows[i].disciple + "</td>";
                result += "<td>" + rows[i].type + "</td>";
                result += "</tr>";
            }
            document.getElementById("res").innerHTML = result;
        }
    }
};
    var auditorium = document.getElementById("auditorium").value;
    ajax.open("get", "3.php?auditorium=" + auditorium);
    ajax.send();
}

    </script>
</head>

<body>
    <h3>Усиченко Владислав. КИУКИ-19-5, Вариант 1</h3>
    <p> Вывести расписание занятий группы
        <select name="groups" id="groups">
            <option>Группа</option>
    </p>
    <?php
    include "connection.php";
    $sqlSelect = "SELECT DISTINCT * FROM $db.groups";
    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        print($cell[1]);
        echo "</option>";
    }
    ?>
    </select>
    <button onclick="form1()">Поиск</button>

    <p>Вывести расписание преподавателя
        <select name="teacher" id="teacher">
            <option>Преподаватели</option>
    </p>
    <?php
    $sqlSelect = "SELECT DISTINCT * FROM $db.teacher";
    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        print($cell[1]);
        echo "</option>";
    }
    ?>
    </select>
    <button onclick="form2()">Поиск</button>

    <p>Вывести расписание для аудитории
        <select name="auditorium" id="auditorium">
            <option>Аудитория</option>
    </p>
    <?php
    $sqlSelect = "SELECT DISTINCT auditorium FROM $db.lesson";
    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        print($cell[0]);
        echo "</option>";
    }
    ?>
    </select>
    <button onclick="form3()">Поиск</button>
<div id="res"></div>
</body>

</html>