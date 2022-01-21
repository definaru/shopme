<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Affise;
    $this->title = 'Offers';
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
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Chat</a>
                        <a class="dropdown-item" href="#">Calendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="data-thumb-view" class="data-thumb-view-header">
            <div class="action-btns d-none">
                <div class="btn-dropdown mr-1 mb-1">
                </div>
            </div>
            <!-- dataTable starts -->
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="top">
                        <div class="actions action-btns">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Archive</a>
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Another Action</a>
                                </div>
                            </div>
                            <div class="dt-buttons btn-group"><button class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Add New</span></button> </div>
                        </div>
                        <div class="action-filters">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                    </select>
                                </label>
                            </div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <table class="table data-thumb-view dataTable no-footer" id="DataTables_Table_0" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 46px;" data-col="0" aria-label="">
                                    <span class="ml-2">ID</span>
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 260.016px;">
                                    NAME
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 504.016px;">
                                    Offer
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 141.016px;">
                                    Payment
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.016px;">
                                    GEO
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 146.016px;">
                                    CR
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;">
                                    EPC
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">
                                    Categories
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $allPartner['offers'] as &$part ) { ?>
                            <?php if($part['privacy'] == 'private') : else : ?>
                            <tr role="row" class="odd" onclick="getStartLink('/offer/hub<?=$part['id'];?>.aspx')">
                                <td class="dt-checkboxes-cell">#<?=$part['id'];?></td>
                                <td class="product-img sorting_1">
                                    <?=($part['logo'] == '') ? Html::img('/img/nofoto.png', ['alt' => 'placeholder']) : Html::img(Yii::$app->affise->offers.$part['logo'], ['alt' => 'placeholder']);?>
                                </td>
                                <td class="product-name">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            <?=$part['title'];?> <?=Affise::getColorBandage($part['privacy']);?>
                                        </li>
                                    </ul>
                                </td>
                                <td class="product-category">
                                    <strong><?=$part['payments'][0]['revenue'];?> <?=($part['payments'][0]['type'] == 'percent') ? '%' : $part['payments'][0]['currency'];?></strong>
                                    <i><?=$part['payments'][0]['title'];?></i>
                                </td>
                                <td>
                                    All countries
                                </td>
                                <td><?=$part['cr'];?></td>
                                <td class="product-price"><?=$part['epc'];?></td>
                                <td class="product-price">All countries</td>
                            </tr>
                            <?php endif; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="bottom">
                        <div class="actions"></div>
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
<!--                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new-data-sidebar">
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4>ADD NEW DATA</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <div class="data-items pb-3 ps">
                        <div class="data-fields px-2 mt-3">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-name">Name</label>
                                    <input type="text" class="form-control" id="data-name">
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-category"> Category </label>
                                    <select class="form-control" id="data-category">
                                        <option>Audio</option>
                                        <option>Computers</option>
                                        <option>Fitness</option>
                                        <option>Appliance</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-status">Order Status</label>
                                    <select class="form-control" id="data-status">
                                        <option>Pending</option>
                                        <option>Canceled</option>
                                        <option>Delivered</option>
                                        <option>On Hold</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-price">Price</label>
                                    <input type="number" class="form-control" id="data-price">
                                </div>
                                <div class="col-sm-12 data-field-col data-list-upload">
                                    <form action="#" class="dropzone dropzone-area dz-clickable" id="dataListUpload">
                                        <div class="dz-message">Upload Image</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button class="btn btn-primary waves-effect waves-light">Add Data</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>