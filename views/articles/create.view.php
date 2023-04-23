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
                    <h1 class="m-0">Create articles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">home</a></li>
                        <li class="breadcrumb-item"><a href="/articles">articles</a></li>
                        <li class="breadcrumb-item">create article</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/article" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  class="form-control" name="title" id="title" placeholder="Enter article title here" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title'], ENT_QUOTES) : ''; ?>">
                        <?php if( isset($errors['title']) ): ?>
                            <span style="color: red ; font-weight: bolder;"><?= $errors['title'] ;?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="content">Article Image</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" accept="image/*" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <?php if( isset($errors['image']) ): ?>
                                <span style="color: red; font-weight: bolder;""><?= $errors['image'] ;?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" cols="10"  rows="4" name="content" id="content" placeholder="Enter article content"><?php echo isset($_POST['content']) ? htmlspecialchars($_POST['content'], ENT_QUOTES) : ''; ?></textarea>
                        <?php if( isset($errors['content']) ): ?>
                            <span style="color: red ; font-weight: bolder;"><?= $errors['content'] ;?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <textarea class="form-control" cols="10"  rows="2" name="summary" id="summary" placeholder="Enter article summary"><?php echo isset($_POST['summary']) ? htmlspecialchars($_POST['summary'], ENT_QUOTES) : ''; ?></textarea>
                        <?php if( isset($errors['summary']) ): ?>
                            <span style="color: red ; font-weight: bolder;"><?= $errors['summary'] ;?></span>
                        <?php endif; ?>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php require base_path('views/partials/footer.php') ?>
