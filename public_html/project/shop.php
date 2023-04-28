<?php
require_once(__DIR__ . "/../../partials/nav.php");

//nff4 4/28/23
$products = [];
$db = getDB();
$query = "SELECT id, name, description, category, stock, unit_price, image, visibility from Products WHERE stock > 0 AND visibility = 1";
$params = null;
$sort = "";
$name_search = "";
$category_search = "";

if (isset($_GET["name_search"])) {
    $name_search = se($_GET, "name_search", "", false);
    if ($name_search != "") {
        $query .= " AND name LIKE :name_search";
        $params[":name_search"] = "%$name_search%";
    }
}
if (isset($_GET["category_search"])) {
    $category_search = se($_GET, "category_search", "", false);
    if ($category_search != "") {
        $query .= " AND category LIKE :category_search";
        $params[":category_search"] = "%$category_search%";
    }
}
if (isset($_GET["sort"])) {
    if (se($_GET, "sort", "", false) != "") {
        $sort = se($_GET, "sort", "", false);
        $query .= " ORDER BY $sort";
    }
}

$query .= " LIMIT 10";

//var_dump($query);
//var_dump($params);

$stmt = $db->prepare($query);
try {
    if ($params == null) {
        $stmt->execute();
    }
    else {
        $stmt->execute($params);
    }

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $products = $results;
        //var_dump($products);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}

?>

<div class="container-fluid">
    <h1 class="title">Shop</h1>
    <div style="margin-top:20px">
        <form id="search-form" method="GET" class="row row-cols-lg-auto g-3 align-items-center" >
            <div class="input-group mb-3" >
                <?php if (se($_GET, "name_search", "", false)) : ?>
                    <input class="form-control" type="search" name="name_search" placeholder="Name Filter" value=<?php echo($name_search)?> />
                    <input class="btn btn-primary" style="margin-right: 12px;" type="submit" value="Search Name"/>
                <?php else : ?>
                    <input class="form-control" type="search" name="name_search" placeholder="Name Filter" style="margin-right:1px" />
                    <input class="btn btn-primary" style="margin-right: 12px;" type="submit" value="Search Name"/>
                <?php endif; ?>
                <?php if (se($_GET, "category_search", "", false)) : ?>
                    <input class="form-control" type="search" name="category_search" placeholder="Category Filter" value=<?php echo($category_search)?> />
                    <input class="btn btn-primary" type="submit" value="Search Category"/>
                <?php else : ?>
                    <input class="form-control" type="search" name="category_search" placeholder="Category Filter" style="margin-right:1px" />
                    <input class="btn btn-primary" type="submit" value="Search Category"/>
                <?php endif; ?>
                <select name="sort" id="sort" style="margin-left:12px">   
                    <!-- None, Name, Category, Stock, Price -->
                        <option type="submit" class="form-control" style="font-weight: bold;" value="" <?php if ($sort == "") : ?> selected <?php endif;?>><strong>Sort By: </strong></option>
                        <option type="submit" class="form-control" value="unit_price DESC" <?php if ($sort == "unit_price DESC") : ?> selected <?php endif;?>>Price DESC</option>
                        <option type="submit" class="form-control" value="unit_price ASC" <?php if ($sort == "unit_price ASC") : ?> selected <?php endif;?>>Price ASC</option>
                        <option type="submit" class="form-control" value="stock DESC" <?php if ($sort == "stock DESC") : ?> selected <?php endif;?>>Stock DESC</option>
                        <option type="submit" class="form-control" value="stock ASC" <?php if ($sort == "stock ASC") : ?> selected <?php endif;?>>Stock ASC</option>
                        <option type="submit" class="form-control" value="name DESC" <?php if ($sort == "name DESC") : ?> selected <?php endif;?>>Name DESC</option>
                        <option type="submit" class="form-control" value="name ASC" <?php if ($sort == "name ASC") : ?> selected <?php endif;?>>Name ASC</option>
                        <option type="submit" class="form-control" value="category DESC" <?php if ($sort == "category DESC") : ?> selected <?php endif;?>>Category DESC</option>
                        <option type="submit" class="form-control" value="category ASC" <?php if ($sort == "category ASC") : ?> selected <?php endif;?>>Category ASC</option>
                </select>
            </div>
        </form>                     
    </div>
    <div>
        <?php if (empty($products)) : ?>
                <h1>Sorry, there are no products available right now... come back and check later!</h1>
        <?php else : ?>
            <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4" >
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
                                <h5 class="card-title">Stock: <?php $stock = se($product, "stock", 0, false); echo(number_format($stock)); ?></h5>
                            </div>
                            <div class="card-footer">
                                <h5 style="display:inline-block;">
                                    Price: $<?php $ppu = se($product, "unit_price", 0.00, false); echo(number_format($ppu, 2)); ?>
                                </h5>
                                <div style="text-align:left; display:inline-block;">
                                    <form method="POST" action="cart.php" style="text-align:left; display:inline-block;">
                                        <input type="hidden" name="product_id" value="<?php se($product, "id");?>"/>
                                        <input type="hidden" name="action" value="add"/>
                                        <input type="number" name="desired_quantity" value="1" min="1" max="<?php se($product, "stock");?>"/>
                                        <input type="submit" class="btn btn-primary" value="Add"/>
                                    </form>                               
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
        <?php endif; ?>
    </div>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>

<script>
    // Get the select element
    const selectElement = document.getElementById("sort");

    // Add an event listener to the select element
    selectElement.addEventListener("change", function() {
    // Get the form element
    const formElement = document.getElementById("search-form");

    // Submit the form
    formElement.submit();
});
</script>

<script>
    function addToCart(product) {
        console.log("TODO purchase product", product);
        alert("It's almost like you purchased an product, but not really");
        //obsolete now
    }
</script>