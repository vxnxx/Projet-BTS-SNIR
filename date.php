<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Choisir la date</title>
</head>

<body>
    <form class="form mt-2" action="php/datePick.php" method="post">
        <label class="phpLabel">Veuillez choisir la date pour laquelle vous désirez voir l'historique</label>
        <input type="text" class="flatpickr" name="date">
        <input type="submit" value="Choisir la date">
    </form>

    <script>
        flatpickr(".flatpickr", {
            dateFormat: "Y-m-d",
        });
    </script>
</body>

</html>