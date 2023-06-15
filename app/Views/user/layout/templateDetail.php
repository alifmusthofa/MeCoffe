<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Pembayaran</title>
    <style>
    header {
        background-color: #a79323;
        color: #fff;
        padding: 20px;
    }

    footer {
        background-color: #98b920;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
    }

    .card {
        margin: 20px;
        min-width: max-content;
        min-height: 350px;
    }

    .menu-item {
        list-style-type: none;
        margin: 20px;
        padding: 0;

    }

    .payment-options {
        text-align: left;
    }

    .payment-card {
        display: inline-block;
        margin: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 150px;
    }


    .payment-card p {
        margin-top: 10px;
    }
    </style>
</head>


<header>
    <div class="container">
        <h1>My E-commerce Store</h1>
    </div>
</header>


<body>
    <div>

        <div class="content">

            <?= $this->renderSection('content'); ?>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>
<footer class="align-self-end">
    <div>
        <p>&copy; 2023 My E-commerce Store. All rights reserved.</p>
    </div>
</footer>





</html>