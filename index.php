
<?php
session_start();
require('db_conn.php');
$msg = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['username'];
        header("location: login.php");
    } else {
        $msg = "Veuillez entrer des informations valides !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLYMORPH</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="video-bg">
        <video width="320" height="240" autoplay loop muted>
            <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
        </video>
    </div>
    <div class="login-box">
    <img class="image" src="./POLYMORPH ICONE@4x.png">
        <div class="text">
            <h2>Se Connecter</h2>
            <form method="post" action="">
                <div class="user-box">
                    <input type="text" name="username" required="">
                    <label for="username">Nom d'utilisateur</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Mot de passe</label>
                </div>
            
                <button type="submit" name="submit" class="btn submit-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Connecter
                </button>
                 <br><br>
                <div class="error">
                    <?php echo $msg ?>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script  src="./script.js"></script>
</body>
</html>
