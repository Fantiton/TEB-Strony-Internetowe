<?php 
    $con = new mysqli("localhost", "root", "", "egzamin_próbny_2");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wakacje Marzeń</title>
    <?php 
        if (isset($_POST['sw'])) {
            echo '<link rel="stylesheet" href="styl_1b.css">';
        }else{
            echo '<link rel="stylesheet" href="styl_1.css">';
        }
    ?>
</head>
<body>
    <div id="topLeft">
        <img id="logo" src="logo.png" alt="nasze logo">
    </div>
    <div id="topRight">
        <h1>Biuro Turystyczne - Wakacje Marzeń</h1>
    </div>
    <header id="header">
        <h1>Na tej stronie znajdziesz noclegi w wybranej miejscowości</h1>
    </header>
    <div id="mainLeft">
        <div id="mainLeftLeft">
            <table id="table">
                <tr>
                    <td><h3>miejscowość</h3></td>
                    <td><h3>rodzaj noclegu</h3></td>
                </tr>
                <tr>
                    <td>
                        <?php 
                            $sql = "SELECT * FROM miejscowosc";
                            $res = $con->query($sql);
                            if ($res) {
                                while ($row=$res->fetch_assoc()) {
                                    echo $row['id'] . ' ' . $row['nazwa'] . '<br>';
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            $sql = "SELECT * FROM rodzaj";
                            $res = $con->query($sql);
                            if ($res) {
                                while ($row=$res->fetch_assoc()) {
                                    echo $row['id'] . ' ' . $row['nazwa'] . '<br>';
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <form action="noclegi.php" method="post">
                <input type="submit" name="sw" id="mLButton" value="Wersja dla osób słabowidzących">
            </form>
        </div>
        <div id="mainLeftRight">
            <img id="mainLeftImg" src="morze.jpg" alt="wybrzeże">
        </div>
    </div>
    <div id="mainRight">
        <img id="mainRightImg" src="góry.jpg" alt="góry">
        <form action="noclegi.php" method="post">
            <h4>Wpisz poniżej numery</h4>
            <label class="numInputLabel">miejscowości</label>
            <input type="number" name="towns" class="numInput"><br>
            <label class="numInputLabel">rodzaj noclegu</label>
            <input type="number" name="rodzaj" class="numInput"><br>
            <input type="submit" class="numInputSubmit" value="WYBIERZ">
            <input type="submit" class="numInputSubmit" value="WYCZYŚĆ">
            <br>
            <?php 
                if (isset($_POST['towns'])) {
                    $sql = "SELECT cennik.cena FROM cennik JOIN miejscowosc ON cennik.miejscowosc_id = miejscowosc.id JOIN rodzaj ON cennik.rodzaj_id = rodzaj.id WHERE miejscowosc.id = '" . $_POST['towns'] . "' AND rodzaj.id = '" . $_POST['rodzaj'] . "'";
                    $res = $con->query($sql);
                    if ($res) {
                        while ($row=$res->fetch_assoc()) {
                            echo '<span class="bold"> Cena noclegu dla jednej osoby: </span>' . $row["cena"] . '<br>';
                        }
                    }
                }
            ?>
        </form>
    </div>
    <footer id="footer">
        adres: ul. Wakacyjna 12 Wrocław, telefon: 123123123, email: biuro.turystyczne@wp.pl
    </footer>
</body>
</html>
<?php 
    mysqli_close($con);
?>