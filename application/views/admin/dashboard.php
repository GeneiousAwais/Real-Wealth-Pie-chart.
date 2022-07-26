<?php
$user_id= $this->session->userdata('user_id');

if(!$user_id){

 // redirect('user/login_view');
}

// echo "<pre>"; print_r($swals);die;
?>
<!doctype html>
    <html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <title>RealWealth | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">
        <link href="<?= base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php include('page_header.php') ?>
            <?php include('left_side_bar.php') ?>
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Table Edit</h4>
                                        <p class="card-title-desc">Table Edit is a lightweight jQuery plugin for making table rows editable.</p>
                                        <?php if(isset($questions)){?>
                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Question</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php 
                                                    
                                                    foreach ($swals as $key => $swal) {?>

                                                        <tr data-id="<?= $swal->id ?>">
                                                            <td data-field="id" style="width: 80px"><?= $swal->id ?></td>
                                                            <td data-field="question"><?= $swal->question ?></td>
                                                            <td data-field="category"><?= ucfirst($swal->category_name)?></td>
                                                            <td data-field="status"><?= isset($swal->status) && $swal->status == '1' ? 'Active' : 'Inactive' ?></td>
                                                            <td style="width: 100px">
                                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    <?php }

                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                         <?php }
                                         ?>

                                    </div>
                                </div>
                            </div>
                        </div>                   
                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Realwealth.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Beaconhouse Technology
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="<?= base_url()?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url()?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url()?>assets/libs/node-waves/waves.min.js"></script>
        <!-- Table Editable plugin -->
        <script src="<?= base_url()?>assets/libs/table-edits/build/table-edits.min.js"></script>
        <script src="<?= base_url()?>assets/js/pages/table-editable.int.js"></script>

        <script src="<?= base_url()?>assets/js/app.js"></script>
       <!--  <script type="text/javascript">
            $(function () {
                var pickers = {};
                $('.table-edits tr').editable({
                    edit: function (values) {
                        $(".edit i", this)
                        .removeClass('fa-pencil-alt')
                        .addClass('fa-save')
                        .attr('title', 'Save');
                    },
                    save: function (values) {
                        $(".edit i", this)
                        .removeClass('fa-save')
                        .addClass('fa-pencil-alt')
                        .attr('title', 'Edit');

                        if (this in pickers) {
                            pickers[this].destroy();
                            delete pickers[this];
                        }
                    },
                    cancel: function (values) {
                        $(".edit i", this)
                        .removeClass('fa-save')
                        .addClass('fa-pencil-alt')
                        .attr('title', 'Edit');

                        if (this in pickers) {
                            pickers[this].destroy();
                            delete pickers[this];
                        }
                    }
                });
            });

        </script> -->



    </body>
    </html>
