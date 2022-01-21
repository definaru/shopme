<?php
    use yii\helpers\Html;
    $this->title = 'Smart Links';
?>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Offer</h2>
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
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Chat</a>
                        <a class="dropdown-item" href="#">Calendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="description-list-alignment">
            <div class="row">
                <div class="col-md-12 mt-1">
                    <div class="group-area"><h1><?=$this->title;?></h1></div>
                </div>
            </div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Default</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <p>
              Alerts are available for any length of text, as well as an
              optional dismiss button. Add
              <code>.alert.alert-{color}</code> classes for alert with all theme
              colors.
            </p>
            <div class="alert alert-primary mb-2" role="alert">
              <strong>Good Morning!</strong> Start your day with some alerts.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        </section>
    </div>
</div>
