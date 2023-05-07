<?php
require_once(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

$db = getDB();
$query = "SELECT id, user_id FROM Orders ORDER BY created DESC LIMIT 1";
$stmt = $db->prepare($query);
try {
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $OrderID = $result["id"];
    if ($result["user_id"] != get_user_id()) {
        flash("That is not your order!", "warning");
        die(header("Location: shop.php"));
    }
} 
catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error getting Order ID", "danger");
}

//$query = "SELECT * FROM Orders as orders JOIN OrderItems as orderItems on orders.id = orderItems.order_id WHERE orders.user_id = :uid"; use this for history
$query = "SELECT *, (orderItems.unit_price * orderItems.quantity) as subtotal FROM Orders as orders JOIN OrderItems as orderItems on orders.id = orderItems.order_id WHERE orders.id = :oid AND orders.user_id = :uid";
$db = getDB();
$stmt = $db->prepare($query);
$orderItems = [];
try {
    $stmt->execute([":oid" => $OrderID, ":uid" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $orderItems = $results;
        //var_dump($orderItems);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching order", "danger");
}

$query = "SELECT name FROM Products WHERE id = :id";
$iterable = 0;
foreach ($orderItems as $i):
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":id" => se($i, "product_id", "", false)]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $products = $results;
            $orderItems[$iterable]["name"] = $products[0]["name"];
            $iterable++;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching products", "danger");
    }
endforeach;

?>

<div class="container-fluid">
    <h1>Thank you for shopping at Nick's Clothing Store!</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($orderItems as $i) : ?>
            <tr>
                <td><?php se($i, "name"); ?></td>
                <td>$<?php se(number_format($i["unit_price"], 2)); ?></td>
                <td><?php se(number_format($i["quantity"])); ?></td>
                <td>$<?php se(number_format($i["subtotal"], 2)); ?></td>
                <td>
                    <a style="display:inline-block" class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($i, "product_id"); ?>">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Amount Paid</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Time Ordered</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$<?php se(number_format($i["total_price"], 2)); ?></td>
                <td><?php se($i, "payment_method"); ?></td>
                <td>$<?php se(number_format($i["money_received"], 2)); ?></td>
                <td><?php se($i, "first_name"); ?></td>
                <td><?php se($i, "last_name"); ?></td>
                <td><?php se($i, "address"); ?></td>
                <td><?php se($i, "created"); ?></td>
                
                <!-- saving for history page <td>
                    <a style="display:inline-block" class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($c, "pid"); ?>">View</a>
                    <form method="POST" style="display:inline-block">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="delete" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td> -->

            </tr>
        </tbody>
    </table>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>