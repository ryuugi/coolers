<?php 
    require_once("./includes/__customers.php");
    $data = new dataFetch();
    $products = $data->data()['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coolers Delight</title>
    <link rel="stylesheet" href="./assets/css/menu.css">
</head>
<body>

    <div class="wrapper">
        <div class="menu">

            <div>

            </div>

            <div class="row">

                <?php 
                    if ($products->num_rows > 0) {
                        while ($prod_data = $products->fetch_array()) {
                            ?>
                                <div class="col">
                                    <div class="card">
                                        <h3><?php echo $prod_data['prod_name'] ?></h3>
                                        <p>P <?php echo number_format($prod_data['prod_price'],2) ?> </p>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>

            </div>
        </div>
    </div>     

</body>
</html>