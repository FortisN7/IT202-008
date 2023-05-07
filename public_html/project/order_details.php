<?php
require_once(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";
$OrderID = se($_GET, "order_id", -1, false);

//get the table definition
$result = [];
$db = getDB();
//get the order
$query = "SELECT *, (orderItems.unit_price * orderItems.quantity) as subtotal FROM Orders as orders JOIN OrderItems as orderItems on orders.id = orderItems.order_id WHERE orders.id = :oid";
$db = getDB();
$stmt = $db->prepare($query);
$orderItems = [];
try {
    $stmt->execute([":oid" => $OrderID]);
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

$query = "SELECT username FROM Users WHERE id = :id";
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":id" => se($i, "user_id", "", false)]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $products = $results;
            $orderItems[0]["username"] = $products[0]["username"];
            $iterable++;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching products", "danger");
    }

//var_dump($orderItems);
?>

<div class="container-fluid">
    <h1>Order ID: <?php se($OrderID); ?> by <?php se($orderItems[0]["username"]); ?></h1>
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
                <!--<th>Last Name</th>-->
                <!--<th>Address</th>-->
                <th>Time Ordered</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$<?php se(number_format($i["total_price"], 2)); ?></td>
                <td><?php se($i, "payment_method"); ?></td>
                <td>$<?php se(number_format($i["money_received"], 2)); ?></td>
                <td><?php se($i, "first_name"); ?></td>
                <!--<td><?php se($i, "last_name"); ?></td>-->
                <!--<td><?php se($i, "address"); ?></td>-->
                <td><?php se($i, "created"); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>