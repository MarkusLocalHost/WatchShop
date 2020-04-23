<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Очистка кеша</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Очистка кеша</li>
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
                    <div class="card-body table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Кеш категорий</td>
                                        <td>Меню категорий на сайте. Кешируется на 1 час</td>
                                        <td>
                                            <a href="<?=ADMIN;?>/cache/delete?key=category"><i class="fas fa-times text-danger delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Кеш фильтров</td>
                                        <td>Кеш фильтров и групп фильтров . Кешируется на 1 час</td>
                                        <td>
                                            <a href="<?=ADMIN;?>/cache/delete?key=filter"><i class="fas fa-times text-danger delete"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

