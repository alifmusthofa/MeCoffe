<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>User Dashboard</title>
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
    </style>
</head>


<header>
    <div class="container">
        <h1>My E-commerce Store</h1>
    </div>
</header>


<body>
    <div>
        <div class="d-flex">
            <div class="sidebar">
                <ul class="menu-item">

                    <li>
                        <div>
                            <div class="d-flex">
                                <form class="d-flex" action="" method="GET" enctype="multipart/form-data">

                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search" name="keyword">
                                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </li>

                    <li style="margin-top:20px ;">
                        <form class="form-group" action="" method="GET" enctype="multipart/form-data">
                            <label for="ukuran">Filter Ukuran</label>
                            <select class="form-control" name="ukuran" onchange="this.form.submit()">
                                <option selected value="">None</option>
                                <?php foreach ($ukuran as $p) : ?>
                                <option value="<?= $p->name ?>"><?= $p->name  ?></option>
                                <?php endforeach ?>
                            </select>
                        </form>
                    </li>

                    <li>
                        <a href="<?= base_url('/user/dashboard') ?>">link ini</a>
                    </li>

                </ul>
            </div>
            <div class="content">

                <?= $this->renderSection('content'); ?>

            </div>
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