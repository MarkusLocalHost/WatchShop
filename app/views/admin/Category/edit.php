<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Редактирование категории <?=$category->title;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/category">Список категорий</a></li>
                    <li class="breadcrumb-item active"><?=$category->title;?></li>
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
                    <form class="needs-validation" action="<?= ADMIN; ?>/category/edit" method="post" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Наименование категории</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Наименование категории" value="<?=h($category->title);?>" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым!
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cackeKey' => 'admin_select',
                                    'attrs' => [
                                        'name' => 'parent_id',
                                        'id' => 'parent_id'
                                    ],
                                    'class' => 'form-control',
                                    'prepend' => '<option value="0">Самостоятельная категория</option>',
                                ]);?>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords"
                                       placeholder="Ключевые слова" value="<?=h($category->keywords);?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание категории</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       placeholder="Описание категории" value="<?=h($category->description);?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="<?=$category->id;?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>



