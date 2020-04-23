<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Редактирование пользователя</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/user">Список пользователей</a></li>
                    <li class="breadcrumb-item active">Редактирование пользователя</li>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Основная информация</h3>
                    </div>
                    <form class="needs-validation" action="<?=ADMIN;?>/user/edit" method="post" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="login">Логин</label>
                                <input type="text" name="login" class="form-control" id="login" value="<?=h($user->login);?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль, если хотите его изменить">
                            </div>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?=h($user->name);?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?=h($user->email);?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="email" name="address" class="form-control" id="address" value="<?=h($user->address);?>" required>
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user" <?php if($user->role == 'user') echo ' selected';?>>Пользователь</option>
                                    <option value="admin" <?php if($user->role == 'admin') echo ' selected';?>>Администратор</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="<?=$user->id;?>">
                            <button type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </form>
                </div>

                <h3>Заказы пользователя</h3>
                <div class="card">
                    <div class="card-body">
                        <?php if($orders): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($orders as $order): ?>
                                        <?php if ($order['status'] == "2"){$class = "table-primary";}
                                        elseif ($order['status'] == "3"){$class = "table-primary";}
                                        elseif ($order['status'] == "4"){$class = "table-success";}
                                        elseif ($order['status'] == "10"){$class = "table-danger";};?>
                                        <tr class="<?=$class;?>">
                                            <td><?=$order['id'];?></td>
                                            <td>
                                                <?php if($order['status'] == "0"){$order['status'] = 'Новый';}
                                                elseif ($order['status'] == "1"){$order['status'] = 'Сборка на складе';}
                                                elseif ($order['status'] == "2"){$order['status'] = 'Отправка';}
                                                elseif ($order['status'] == "3"){$order['status'] = 'В пути';}
                                                elseif ($order['status'] == "4"){$order['status'] = 'Доставлен';}
                                                elseif ($order['status'] == "10"){$order['status'] = 'Отменен';}?>
                                                <?php echo $order['status'];?>
                                            </td>
                                            <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                            <td><?=$order['date'];?></td>
                                            <td><?=$order['update_at'];?></td>
                                            <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-danger">Пользователь пока ничего не заказывал...</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Дополнительная информация</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
