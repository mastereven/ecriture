<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    <a href="index.php">Retour Acceuil</a>
    <h1>Se connecter</h1>
    <form action="connexion-traitement.php" method="post">
        <ul>
            <li>
                <label for="mail">Entrez votre adresse mail : </label>
                <input type="mail" id="email" name="mail" required>
            </li>
            <li class="button">
                <button type="submit">Envoyer</button>
            </li>
        </ul>
    </form>
</body>

</html>