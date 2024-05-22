<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrer un Nouveau Patient</title>
    <a href="index.php">Retour Acceuil</a>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f9f9f9;
        }

        a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="mail"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new PDO("mysql:host=$servername;dbname=hospitale2n", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";

            $mail = isset($_POST["mail"]) ? $_POST["mail"] : 'null';

            $getmail = "SELECT * FROM patients WHERE mail=:mail;";
            $query = $conn->prepare($getmail);
            $query->bindParam(":mail", $mail);
            $query->execute();
            $email = $query->fetch();

            $getprofile = $conn->prepare("SELECT * FROM patients WHERE mail=:mail");
            $getprofile->bindParam(':mail', $mail);
            $getprofile->execute();

            $profilepatient = $getprofile->fetch(PDO::FETCH_ASSOC);
            $url = "profile-patient.php?id=" . $profilepatient['id'];
            if ($profilepatient) {
                echo '
                <p>Ravi de vous revoir ' . $profilepatient['lastname'] . ' ' . $profilepatient['firstname'] . '</p>
                <a href="index.php">Accueil</a>
                <a href="' . htmlspecialchars($url) . '">Mon compte</a>
                ';
            } else {
                echo '<strong>Erreur : les informations que vous avez saisies sont incorrectes.</strong>';
                header("Refresh:2; url=http://localhost/loic/TP_PDO/ecriture/connexion.php");
                exit;
            }
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
    ?>
</body>

</html>