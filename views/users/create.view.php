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
                    <input type="text" class="form-control" id="inputAddress" placeholder="Full Name">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="User Name">
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>


                <div class="col-12">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="inputAddress" placeholder="User Name">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Select Group</label>
                    <select class=" form-select form-select-lg col-12 pb-3" aria-label="Default select example">
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>





            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<?php require base_path('views/partials/footer.php') ?>