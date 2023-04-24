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
                    <h1 class="m-0">Create Group</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Create Groups</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">Create Group</h3>
            </div>
            <form action="/groups" method="post">
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputName1">Group Name</label>
            <input type="text" name="name" class="form-control <?php echo !isset($errors["name"])?'':'is-invalid'?>" value="<?=$old['name']??''?>" id="exampleInputName1" placeholder="Enter Name">
            <?php if (isset($errors['name'])) : ?>
                <div class="invalid-feedback"><?= $errors['name'] ?></div>
            <?php endif; ?>
            </div>
            <div class="form-group">
            <label for="exampleInputDescription1">Group Description</label>
            <textarea class="form-control <?php echo !isset($errors["description"])?'':'is-invalid';?>"  name="description" id="exampleInputDescription1" placeholder="Group Description"><?=$old['description']??''?></textarea>
            <?php if (isset($errors['description'])) : ?>
                <div class="invalid-feedback"><?= $errors['description'] ?></div>
            <?php endif; ?>
            </div>
            <div class="col-sm-6">

            <div class="form-group">
            <label>Select Icon</label>
            <select class="form-control drop-down selectpicker <?php echo !isset($errors["icon"])?'':'is-invalid';?>" name="icon">
                
            <?php foreach($icons as $icon){?>

            <option value="<?=$icon["name"]?>" data-content="<i class='fa fas <?=$icon['name']?>'></i> <?=$icon['name']?>" <?=$old['icon']==$icon['name']?'selected':''?>></option>
            <?php }?>
            </select>
            <?php if (isset($errors['icon'])) : ?>
                <div class="invalid-feedback"><?= $errors['icon'] ?></div>
            <?php endif; ?>
            </div>
            </div>
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            </div>
            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    
</script>
<?php require base_path('views/partials/footer.php') ?>