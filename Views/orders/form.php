<h3><?= $headingTitle ?></h3>
<div class="container">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label"> Name</label>
            <input type="text" id="name" name="name" value="<?= $order->name ?? null ?>" class="form-control" placeholder="Name..." />
            <?= $errorMessage['name']['required'] ?? null ?>
        </div>

        <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
            <input type="text" name="amount" value="<?= $order->amount ?? null ?>" class="form-control" placeholder="Amount..." />
            <?= $errorMessage['amount']['required'] ?? null ?>
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label">Price</label>
            <input type="text" name="price" value="<?= $order->price ?? null ?>"class="form-control" placeholder="Price..." />
            <?= $errorMessage['price']['required'] ?? null ?>
        </div>

        <div class="form-group row">
            <button type="submit" <!--name="btn-save"-->>Save Family</button>
        </div>
    </form>
</div>