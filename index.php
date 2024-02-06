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

    //Ottengo il filtro di parcheggio dalla richiesta GET, se specificato
    $filterParking = isset($_GET['parking']) ? $_GET['parking'] : '';
    //Ottengo il filtro di voto dalla richiesta GET, se specificato
    $filterRating = isset($_GET['rating']) ? intval($_GET['rating']) : '';

    $filteredHotels = [];
    foreach ($hotels as $hotel) {
        //Verifico se l'hotel soddisfa i criteri di filtro del parcheggio
        $parkingMatch = empty($filterParking) || ($filterParking == 'yes' && $hotel['parking']) || ($filterParking == 'no' && !$hotel['parking']);
        //Verifico se l'hotel soddisfa i criteri di filtro del voto
        $ratingMatch = empty($filterRating) || $hotel['vote'] >= $filterRating;
        
        //Se l'hotel soddisfa entrambi i filtri
        if ($parkingMatch && $ratingMatch) {
            $filteredHotels[] = $hotel;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

            <h2>Ricerca il tuo Hotel</h2>

            <form method="GET" class="mb-4">
                <div class="row">
                    <div class="col-5">
                        <label for="parking">Parcheggio</label>
                        <select class="form-control" id="parking" name="parking">
                            <option value="">Qualsiasi</option>
                            <option value="yes" <?php if ($filterParking == 'yes') echo 'selected'; ?>>Con Parcheggio</option>
                            <option value="no" <?php if ($filterParking == 'no') echo 'selected'; ?>>Senza Parcheggio</option>
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="rating">Voto minimo</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value="">Qualsiasi</option>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php if ($filterRating == $i) echo 'selected'; ?>><?php echo $i; ?> &starf; </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-2 align-self-end text-center">
                        <button class="btn btn-success" type="submit">Find Hotels!</button>
                    </div>
                </div>
            </form>

            <table class="table table-info table-bordered border-success table-striped-columns table-hover text-success">
                <thead>
                    <tr>
                        <th class="text-success">Nome</th>
                        <th class="text-success">Descrizione</th>
                        <th class="text-success">Parcheggio</th>
                        <th class="text-success">Stelle</th>
                        <th class="text-success">Distanza dal centro</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Se non ci sono hotel filtrati, mostra un messaggio -->
                    <?php if (empty($filteredHotels)): ?>
                    <tr>
                        <td colspan="5">Nessun hotel corrisponde ai filtri selezionati.</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($filteredHotels as $hotel): ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?> &starf;</td>
                        <td><?php echo $hotel['distance_to_center']; ?> Km</td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
         </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>