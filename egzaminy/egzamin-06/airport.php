<?php 
    if (!isset($_COOKIE['cookie'])) {
        $user = 'new';
        setcookie('cookie', 'cookie', time() + 3600, '/'); 
    }else{
        $user = 'old';
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty Samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header id="header">
        <div id="left-header">
            <h2>Odloty z lotniska</h2>
        </div>
        <div id="right-header">
            <img src="zad6.png" alt="logotyp">
        </div>
    </header>
    <div id="main">
        <h4>Tabela Odlotów</h4>
        <table>
            <tr>
                <th>
                    lp.
                </th>
                <th>
                    Numer Rejsu
                </th>
                <th>
                    Czas
                </th>
                <th>
                    Kierunek
                </th>
                <th>
                    Status
                </th>
            </tr>
            <?php 
            $con = new mysqli('localhost', 'root', '', 'filcel-egzamin-06');
            $sql = 'SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC';
            $res = $con->query($sql);
            if($res->num_rows>0){
                while ($row=$res->fetch_assoc()) {
                    echo '<tr><td>' . $row['id'] . '</td><td>' . $row['nr_rejsu'] . '</td><td>' . $row['czas'] . '</td><td>' . $row['kierunek'] . '</td><td>' . $row['status_lotu'] . '</td></tr>';
                }
            }

            mysqli_close($con);
            ?>
        </table>
    </div>
    <footer id="footer">
        <div id="left-footer">
            <a target="_blank" href="kw1.png">Pobierz Obraz</a>
        </div>
        <div id="top-footer">
            <?php 
                if ($user == 'new') {
                    echo '<p style="font-style: italic;">Dzień Dobry! Sprawdź regulamin naszej strony </p>';
                } else {
                    echo '<p style="font-weight: bold;">Miło nam, że nas znowu odwiedziłeś </p>';
                }
            ?>
        </div>
        <div id="right-footer">
            Autor: 1230982372
        </div>
    </footer>
</body>

</html>
