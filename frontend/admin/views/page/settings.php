<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Affise;
    use budyaga_cust\users\models\Scripts;
    $params = Yii::$app->user->identity;
    $result = Affise::getPartnersID($params->position); // Yii::$app->user->identity->position
    $this->title = 'Settings';
?>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Settings</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><?=Yii::$app->params['name'];?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Pages</a>
                            </li>
                            <li class="breadcrumb-item active">
                                User Settings
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right"></div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="settings-account">
                <div class="card user-form">
                    <div class="card-header">
                        <h4 class="card-title">Account</h4>
                    </div>
                    <div class="card-body">
                        <div class="collapse-header">
                            <div id="headingCollapse1">
                                <div class="lead collapse-title">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <?=Html::img(
                                                //Scripts::getGravatarImage($result->partner->email), 
                                                (!$params->photo) ? Scripts::site().'/img/img_avatar3.png' : $params->photo,
                                                ['class' => 'rounded-circle mr-2', 'alt' => 'avatar', 'height' => '64', 'width' => '64'])
                                            ;?>
                                        </a>
                                        <div class="media-body mt-1">
                                            <h5 class="media-heading mb-0">
                                                <?=$result->partner->login;?> 
                                                <a href="#" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"><i class="feather icon-settings primary"></i></a>
                                            </h5>
                                            <a class="text-muted" href="#"><small><?=$params->email;?></small></a>
                                        </div>
                                        <a class="text-muted mt-2" data-method="post" href="/logout">
                                            <i class="fa fa-angle-right mr-1"></i>
                                            <small class="text-capitalize">Sign Out</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse mt-2">
                            <div class="card-content">
                                
                                <form class="form form-vertical">
                                    <div class="form-group">
                                        <label for="first-name-vertical">You New Password</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                        </div>
                                    </div>




                                    <button type="button" class="btn btn-primary mt-1 mb-1 waves-effect waves-light">Change password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-top pt-2 pl-2 pr-2">
                        <p>Available for hire</p>
                        <div class="custom-control custom-switch custom-switch-primary ml-auto">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
                            <label class="custom-control-label" for="customSwitch1"></label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Account-end -->
            <!-- Notification-begins -->
            <div class="settings-notification mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title pb-2">Notification</h4>
                    </div>
                    <div class="card-content">
                        <ul class="list-group notification">
                            <li class="list-group-item d-flex pt-1 pb-1">
                                <span>Anyone can see my profile page</span>
                                <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2"></label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pt-1 pb-1">
                                <span>Anyone can follow me</span>
                                <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" checked="">
                                    <label class="custom-control-label" for="customSwitch3"></label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pt-1 pb-1">
                                <span>Anyone can send me a message</span>
                                <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                                    <label class="custom-control-label" for="customSwitch4"></label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pt-1 pb-1">
                                <span>Anyone can invite me to a group</span>
                                <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                    <label class="custom-control-label" for="customSwitch5"></label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pt-1 pb-1">
                                <span>Update</span>
                                <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch6" checked="">
                                    <label class="custom-control-label" for="customSwitch6"></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
<div class="settings-emails mb-2">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title pb-2">Emails</h4>
      </div>
      <div class="card-content">
    		<ul class="list-group">
    		  <li class="list-group-item d-flex pt-1 pb-1">
    		  	<span>Anyone can post a comment on my post</span>
    		  	<div class="custom-control custom-switch custom-switch-primary ml-auto">
    	          <input type="checkbox" class="custom-control-input" id="customSwitch7">
    	          <label class="custom-control-label" for="customSwitch7"></label>
    	        </div>
    		  </li>
    		  <li class="list-group-item d-flex pt-1 pb-1">
    		  	<span>Anyone can send me an email</span>
    		  	<div class="custom-control custom-switch custom-switch-primary ml-auto">
    	          <input type="checkbox" class="custom-control-input" id="customSwitch8" checked="">
    	          <label class="custom-control-label" for="customSwitch8"></label>
    	        </div>
    		  </li>
    		  <li class="list-group-item d-flex pt-1 pb-1">
    		  	<span>Cras justo odio</span>
    		  	<div class="custom-control custom-switch custom-switch-primary ml-auto">
    	          <input type="checkbox" class="custom-control-input" id="customSwitch9">
    	          <label class="custom-control-label" for="customSwitch9"></label>
    	        </div>
    		  </li>
    		</ul>
      </div>
    </div>
	</div>
            
<div class="settings-security">
  		<div class="card collapse-icon accordion-icon-rotate">
        <div class="card-header">
          <h4 class="card-title">Security</h4>
        </div>
  		 <div class="card-body">


  		<div class="delete-account border-top pt-1">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#deleteForm">
          Delete Account ?
        </button>
        <div class="modal fade text-left" id="deleteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Delete Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form action="#">
                <div class="modal-body">
                  <h5>Are you sure to delete your account? </h5>
                  <button type="button" class="btn btn-danger mr-1 my-1 waves-effect waves-light" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-primary my-1 waves-effect waves-light" data-dismiss="modal">No</button>
                </div>
              </form>
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