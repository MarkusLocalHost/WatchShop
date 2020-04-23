<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Новая валюта</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/currency">Список валют</a></li>
                    <li class="breadcrumb-item active">Новая валюта</li>
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
                    <form class="needs-validation" action="<?= ADMIN; ?>/currency/add" method="post" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Наименование валюты</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Наименование валюты" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code">Код валюты</label>
                                <input type="text" name="code" class="form-control" id="code"
                                       placeholder="Код валюты" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="symbol_left">Символ слева</label>
                                <input type="text" name="symbol_left" class="form-control" id="symbol_left"
                                       placeholder="Символ слева">
                            </div>
                            <div class="form-group">
                                <label for="symbol_right">Символ справа</label>
                                <input type="text" name="symbol_right" class="form-control" id="symbol_right"
                                       placeholder="Символ справа">
                            </div>
                            <div class="form-group">
                                <label for="value">Значение</label>
                                <input type="text" name="value" class="form-control" id="value"
                                       placeholder="Значение" pattern="^[0-9.]{1,}$" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым! Допускаются только цифры!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="base">
                                    <input type="checkbox" name="base">
                                    Базовая валюта
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
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


