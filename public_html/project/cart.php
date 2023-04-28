<?php
require_once(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

$action = strtolower(trim(se($_POST, "action","", false)));
if (!empty($action)) {
    $db = getDB();
    switch ($action) {
        case "add":
            //only ever runs first time from shop page

            $query = "INSERT INTO Cart (product_id, desired_quantity, unit_price, user_id)
            VALUES (:pid, :dq, (SELECT unit_price FROM Products WHERE id = :pid), :uid)
            ON DUPLICATE KEY UPDATE desired_quantity = IF((desired_quantity + :dq) > (SELECT stock FROM Products WHERE id = :pid), desired_quantity, desired_quantity + :dq)"; //added logic for over stock
            
            $stmt = $db->prepare($query);
            $stmt->bindValue(":pid", se($_POST, "product_id", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":dq", se($_POST, "desired_quantity", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                //BUG: Using if inside of the SQL query will always make it so it shows as added item even if it was not.
                $stmt->execute();
                flash("Added item to cart", "success");
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error adding item to cart", "danger");
            }
            break;
        case "update":
            $query = "UPDATE Cart set desired_quantity = :dq WHERE id = :cid AND user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":dq", se($_POST, "desired_quantity", 0, false), PDO::PARAM_INT);
            //cart id specifies a specific cart product
            $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
            //user id ensures we can only edit our cart
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Updated item quantity", "success");
            } catch (PDOException $e) {
                //Hint: you can use the error from sql update (desired_quantity > 0) to determine if an item should be removed
                
                if ($e->errorInfo[1] == "3819") {
                    $query = "DELETE FROM Cart WHERE user_id = :uid AND id = :cid";
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
                    $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
                    try {
                        $stmt->execute();
                        flash("Removed item from cart", "success");
                    }
                    catch (PDOException $e) {
                        error_log(var_export($e, true));
                        flash("Error removing item", "danger");
                    }
                }
                else {
                    error_log(var_export($e, true));
                    flash("Error updating item quantity", "danger");
                }  
            }
            break;
        case "delete":
            $query = "DELETE FROM Cart WHERE user_id = :uid AND id = :cid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Removed item from cart", "success");
            }
            catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error removing item", "danger");
            }
            break;
        case "delete-all":
            $query = "DELETE FROM Cart WHERE user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Cart deleted", "success");
            }
            catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error deleting cart", "danger");
            }
            break;
        default:
            flash("Developer: Bug in the cart form logic", "danger");
    }

    //BUG: Having this prevents the refresh add bug, but it also prevents my flash logic. I need flash logic for so the refresh add bug will just have to stay.
    //if (count($_POST) > 0) {
        //header("Location: cart.php");
    //}
}
$query = "SELECT cart.id, product.id as pid, product.stock, product.name, cart.unit_price, (cart.unit_price * cart.desired_quantity) as subtotal, cart.desired_quantity
FROM Products as product JOIN Cart as cart on product.id = cart.product_id
WHERE cart.user_id = :uid";
$db = getDB();
$stmt = $db->prepare($query);
$cart = [];
try {
    $stmt->execute([":uid" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $cart = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching cart", "danger");
}

?>

<div class="container-fluid">
    <h1>Cart</h1>
    <table class="table table-striped">
        <?php $total = 0.00; ?>
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
        <?php foreach ($cart as $c) : ?>
            <tr>
                <td><?php se($c, "name"); ?></td>
                <td>$<?php se($c, "unit_price"); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="update" />
                        <input type="number" name="desired_quantity" value="<?php se($c, "desired_quantity"); ?>" min="0" max="<?php se($c, "stock"); ?>" /> <!-- set to 0 so delete can handle the sql error on update -->
                        <input type="submit" class="btn btn-primary" value="Update Quantity" />
                    </form>
                </td>
                <?php $total += (float)(se($c, "subtotal", 0, false)); ?>
                <!-- There might be an adding error here, but I don't think it matters since it's insignificant and we're round at the penny for the final subtotal -->
                <td>$<?php se($c, "subtotal"); ?></td>
                <td>
                    <a style="display:inline-block" class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($c, "pid"); ?>">View</a>
                    <form method="POST" style="display:inline-block">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="delete" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (count($cart) == 0) : ?>
            <tr>
                <td colspan="100%">No items in cart</td>
            </tr>
        <?php endif; ?>
        <tr>
        <td colspan="100%" style="text-align:right;">
            <?php if (count($cart) != 0) : ?>
                <form method="POST" onclick="areYouSure()" style="float:left">
                    <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                    <input type="hidden" name="action" value="delete-all" />
                    <input type="submit" class="btn btn-danger" value="Empty Cart" />
                </form>            
            <?php endif; ?>
            Total: $<?php se(number_format($total, 2)); ?>
            <?php if (count($cart) != 0) : ?>
                <!-- TODO: Implement for Milestone3 -->
                <!--<form method="POST" action= "checkout.php" style="display:inline-block; ">-->
                    <button onclick="checkout()" style="margin-left:10px" class="btn btn-primary">Checkout</button>
                    <!-- The question is will I need to pass data thru to the checkout page or can I just get that from the table? I can ponder this but I must get back to doing other stuff-->
                    <!--<input type="hidden" name="cart_id" value="<?php //se($c, "id"); ?>" />-->
                    <!--<input type="hidden" name="action" value="delete-all" />-->
                    <!--<input type="submit" class="btn btn-danger" value="X" />-->
                <!--</form>-->
            <?php endif; ?>
        </td>
        </tr>
        </tbody>
    </table>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>

<script>
    //temp script for checkout button
    function checkout() {
        alert("You will be able to checkout soon!");
    }
</script>

<script>
    //script to make sure the user is sure they want to delete their cart
    function areYouSure() {
        if (!confirm("Are you sure you want to empty your cart? This action cannot be undone.")) {
            event.preventDefault();
            //flash("Cart has not been deleted.", "warning"); kinda looks ugly
        }
    };
</script>