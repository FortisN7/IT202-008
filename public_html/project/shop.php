<?php
require_once(__DIR__ . "/../../partials/nav.php");

$products = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, image, visibility from Products WHERE stock > 0 AND visibility = 1 LIMIT 10");
try {
    $stmt->execute();
    $p = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($p) {
        $products = $p;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
?>

<script>
    function addToCart(product) {
        console.log("TODO purchase product", product);
        alert("It's almost like you purchased an product, but not really");
        //TODO create JS helper to update all show-balance elements
    }
</script>

<div class="container-fluid">
    <h1>Shop</h1>
    <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4">
        <?php foreach ($products as $product) : ?>
            <div class="col">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 style="text-align: center;"><?php se($product, "name"); ?></h3>
                    </div>
                    <?php if (se($product, "image", "", false)) : ?>
                        <img src="<?php se($product, "image"); ?>" class="card-img-top" alt="<?php se($product, "name");?><?php echo("-Image");?>" >
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title">Category: <?php se($product, "category"); ?></h5>
                        <!-- <h5 class="card-title">Description: <?php se($product, "description"); ?></h5> -->
                        <h5 class="card-title">Stock: <?php se($product, "stock"); ?></h5>
                    </div>
                    <div class="card-footer">
                        <h5 style="display:inline;">
                            Price: <?php se($product, "unit_price"); ?>
                        </h5>
                        <div style="text-align: right; display:inline;">
                            <button onclick="addToCart('<?php se($product, 'id'); ?>')" class="btn btn-primary">Add</button>
                            <a class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($product, "id"); ?>">View</a>
                             <?php if (has_role("Admin")): ?>
                                <a class="btn btn-primary" href="<?php echo('admin/edit_product.php?id='); ?><?php se($product, "id"); ?>">Edit</a>
                            <?php endif; ?>
                        </div>  
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>