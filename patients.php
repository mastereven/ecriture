<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Patients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <a href="index.php"></a>
    <a href="ajout-patient.php">Créer un compte patient</a><br>
    <a href="connexion.php">Se connecter</a>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=hospitale2n", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully<br>";

        $stmt = $conn->prepare("SELECT * FROM patients");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Birth Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Profile</th>
                  </tr>";

            foreach ($result as $row) {
                $id = htmlspecialchars($row["id"]);
                $url = "profile-patient.php?id=$id";

                echo "<tr>
                            <td>$id</td>
                            <td>" . htmlspecialchars($row["lastname"]) . "</td>
                            <td>" . htmlspecialchars($row["firstname"]) . "</td>
                            <td>" . htmlspecialchars($row["birthdate"]) . "</td>
                            <td>" . htmlspecialchars($row["phone"]) . "</td>
                            <td>" . htmlspecialchars($row["mail"]) . "</td>
                            <td><a href='$url'>$id</a></td>
                          </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>

</html>