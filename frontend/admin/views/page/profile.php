<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $mg = $result->partner->manager;
    $this->title = 'Profile';
?>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0"><?=$this->title;?></h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><?=Yii::$app->params['name'];?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Pages</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?=$this->title;?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(374px, 36px, 0px);">
                        <a class="dropdown-item" href="#">Chat</a>
                        <a class="dropdown-item" href="#">Calendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="profile-header mb-2">
                        <div class="relative">
                            <div class="cover-container">
                                <img class="img-fluid bg-cover rounded-0 w-100" src="/panel/images/profile/user-uploads/cover.jpg" alt="User Profile Image">
                            </div>
                            <div class="profile-img-container d-flex align-items-center justify-content-between">
                                <img src="<?=Scripts::site().'/img/img_avatar3.png';?>" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                <div class="float-right">
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 waves-effect waves-light">
                                        <i class="feather icon-edit-2"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary waves-effect waves-light">
                                        <i class="feather icon-settings"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center profile-header-nav">
                            <nav class="navbar navbar-expand-sm w-100 pr-0">
                                <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">Timeline</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">About</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">Photos</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">Friends</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">Videos</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">Events</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section id="profile-info">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Your personal manager</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
<!--                                        <i class="feather icon-more-horizontal cursor-pointer"></i>-->
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item disabled" href="#"><i class="feather icon-mail"></i>Write to the manager</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item disabled" href="#"><i class="feather icon-phone-call"></i>Call to the manager</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-start align-items-center mb-1">
                                    <div class="avatar mr-1">
                                        <img src="/panel/images/profile/user-uploads/user-01.jpg" alt="avtar img holder" height="45" width="45">
                                    </div>
                                    <div class="user-page-info">
                                        <p class="mb-0 font-weight-bold"><?=$mg->first_name;?> <?=$mg->last_name;?></p>
                                        <span class="font-small-2">
                                            <?=($mg->work_hours == '') ? 'no data' : '<i class="feather icon-clock"></i> work hours '.$mg->work_hours;?>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Email:</h6>
                                    <?=Html::tag('p', Scripts::mail($mg->email));?>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Skype:</h6>
                                    <?=Html::tag('p', Scripts::skype($mg->skype));?>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Website:</h6>
                                    <?=Html::tag('p', Html::a('https://affeliatpro.pro','https://affeliatpro.pro'));?>
                                </div>
                                <div class="mt-1">
                                    <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25 waves-effect waves-light"><i class="feather icon-facebook"></i></button>
                                    <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25 waves-effect waves-light"><i class="feather icon-twitter"></i></button>
                                    <button type="button" class="btn btn-sm btn-icon btn-primary p-25 waves-effect waves-light"><i class="feather icon-instagram"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
<div class="card overflow-hidden">
        <div class="card-header">
          <h4 class="card-title"><i class="feather icon-sliders"></i> Settings</h4> <button type="button" class="btn btn-primary block-element waves-effect waves-light" style="zoom: 1;">Save</button>
        </div>
        <div class="card-content">
          <div class="card-body">
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="messages-tab-fill" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="settings-tab-fill" data-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false">Settings</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-1">
              <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
<div class="card-content">
                    <div class="card-body">
<form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                        <span>First Name</span>
                      </div>
                                            <div class="col-md-8">
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="fname-icon" class="form-control" name="fname-icon" placeholder="First Name">
                                                    <div class="form-control-position">
                               <i class="feather icon-user"></i>
                          </div>
                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                        <span>Email</span>
                      </div>
                                            <div class="col-md-8">
                                                <div class="position-relative has-icon-left">
                                                    <input type="email" id="email-icon" class="form-control" name="email-id-icon" placeholder="Email">
                                                    <div class="form-control-position">
                              <i class="feather icon-mail"></i>
                          </div>
                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                        <span>Mobile</span>
                      </div>
                                            <div class="col-md-8">
                                                <div class="position-relative has-icon-left">
                                                    <input type="number" id="contact-icon" class="form-control" name="contact-icon" placeholder="Mobile">
                                                    <div class="form-control-position">
                              <i class="feather icon-smartphone"></i>
                          </div>
                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                        <span>Password</span>
                      </div>
                                            <div class="col-md-8">
                                                <div class="position-relative has-icon-left">
                                                    <input type="password" id="pass-icon" class="form-control" name="contact-icon" placeholder="Password">
                                                    <div class="form-control-position">
                            <i class="feather icon-lock"></i>
                          </div>
                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8 offset-md-4">
                    <fieldset class="checkbox">
                      <div class="vs-checkbox-con vs-checkbox-primary">
                        <input type="checkbox">
                        <span class="vs-checkbox">
                          <span class="vs-checkbox--check">
                            <i class="vs-icon feather icon-check"></i>
                          </span>
                        </span>
                        <span class="">Remember me</span>
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                <p>
                  Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton candy
                  gummi
                  bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love caramels
                  powder.
                </p>
              </div>
              <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                <p>
                  Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake powder
                  pudding pastry.
                </p>
              </div>
              <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
                <p>
                  Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton candy
                  gummi
                  bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love caramels
                  powder.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>