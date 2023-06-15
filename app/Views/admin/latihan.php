<html>

<head>
    <title>Tutorial Login dan Register</title>
</head>

<body>
    <?php $session = session() ?>
    <h4>Selamat datang admin!</h4>
    <?php echo $session->get('username') ?>
    <a href="/auth/logout">Logout</a>
    <br>
    <?php echo var_dump($_SESSION); ?>
</body>

</html>