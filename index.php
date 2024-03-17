<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

</head>
<body>
<?php
require "templates/navigation.php";
?>
<?php if (isset($_SESSION["registered"]) && $_SESSION["registered"] === true) : ?>
<?php require "templates/table_template.php";?>
<?php else: ?>

<?php
require "templates/registration_form.php"
?>
<?php endif; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(".nav-toggler").each(function (_, navToggler) {
            var target = $(navToggler).data("target");
            $(navToggler).on("click", function () {
                $(target).animate({
                    height: "toggle"
                });
            });
        });
    });

</script>
</body>
</html>