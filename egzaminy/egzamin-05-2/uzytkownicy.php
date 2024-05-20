<?php 
    $con = new mysqli("localhost", "root", "", "filcel-egzamin-05");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <div id="headerLeft">
            <h2>Nasze Osiedle</h2>
        </div>
        <div id="headerRight">
            <?php 
                $sql = 'SELECT COUNT(*) as c FROM dane';
                $res = $con->query($sql);
                if ($res->num_rows>0) {
                    while ($row=$res->fetch_assoc()) {
                        echo 'liczba użytwkoników portalu: ' . $row['c'];
                    }
                }
            ?>
        </div>
    </header>
    <div id="left">
        <h3>Logowanie </h3>
        <form action="uzytkownicy.php" method="post">
            <label class="loginLabel">Login: </label><br>
            <input type="text" name="login" class="loginInput"><br>
            <label class="loginLabel">Hasło: </label><br>
            <input type="password" name="password" class="loginInput"><br>
            <input type="submit" value="Zaloguj">
        </form>
    </div>
    <div id="right">
        <h3>Wizytówka</h3>
        <div id="wizytowka">
            <?php 
                if (isset($_POST['login']) && isset($_POST['password'])) {
                    $sql = 'SELECT haslo FROM uzytkownicy WHERE login = "' . $_POST['login'] . '"';
                    $res = $con->query($sql);
                    if ($res->num_rows>0) {
                        while ($row=$res->fetch_assoc()) {
                            if (sha1($_POST['password']) == sha1($row['haslo'])) {
                                $sql2 = 'SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login = "' . $_POST['login'] . '"';
                                $res2 = $con->query($sql2);
                                while ($row2=$res2->fetch_assoc()) {
                                    $wiek = intval(date('Y')) - $row2['rok_urodz'];
                                    echo '
                                        <img src="' . $row2['zdjecie'] . '" alt="osoba">
                                        <h4>' . $row2['login'] . ' (' . $wiek . ')</h4>
                                        <p>Hobby: ' . $row2['hobby'] . '</p>
                                        <h1><img src="icon-on.png">' . $row2['przyjaciol'] . '</h1>' . //Zdjęcie dotarło do mnie zepsute :/
                                        '<form action="dane.html">
                                            <input id="wizytowkaButton" type="submit" value="więcej informacji">
                                         </form>';
                                }
                            }else{
                                echo 'hasło nieprawidłowe';
                            }
                        }
                    } else{
                        echo 'Login nie istnieje';
                    }
                }
            ?>
        </div>
    </div>
    <footer>
        Stronę wykonał: 9812u3912
    </footer>
</body>
</html>
<?php 
    mysqli_close($con);
?>