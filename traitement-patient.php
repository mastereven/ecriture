<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Patient</title>
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

            $lastName = isset($_POST["name"]) ? $_POST["name"] : 'null';
            $firstname = isset($_POST["firstName"]) ? $_POST["firstName"] : 'null';
            $birthdate = isset($_POST["dateOfBirth"]) ? $_POST["dateOfBirth"] : 'null';
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : 'null';
            $mail = isset($_POST["mail"]) ? $_POST["mail"] : 'null';

            $getmail = "SELECT mail FROM patients WHERE mail=:mail";
            $query = $conn->prepare($getmail);
            $query->bindParam(":mail", $mail);
            $query->execute();
            $email = $query->fetch();

            if ($email) {
                echo '<p>Mail déjà utilisé, veuillez vous <a href="connexion.php">connecter</a></p>';
            } elseif ($lastName && $firstname && $birthdate && $phone && $mail) {
                $insertSql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
                $stmt = $conn->prepare($insertSql);
                $stmt->bindParam(':lastname', $lastName);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':birthdate', $birthdate);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':mail', $mail);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $lastId = $conn->lastInsertId();
                    echo "<p>Bonjour {$lastName} {$firstname}, votre compte à été créé, vous allez être redirigé dans 5 secondes.</p>
                    <div id='waiting'>
                        <img src='https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExMXl4ZTRuM2Z0YnBxNXY3Mm5wOGw3dnRjemNwNjk3Z3Exd2VlcWhzbiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/jAYUbVXgESSti/giphy.gif' alt='Chargement...' />
                    </div>
                    <style>
                    body 
                    {
                    background-color: #ECF0F1;
                    }
                    #waiting 
                    {
                    display: flex;
                    justify-content: center;
                    }
                    ";
                    header("Refresh:5; url=http://localhost/loic/TP_PDO/ecriture/connexion.php");
                    exit;
                } else {
                    echo '<strong>Erreur : les informations que vous avez saisies sont incorrectes.</strong>';
                    header("Refresh:1; url=http://localhost/loic/TP_PDO/ecriture/ajout-patient.php");
                }
            } else {
                echo '<strong>Erreur : les informations que vous avez saisies sont incorrectes.</strong>';
                header("Refresh:3; url=http://localhost/loic/TP_PDO/ecriture/ajout-patient.php");
            }
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
    ?>

</body>
<script></script>

</html>