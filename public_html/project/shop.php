<?php
require_once(__DIR__ . "/../../partials/nav.php");

$products = [];
$db = getDB();
$query = "SELECT id, name, description, category, stock, unit_price, image, visibility from Products WHERE stock > 0 AND visibility = 1";
$params = null;
if (isset($_POST["product"])) {
    $search = se($_POST, "product", "", false);
    if ($search != "") {
        $query .= " AND (name LIKE :product OR category LIKE :product) ";
        $params =  [":product" => "%$search%"];
    }
}
if (isset($_POST["sort"])) {
    $sort = se($_POST, "sort", "", false);
    if ($sort != "none") {
        $query .= " ORDER BY :sort desc";
        $params = [":sort" => $sort];
    }
}

$query .= " LIMIT 10";

$stmt = $db->prepare($query);
try {
    echo("Inside try");
    if ($params == null) {
        $stmt->execute();
    }
    else {
        $stmt->execute($params);
    }

    $p = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($p) {
        $products = $p;
        echo($products);
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

<?php //TODO: ADD FILTER AND SORT?>
<div class="container-fluid">
    <h1>Shop</h1>
    <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4">
        <form method="POST" class="row row-cols-lg-auto g-3 align-items-center" style="display:inline-block">
            <div class="input-group mb-3" >
                <input class="form-control" type="search" name="product" placeholder="Product Filter"/>
                <input class="btn btn-primary" type="submit" value="Search"/>
            </div>
        </form>
        <form method="POST" class="row row-cols-lg-auto g-3 align-items-center" style="display:inline-block">
            <div class="input-group mb-3" style="display:inline-block">
                <select name="sort" id="sort">   
                    <!-- None, Name, Category, Stock, Price -->
                    <option class="form-control" value="none">Sort By: </option>
                    <option class="form-control" value="name">Name</option>
                    <option class="form-control" value="category">Category</option>
                    <option class="form-control" value="stock">Stock</option>
                    <option class="form-control" value="unit_price">Price</option>
            </div>
        </form>
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
                        <!-- <h5 class="card-title">Description: <?php //se($product, "description"); ?></h5> -->
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