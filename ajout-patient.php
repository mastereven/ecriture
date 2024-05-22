<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrer un Nouveau Patient</title>
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
            max-width: 500px;
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

        input[type="text"],
        input[type="date"],
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
    <a href="index.php">Retour index</a><br>
    <a href="connexion.php">Se connecter</a>
    <h1>Entrer un nouveau patient:</h1>
    <form action="traitement-patient.php" method="post">
        <ul>
            <li>
                <label for="name">Nom :</label>
                <input type="text" id="lastName" name="name" required>
            </li>
            <li>
                <label for="prenom">Prénom :</label>
                <input type="text" id="fName" name="firstName" required>
            </li>
            <li>
                <label for="birthdate">Date de naissance :</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" required>
            </li>
            <li>
                <label for="phone">Numéro de téléphone : </label>
                <input type="text" id="phone" name="phone" required>
            </li>
            <li>
                <label for="mail">Entrez votre adresse mail : </label>
                <input type="mail" id="email" name="mail" required>
            </li>
            <li class="button">
                <button type="submit">Envoyer</button>
            </li>
        </ul>

    </form>
    
    </style>
</body>

</html>