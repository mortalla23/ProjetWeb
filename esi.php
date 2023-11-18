<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des Jeux</title>

</head>

</br><body>

 

<h2></br></br></br>Liste des Jeux</h2>

 

<table border="1">

    <tr>

        <th>ID</th>

        <th>Nom</th>

        <th>Image</th>

        <th>Règles PDF</th>

        <th>Action</th>

    </tr>

 

    <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)) : ?>

       

        <tr>

            <td><?= $row['ID'] ?></td>

            <td><?= $row['NOM'] ?></td>

           

            <td><img src="assets/image/<?= $row['FILE']?>" width="100px" height="100px"></td>

            <td><a href="assets/pdf/<?= $row['REGLES_PDF']?> ">Règle de jeu</a></td>

           

 

            <td>

                <a href="editjeux.php?id=<?= $row['ID'] ?>">Modifier</a>

                <a href="listjeux.php?delete=<?= $row['ID'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce jeu?')">Supprimer</a>

            </td>

        </tr>

    <?php endwhile; ?>

 

</table>

 

</body>

</html>

 