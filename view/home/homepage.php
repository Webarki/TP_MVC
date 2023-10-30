<h1 class="text-center mt-5">Bienvenue</h1>
<p class="text-center mt-5">
    <?php if ($_SESSION['token'] === $user->token && $user->token === $_GET['token']) {
        var_dump($_SESSION["token"]);
        var_dump($user->token);
        var_dump($_GET["token"]);  ?>
        <?= $_SESSION['email'] ? $_SESSION['email'] : '' ?>
    <?php } else {
        header('location:index.php?logout');
    } ?>
</p>