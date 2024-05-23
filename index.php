<?php


const API_URL = 'https://whenisthenextmcufilm.com/api';
#inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);

// indicar que queremos recibir el resultado de la peticion sin recibirla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
Y GUARDAMOS EL RESULTADO

*/

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);



?>

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="La descripcion de la nueva pelicula de marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
    <title>La proxima película de marvel</title>
</head>

<main>

    <!-- <pre style="font-size: 35px; overflow: scroll; height: 450px;">
        <?php var_dump($data); ?>
    </pre> -->

    <section>

        <img src="<?= $data['poster_url']; ?>" width='300' alt='poster de <?= $data["title"]; ?>' style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"];?> dias </h3>
        <p>Fecha de estreno: <?= $data["release_date"] ?> </p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>

</main>




<style>
    :root {
        color-scheme: light dark;
    }

    body {

        display: grid;
        place-content: center;

    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    image {
        margin: 0 auto;
    }
</style>