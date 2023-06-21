<!DOCTYPE html>
<html>

<head>
    <title>Login MeCoffe</title>
    <style>
    body {
        background-color: #f1f1f1;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 40px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
    }

    .form-group button:hover {
        background-color: #45a049;
    }

    .form-group .signup-link {
        text-align: center;
        margin-top: 10px;
    }

    .form-group .signup-link a {
        color: #337ab7;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <?php
    $session = session();
    $login = $session->getFlashdata('login');
    $username = $session->getFlashdata('username');
    $password = $session->getFlashdata('password');
    ?>

    <div class="container">
        <h2>Login Admin</h2>

        <?php if ($username) { ?>
        <p style="color:red"><?php echo $username ?></p>
        <?php } ?>

        <?php if ($password) { ?>
        <p style="color:red"><?php echo $password ?></p>
        <?php } ?>

        <?php if ($login) { ?>
        <p style="color:green"><?php echo $login ?></p>
        <?php } ?>

        <form action="/auth/valid_login" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>

    </div>
</body>

</html>