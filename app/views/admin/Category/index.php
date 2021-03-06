<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Список категорий</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список категорий</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/category_admin.php',
                                'container' => 'div',
                                'cache' => 0,
                                'cackeKey' => 'admin_cat',
                                'class' => 'list-group list-group-root well',
                            ]);?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->