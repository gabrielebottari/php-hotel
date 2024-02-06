<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    /* Stampa i dati degli hotel
    echo '<ul>';
    foreach ($hotels as $hotel) {
        echo '<li>';
        echo '<strong>Nome:</strong> ' . $hotel['name'] . '<br>';
        echo '<strong>Descrizione:</strong> ' . $hotel['description'] . '<br>';
        echo '<strong>Parcheggio:</strong> ' . ($hotel['parking'] ? 'Si' : 'No') . '<br>';
        echo '<strong>Voto:</strong> ' . $hotel['vote'] . ' stelle<br>';
        echo '<strong>Distanza dal centro:</strong> ' . $hotel['distance_to_center'] . ' km';
        echo '</li>';
    }
    echo '</ul>';
    */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-success-subtle text-success">

    <header>
        <div class="container p-5">
            <h1 class="text-center">PHP Hotel</h1>
        </div>
    </header>


    <main>
        <div class="container">
        <table class="table table-info table-bordered border-success table-striped-columns table-hover text-success">
            <thead>
                <tr>
                    <th class="text-success">Nome</th>
                    <th class="text-success">Descrizione</th>
                    <th class="text-success">Parcheggio</th>
                    <th class="text-success">Voto</th>
                    <th class="text-success">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hotels as $hotel) {
                    echo '<tr>';
                    echo '<td>' . $hotel['name'] . '</td>';
                    echo '<td>' . $hotel['description'] . '</td>';
                    echo '<td>' . ($hotel['parking'] ? 'Si' : 'No') . '</td>';
                    echo '<td>' . $hotel['vote'] . ' stelle</td>';
                    echo '<td>' . $hotel['distance_to_center'] . ' km</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
         </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>