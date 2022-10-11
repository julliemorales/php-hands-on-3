<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="display-4">
                <?php if ($user['id']): ?>
                    Update user <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                    Add New Product
                <?php endif ?>
            </p>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Product Name <span class="text-danger">*</span></label>
                    <input name="name" value="<?php echo $user['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Price <span class="text-danger">*</span></label>
                    <input name="price" value="<?php echo $user['price'] ?>"
                           class="form-control <?php echo $errors['price'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['price'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Discount</label>
                    <input class="form-control" name="discount" value="<?php echo $user['discount'] ?>">
                </div>
                <div class="form-group">
                    <label># Sold <span class="text-danger">*</span></label>
                    <input name="sold" value="<?php echo $user['sold'] ?>"
                           class="form-control  <?php echo $errors['sold'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['sold'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Location <span class="text-danger">*</span></label>
                    <input name="location" value="<?php echo $user['location'] ?>"
                           class="form-control  <?php echo $errors['location'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['location'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
