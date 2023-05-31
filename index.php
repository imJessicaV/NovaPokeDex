<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>PokeAPI</title>
</head>

<body>
    <div class="header"> <!--menu e barra de pesquisa-->
        <h1>PokeDex</h1>
        <form action="index.php" method="get"> <!--formulário para buscar o id do pokemon-->
            <input type="text" name="id">
            <input type="submit" value="Buscar">
        </form>
    </div><!-- header -->
    <div class="center">

        <div class="poke-card-img">
            <?php
            function apiImg() //função para buscar os dados da API
            {
                $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["id"]; //url da API
                $pokemon = json_decode(file_get_contents($url)); //transforma o json em um objeto
                echo "<img src='" . $pokemon->sprites->front_shiny . "'>";
            }
            apiImg();
            ?>
        </div><!-- poke-card-img -->
        <div class="poke-card">
            <div class="geral">
                <?php
                function api() //função para buscar os dados da API
                {
                    $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["id"]; //url da API
                    $pokemon = json_decode(file_get_contents($url)); //transforma o json em um objeto
                    echo "<h2>".$pokemon->name ." N ". $pokemon->id . "</h2>";
                    echo "<h3>Altura: " . $pokemon->height . "</h3>";
                    echo "<h3>Peso: " . $pokemon->weight . "</h3>";
                    echo "<ul> <br>";
                }

                api();
                ?>
            </div><!-- geral -->
            <div class="tipo">
                <?php
                function apiTipo() //função para buscar os dados da API
                {
                    $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["id"]; //url da API
                    $pokemon = json_decode(file_get_contents($url)); //transforma o json em um objeto
                    foreach ($pokemon->types as $type) { //foreach para percorrer o array de tipos
                        echo "<h2>Tipo</h2>";
                        echo "<h3>" . $type->type->name . "</h3>";
                    }
                }
                apiTipo();
                ?>
            </div><!-- tipo -->
            <div class="habilidades">
                <?php
                function apiHabilidades() //função para buscar os dados da API
                {
                    $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["id"]; //url da API
                    $pokemon = json_decode(file_get_contents($url)); //transforma o json em um objeto
                    echo "<ul> <br>";
                    echo "<ul> <br>";
                    echo "<h3>Habilidades</h2><br>";
                    foreach ($pokemon->abilities as $ability) { //foreach para percorrer o array de habilidades
                        echo "<br><li>" . $ability->ability->name . "</li><br>";
                    }
                    echo "</ul>";
                }
                apiHabilidades();
                ?>
            </div><!-- habilidades -->
        </div><!-- poke-card -->
    </div><!-- center -->
</body>

</html>