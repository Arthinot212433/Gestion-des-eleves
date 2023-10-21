<!DOCTYPE html>
<html>
<head>
    <title>Gestion du Cahier de Texte</title>
    <style>
        /* Style pour l'effet de fond sombre */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Fond sombre semi-transparent */
            z-index: 1;
        }

        /* Style pour l'alerte */
        .alert-box {
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: transparent;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 2;
        }
    </style>
</head>
<body>
    <h1>Insertion dans le Cahier de Texte</h1>
    <form action="inserer.php" method="POST">
        <label>Nom du Professeur:</label>
        <input type="text" name="nom_prof" required><br><br>

        <label>Niveau de l'Élève:</label>
        <input type="text" name="lib_Niveau" required><br><br>

        <label>Salle:</label>
        <input type="text" name="salle" required><br><br>

        <label>Date:</label>
        <input type="date" name="date" required><br><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br><br>

        <input type="submit" value="Insérer">
    </form>

    <h1>Cahier de Texte</h1>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            // Afficher l'effet de fond sombre et l'alerte
            echo '<div class="overlay"></div>';
            echo '<div class="alert-box">';
            echo '<p>Les données ont été insérées avec succès.</p>';
            echo '</div>';
        }
        ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom du Professeur</th>
            <th>Niveau de l'Élève</th>
            <th>Salle</th>
            <th>Date</th>
            <th>Description</th>
        </tr>
        <?php
        // Connexion à la base de données (à personnaliser)
        try {
            require('../db_conn.php'); // Incluez ici votre fichier de connexion PDO

            // Requête SQL pour récupérer les données
            $sql = "SELECT * FROM cahiers";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($result)) {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nom_prof'] . "</td>";
                    echo "<td>" . $row['lib_Niveau'] . "</td>";
                    echo "<td>" . $row['salle'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucune entrée trouvée</td></tr>";
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
        }
        ?>
         
    </table>

    <script>
        // Fermer l'alerte après 4 secondes
        setTimeout(function() {
            document.querySelector('.overlay').style.display = 'none';
            document.querySelector('.alert-box').style.display = 'none';
        }, 4000);
        
        // Fermer l'alerte lorsque l'utilisateur clique en dehors de celle-ci
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('overlay')) {
                document.querySelector('.overlay').style.display = 'none';
                document.querySelector('.alert-box').style.display = 'none';
            }
        });
    </script>
</body>
</html>
