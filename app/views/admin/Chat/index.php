<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Общий чат</h1>
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

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="card-title">Общий чат</h3>
                        <div class="card-tools">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                <i class="fas fa-comments"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="direct-chat-messages">
                            <div class="direct-chat-msg" id="chat-result">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                </div>
                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>
                            </div>
<!--                            <div class="direct-chat-msg right">-->
<!--                                <div class="direct-chat-infos clearfix">-->
<!--                                    <span class="direct-chat-name float-right">Sarah Bullock</span>-->
<!--                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>-->
<!--                                </div>-->
<!--                                <img class="direct-chat-img" src="/docs/3.0/assets/img/user3-128x128.jpg" alt="message user image">-->
<!--                                <div class="direct-chat-text">-->
<!--                                    You better believe it!-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="direct-chat-msg">-->
<!--                                <div class="direct-chat-infos clearfix">-->
<!--                                    <span class="direct-chat-name float-left">Alexander Pierce</span>-->
<!--                                    <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>-->
<!--                                </div>-->
<!--                                <img class="direct-chat-img" src="/docs/3.0/assets/img/user1-128x128.jpg" alt="message user image">-->
<!--                                <div class="direct-chat-text">-->
<!--                                    Working with AdminLTE on a great new app! Wanna join?-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="direct-chat-msg right">-->
<!--                                <div class="direct-chat-infos clearfix">-->
<!--                                    <span class="direct-chat-name float-right">Sarah Bullock</span>-->
<!--                                    <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>-->
<!--                                </div>-->
<!--                                <img class="direct-chat-img" src="/docs/3.0/assets/img/user3-128x128.jpg" alt="message user image">-->
<!--                                <div class="direct-chat-text">-->
<!--                                    I would love to.-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <!--/.direct-chat-messages-->
                        <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user1-128x128.jpg">
                                        <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                  </span>
                                            <span class="contacts-list-msg">How have you been? I was...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user7-128x128.jpg">
                                        <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Sarah Doe
                                    <small class="contacts-list-date float-right">2/23/2015</small>
                                  </span>
                                            <span class="contacts-list-msg">I will be waiting for...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user3-128x128.jpg">
                                        <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Nadia Jolie
                                    <small class="contacts-list-date float-right">2/20/2015</small>
                                  </span>
                                            <span class="contacts-list-msg">I'll call you back at...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user5-128x128.jpg">
                                        <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Nora S. Vans
                                    <small class="contacts-list-date float-right">2/10/2015</small>
                                  </span>
                                            <span class="contacts-list-msg">Where is your new...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user6-128x128.jpg">
                                        <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    John K.
                                    <small class="contacts-list-date float-right">1/27/2015</small>
                                  </span>
                                            <span class="contacts-list-msg">Can I take a look at...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user8-128x128.jpg">
                                        <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Kenneth M.
                                    <small class="contacts-list-date float-right">1/4/2015</small>
                                  </span>
                                            <span class="contacts-list-msg">Never mind I found...</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
<!--                        <form action="#" method="post">-->
<!--                            <div class="input-group">-->
<!--                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">-->
<!--                                <span class="input-group-append">-->
<!--                              <button type="button" class="btn btn-primary">Send</button>-->
<!--                            </span>-->
<!--                            </div>-->
<!--                        </form>-->
                        <form id="chat" action="">
                            <div class="chat-result" id="chat-result">
                                <input type="hidden" name="chat-user" id="chat-user" value="<?= $_SESSION['user']['name'];?>">
                                <input type="text" name="chat-message" id="chat-message" placeholder="Сообщение">
                                <input type="submit" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>