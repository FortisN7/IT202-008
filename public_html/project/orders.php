<?php
require_once(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

/*$db = getDB();
$query = "SELECT id FROM Orders ORDER BY created DESC LIMIT 10";
$stmt = $db->prepare($query);
try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $OrderIDs = $result;
} 
catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error getting Order IDs", "danger");
}*/

$query = "SELECT *, (orderItems.unit_price * orderItems.quantity) as subtotal FROM Orders as orders JOIN OrderItems as orderItems on orders.id = orderItems.order_id WHERE orders.user_id = :uid ORDER BY orders.created DESC LIMIT 10";
$db = getDB();
$stmt = $db->prepare($query);
$orderItems = [];
try {
    $stmt->execute([":uid" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $orderItems = $results;
        //var_dump($orderItems);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching orders", "danger");
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

//var_dump($orderItems);
?>
<div class="container-fluid">
    <h1>Your Most Recent Orders</h1>
    <br>
    <?php //$orderItems[$iterable]["order_id"] ?>
    <?php $prevOrderID = -1; ?>
    <?php $doneItems = false; ?>
    <?php for ($iterable = 0; $iterable < sizeof($orderItems); $iterable++) : ?>
        <?php $currOrderID = $orderItems[$iterable]["order_id"]; ?>
        <?php if ((isset($orderItems[$iterable+1]) && $currOrderID != $orderItems[$iterable+1]["order_id"]) || $iterable == sizeof($orderItems)-1) : ?>
            <?php $doneItems = true; ?>
        <?php endif; ?>
        <?php if ($prevOrderID != $currOrderID) : ?>
            <h3>Order ID: <?php se($currOrderID) ?></h3>
        <?php endif; ?>
        <table class="table table-striped" id="<?php se($currOrderID) ?>">
            <?php if ($prevOrderID != $currOrderID) : ?>
                <thead>
                    <tr>
                        <th style="width: 20%;">Product</th>
                        <th style="width: 20%;">Price</th>
                        <th style="width: 20%;">Quantity</th>
                        <th style="width: 20%;">Subtotal</th>
                        <th style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td><?php se($orderItems[$iterable]["name"]); ?></td>
                        <td>$<?php se(number_format($orderItems[$iterable]["unit_price"], 2)); ?></td>
                        <td><?php se(number_format($orderItems[$iterable]["quantity"], 0)); ?></td>
                        <td>$<?php se(number_format($orderItems[$iterable]["subtotal"], 2)); ?></td>
                        <td>
                            <a style="display:inline-block" class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($orderItems[$iterable]["product_id"]); ?>">View Item</a>
                        </td>
                    </tr>
                </tbody>
            <?php else : ?>
                <thead>
                    <tr>
                        <th style="width: 20%;">Product</th>
                        <th style="width: 20%;">Price</th>
                        <th style="width: 20%;">Quantity</th>
                        <th style="width: 20%;">Subtotal</th>
                        <th style="width: 20%;">Action</th>
                    </tr>
                </thead>
                    <tr>
                        <td><?php se($orderItems[$iterable]["name"]); ?></td>
                        <td>$<?php se(number_format($orderItems[$iterable]["unit_price"], 2)); ?></td>
                        <td><?php se(number_format($orderItems[$iterable]["quantity"], 0)); ?></td>
                        <td>$<?php se(number_format($orderItems[$iterable]["subtotal"], 2)); ?></td>
                        <td>
                            <a style="display:inline-block" class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($orderItems[$iterable]["product_id"]); ?>">View Item</a>
                        </td>
                    </tr>
                
            <?php endif; ?>
        </table>
        
        <?php if ($doneItems) : ?>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$<?php se(number_format($orderItems[$iterable]["total_price"], 2)); ?></td>
                        <td><?php se($orderItems[$iterable]["payment_method"]); ?></td>
                        <td>$<?php se(number_format($orderItems[$iterable]["money_received"], 2)); ?></td>
                        <td><?php se($orderItems[$iterable]["first_name"]); ?></td>
                        <td><?php se($orderItems[$iterable]["last_name"]); ?></td>
                        <td><?php se($orderItems[$iterable]["address"]); ?></td>
                        <td><?php se($orderItems[$iterable]["created"]); ?></td>         
                        <td>
                            <a style="display:inline-block" class="btn btn-primary" href="<?php echo('order_details.php?order_id='); ?><?php se($orderItems[$iterable]["order_id"]); ?>">View Order</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php $doneItems = false; ?>
            <br>
        <?php endif; ?>
        <?php $prevOrderID = $currOrderID; ?>
    <?php endfor; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>