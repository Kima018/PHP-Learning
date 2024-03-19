<?php
session_start();
include "../models/products.php"
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
<?php if (!isset($_SESSION["registered"])) : ?>
    <?php header("location:login_page.php"); ?>
<?php else: ?>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 flex justify-center">
                    Edit
                </th>
            </tr>
            </thead>
            <tbody>

            <?php
            $result = selectItems();
            if ($result->num_rows === 0): ?>
                <div>Nema Proizvoda !</div>
            <?php else: ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $row["naziv"]; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $row["boja"]; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row["kategorija"]; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row["cena"]; ?>&dollar;
                        </td>
                        <td class="px-6 py-4 flex justify-center">
                           <div class="flex gap-4">
                               <span><a href="../pages/edit_product.php?id=<?php echo $row['id']; ?>">Edit</a></span>
                               <form method="POST" action="../controllers/delete_item.php">
                                   <input type="number" name="product_id" value="<?php echo $row['id']; ?>" class="hidden">
                                   <input type="submit" value="delete" onclick="return confirm('Da li ste sigurni da želite obrisati ovaj proizvod?');" class="cursor-pointer bg-transparent">
                               </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="flex justify-center"><span class="border p-3"><a href="../pages/add_product.php">Add new item</a></span></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php endif; ?>





<dialog> test</dialog>
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