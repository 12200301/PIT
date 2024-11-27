<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
    body {
        height: 1000px;
    }

    .all {
        height: 300px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    #img {
        width: 100px;
        margin-left: 176px;
    }

    #card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #div-card {
        height: 300px;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <?php include('views/components/header.php'); ?>
    <div class="all">
        <div class="card" id="div-card">
            <img src="https://www.freeiconspng.com/uploads/error-icon-32.png" alt="img-error" class="card-img-top"
                id="img">
            <div class="container" id="card">
                <p>Você não pode acessar esta página porque não está logado</p>
                <button class="btn btn-outline-secondary" type="button" style="width:100px;margin-bottom:25px"><a
                        href="index.php?action=login" style="text-decoration:none">Entrar</a></button>
                <button class=" btn btn-outline-secondary" type="button" style="width:100px"><a
                        href="index.php?action=home" style="text-decoration:none">Home</a></button>
            </div>

            </form>
        </div>
    </div>
    <script src="javascript.js"></script>
</body>

</html>