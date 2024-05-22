<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f9f9f9;
            background-image: url('chemin_vers_votre_image.jpg');
            background-size: cover;
            background-position: center;
        }

        h1 {
            color: #333;
            font-size: 2em;
            text-align: center;
            margin-top: 40px;
        }

        p {
            color: #666;
            font-size: 1.1em;
            line-height: 1.5;
            margin-bottom: 20px;
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
            box-shadow: 0 0 10px rgba(76, 160, 73, 0.5);
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        button:hover {
            background-color: #45a049;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }

        @media screen and (max-width: 600px) {
            body {
                font-size: 18px;
            }

            h1 {
                font-size: 1.5em;
            }

            p {
                font-size: 1em;
            }
        }

        @keyframes loader {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
        }

        .loader {
            height: 4px;
            background: #4CAF50;
            width: 0%;
            animation: loader 2s forwards;
        }

        .lesliens {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <a href="patients.php">Liste des patients</a>
    <a href="index.php">Accueil</a>
    <div class="loader"></div>
    <?php
    $id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=hospitale2n", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `patients` WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $patientinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($patientinfo);
        // Création de l'URL custom
        $id = htmlspecialchars($patientinfo["id"]);
        $urlDelete = "delete-patient.php?id=" . $id;
        $urlUpdate = "update-patient.php?id=" . $id;

        var_dump($urlDelete);
        var_dump($urlUpdate);

        foreach ($patientinfo as $info) {
            echo "<div class='info'>";
            echo "Nom : " . $info['lastname'] . "<br>";
            echo "Prénom : " . $info['firstname'] . "<br>";
            echo "Date de naissance : " . $info['birthdate'] . "<br>";
            echo "Numéro de téléphone : " . $info['phone'] . "<br>";
            echo "Adresse email : " . $info['mail'];
            echo "</div><br>";

            echo "<div class='lesliens'>";
            echo "<a href='update-patient.php'>Modifier ce patient</a>";
            echo "<a href='" . $urlDelete . "'>Supprimer ce patient</a>";
            echo "</div>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    ?>



</body>

</html>