<h3><?= $headingTitle ?></h3>

<div class="container">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Family name</label>
            <input type="text" id="name" name="name" value="<?= $family->name ?? null ?>" class="form-control" placeholder="Name" />
            <?= $errorMessage['name'] ?? null ?>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Address</label>
            <input type="text" name="address" value="<?= $family->address ?? null ?>" class="form-control" placeholder="Address" />
            <?= $errorMessage['address'] ?? null ?>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Phone</label>
            <input type="text" name="phone" value="<?= $family->phone ?? null ?>" class="form-control" placeholder="Phone" />
            <?= $errorMessage['phone'] ?? null ?>
        </div>

        <div class="form-group row">
           <button type="submit" <!--name="btn-save"-->>Save Family</button>
        </div>
    </form>
</div>