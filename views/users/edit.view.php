<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>



            <form class="row g-3" action="/users/update" method="post">

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="col-12">

                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control <?php echo !isset($errors["name"]) ? '' : 'is-invalid' ?>" id="inputAddress" name="name" value="<?php echo $user['name'] ?? ""; ?> ">
                    <?php if (isset($errors['name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['name'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">User Name</label>
                    <input type="text" class="form-control <?php echo !isset($errors["user_name"]) ? '' : 'is-invalid' ?>" id="inputAddress" name="user_name" value="<?php echo $user['username'] ?? ""; ?>">
                    <?php if (isset($errors['user_name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['user_name'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control <?php echo !isset($errors["email"]) ? '' : 'is-invalid' ?>" id="inputEmail4" name="email" value="<?php echo $user['email'] ?? ""; ?>">
                    <?php if (isset($errors['email'])) : ?>
                        <div class="invalid-feedback"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                </div>


                <div class="col-12">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="number" class="form-control <?php echo !isset($errors["phone"]) ? '' : 'is-invalid' ?>" id="inputAddress" name="phone" value="<?php echo $user['phone'] ?? ''; ?>">
                    <?php if (isset($errors['phone'])) : ?>
                        <div class="invalid-feedback"><?= $errors['phone'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label  rounded-2 <?php echo !isset($errors["group"]) ? '' : 'is-invalid' ?>">Select Group</label>
                    <select class=" form-select form-select-lg col-12 pb-3" aria-label="Default select example" name="group_id" aria-placeholder="<?php echo $user['group_name'] ?? ''; ?>">

                        <option value="<?php echo $user['group_id'] ?>" selected><?php echo $user['group_name']; ?></option>;

                        <?php foreach ($group_name as $name) {
                            if ($name['name'] != $user['group_name'])  echo "<option value=$name[id]>$name[name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control  <?php echo !isset($errors["password"]) ? '' : 'is-invalid' ?>" id="inputPassword4" name="password">
                    <?php if (isset($errors['password'])) : ?>
                        <div class="invalid-feedback"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-2 mx-2"><input type="submit" class="btn btn-success" value="Create"></div>



            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<?php require base_path('views/partials/footer.php') ?>