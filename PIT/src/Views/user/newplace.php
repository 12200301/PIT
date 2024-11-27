<!DOCTYPE html>
<html lang="pt-br">

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
    .form-newplace {
        --input-focus: #2d8cf0;
        --font-color: #323232;
        --font-color-sub: #666;
        --bg-color: #fff;
        --main-color: #323232;
        padding: 20px;
        background: lightgrey;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 20px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
        width: 300px;
    }

    .title-form-newplace {
        color: var(--font-color);
        font-weight: 900;
        font-size: 20px;
        margin-bottom: 25px;
    }

    .title-form-newplace span {
        color: var(--font-color-sub);
        font-weight: 600;
        font-size: 17px;
    }

    .input-form-newplace {
        width: 250px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 15px;
        font-weight: 600;
        color: var(--font-color);
        padding: 5px 10px;
        outline: none;
    }

    .input-form-newplace::placeholder {
        color: var(--font-color-sub);
        opacity: 0.8;
    }

    .input-form-newplace:focus {
        border: 2px solid var(--input-focus);
    }

    .newplace-with {
        display: flex;
        gap: 20px;
    }

    .button-log {
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 100%;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        color: var(--font-color);
        font-size: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .button-log:active,
    .button-send:active {
        box-shadow: 0px 0px var(--main-color);
        transform: translate(3px, 3px);
    }

    .button-send {
        margin: 50px auto 0 auto;
        width: 120px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 17px;
        font-weight: 600;
        color: var(--font-color);
        cursor: pointer;
    }

    .container-newplace {
        width: 100%;
        height: 750px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .all {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <?php include('views/components/header.php'); ?>
    <div class="all">
        <iframe
            src="https://docs.google.com/forms/d/e/1FAIpQLSeqnwk_tYFsLjN6oAPZTMvoLCwkXRmhn63oTT5NjTVQQVJQAA/viewform?embedded=true"
            width="640" height="870" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>
    </div>
    <script src="javascript.js"></script>
</body>

</html>