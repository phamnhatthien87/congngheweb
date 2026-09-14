<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <?php
        $product_description = $_POST['product_description'] ?? '';
        $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
        $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);

        if ($list_price === false || $list_price === null ||
            $discount_percent === false || $discount_percent === null) {
            $error_message = 'Please enter valid numeric values for List Price and Discount Percent.';
        } else {
            $discount_amount = $list_price * ($discount_percent / 100);
            $discount_price = $list_price - $discount_amount;
        }
        ?>

        <h1>Product Discount Calculator</h1>

        <?php if (isset($error_message)) : ?>
            <p><?php echo htmlspecialchars($error_message); ?></p>
        <?php else : ?>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span>$<?php echo number_format($list_price, 2); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo number_format($discount_percent, 2); ?>%</span><br>

        <label>Discount Amount:</label>
        <span>$<?php echo number_format($discount_amount, 2); ?></span><br>

        <label>Discount Price:</label>
        <span>$<?php echo number_format($discount_price, 2); ?></span><br>
        <?php endif; ?>
    </main>
</body>
</html>
