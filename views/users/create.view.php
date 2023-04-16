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



            <form class="row g-3" action="/users/store" method="post">


                <div class="col-12">

                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control <?php echo !isset($errors["name"]) ? '' : 'is-invalid' ?>" id="inputAddress" placeholder="Full Name" name="name">
                    <?php if (isset($errors['name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['name'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">User Name</label>
                    <input type="text" class="form-control <?php echo !isset($errors["user_name"]) ? '' : 'is-invalid' ?>" id="inputAddress" placeholder="User Name" name="user_name">
                    <?php if (isset($errors['user_name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['user_name'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control <?php echo !isset($errors["email"]) ? '' : 'is-invalid' ?>" id="inputEmail4" name="email">
                    <?php if (isset($errors['email'])) : ?>
                        <div class="invalid-feedback"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                </div>


                <div class="col-12">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="number" class="form-control <?php echo !isset($errors["phone"]) ? '' : 'is-invalid' ?>" id="inputAddress" placeholder="User Name" name="phone">
                    <?php if (isset($errors['phone'])) : ?>
                        <div class="invalid-feedback"><?= $errors['phone'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label <?php echo !isset($errors["group"]) ? '' : 'is-invalid' ?>">Select Group</label>
                    <select class=" form-select form-select-lg col-12 pb-3" aria-label="Default select example" name="group_id">
                        <?php foreach ($group_name as $name) {
                            echo "<option value=$name[id]>$name[name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control <?php echo !isset($errors["password"]) ? '' : 'is-invalid' ?>" id="inputPassword4" name="password">
                    <?php if (isset($errors['password'])) : ?>
                        <div class="invalid-feedback"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-2 mx-2"><input type="submit" class="btn btn-success"></div>



            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<?php require base_path('views/partials/footer.php') ?>