<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Brukerfunksjoner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 8px;
        }
        .seksjon {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h1>Brukerfunksjoner</h1>

    <div class="seksjon">
        <h2>Klasse</h2>
        <ul>
            <a href="klasse/legg_til_klasse.php">Registrer klasse</a>            
            <li><a href="klasse/vis_klasse.php">Vis alle klasser</a></li>
            <li><a href="klasse/slett_klasse.php">Slett klasse</a></li>
        </ul>
    </div>

    <div class="seksjon">
        <h2>Student</h2>
        <ul>
            <li><a href="student/legg_til_student.php">Registrer student</a></li>
            <li><a href="student/vis_student.php">Vis alle studenter</a></li>
            <li><a href="student/slett_student.php">Slett student</a></li>
        </ul>
    </div>
</body>
</html>