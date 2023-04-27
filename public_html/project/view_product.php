<?php
require_once(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";
$id = se($_GET, "id", -1, false);

//get the table definition
$result = [];
$db = getDB();
//get the item
$stmt = $db->prepare("SELECT name, description, category, stock, unit_price, image, visibility, created, modified FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        $name = se($product, "name", "", false);
        $desc = se($product, "description", "", false);
        $cat = se($product, "category", "", false);
        $stock = se($product, "stock", 0, false);
        $ppu = se($product, "unit_price", 0.00, false);
        $image = se($product, "image", "https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png", false);
        $vis = se($product, "visibility", "", false);
        $created = se($product, "created", "", false);
        $modified = se($product, "modified", "", false);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

if ($vis == 0 && !has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("shop.php")));
}
?>

<div class="container-fluid" style="text-align:center; padding:30px;">
    <h1 style="padding:5px;"><?php echo($name); ?></h1>
    <img src="<?php echo($image); ?>" alt="<?php echo($name);?><?php echo("-Image");?>" >
    <h4 >Product ID: <?php echo($id); ?></h4>
    <h4>Category: <?php echo($cat); ?></h4>
    <h4>Description: <?php echo($desc); ?></h4>
    <?php if ($vis == 1): ?>
        <h4>Visibility: <?php echo("Public"); ?></h4>
    <?php else: ?>
        <h4>Visibility: <?php echo("Private"); ?></h4>
    <?php endif; ?>
    <h4>Created: <?php echo($created); ?></h4>
    <h4>Modified: <?php echo($modified); ?></h4>
    <h4>Stock: <?php echo($stock);; ?></h4>
    <h4>Price: <?php echo($ppu); ?></h4>
    <div>
        <?php if ($vis == 1): ?>
            <form method="POST" action="cart.php">
                <input type="hidden" name="item_id" value="<?php se($item, "id");?>"/>
                <input type="hidden" name="action" value="add"/>
                <input type="number" name="desired_quantity" value="1" min="1" max="<?php se($product, "stock");?>"/>
                <input type="submit" class="btn btn-primary" value="Add"/>
            </form>
        <?php endif; ?>
        <?php if (has_role("Admin")): ?>
            <a class="btn btn-primary" href="<?php echo('/project/admin/edit_product.php?id='); ?><?php echo($id);; ?>">Edit</a>
        <?php endif; ?>
    </div>
    <a class="btn btn-primary" href="<?php echo(get_url("shop.php")); ?>">Back to Shop</a>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");