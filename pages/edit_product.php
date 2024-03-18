<?php
session_start();
include "../models/products.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
};
$row = getItemById($id)->fetch_assoc();
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
require "../templates/navigation.php";
?>

<?php ?>

<form class="max-w-sm mx-auto mt-10" method="POST" action="../controllers/edit_item.php">
    <div class="mb-5">
        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naziv
            proizvoda</label>
        <input type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               value="<?php echo $row["naziv"]; ?>"
               name="product_name">

    </div>
    <div class="mb-5">
        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boja</label>
        <input type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               value="<?php echo $row["boja"]; ?>"
               name="product_color">
    </div>
    <div class="mb-5">
        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategorija</label>
        <input type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               value="<?php echo $row["kategorija"]; ?>"
               name="product_category">
    </div>
    <div>
        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cena</label>
        <input type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               value="<?php echo $row["cena"]; ?>"
               name="product_price">
    </div>
    <input type="number" name="product_id" value="<?php echo $id ?>" readonly class="hidden">

    <div class="flex justify-between">
        <input
                class="mt-6 block select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="submit"
                value="Edit"
        >
        <form method="POST" action="../controllers/delete_item.php">
            <input type="number" name="product_id" value="<?php echo $id ?>" class="hidden">
            <input
                    class="mt-6 block select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="submit"
                    value="Delete"
                    onclick="return confirm('Da li ste sigurni da želite obrisati ovaj proizvod?')"
            >
        </form>

    </div>


</form>


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