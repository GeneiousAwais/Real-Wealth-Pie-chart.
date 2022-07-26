<!doctype html>
    <html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <title>RealWealth | File-uploader</title>
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

                                        <h4 class="card-title">Backgroup Cover Form</h4>
                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php 
                                                    foreach ($cover as $key => $value) {?>

                                                        <tr data-id="<?= $value->cover_id ?>">
                                                            <td style="width: 80px"><?= $value->cover_id ?></td>
                                                            <td><?= ucfirst($value->name)  ?></td>
                                                             <td>
                                                                     <div class="d-flex">
                                                        <div class="me-3">
                                                            <img src="<?= $value->path ?>" alt="" class="avatar-md h-auto d-block rounded">
                                                        </div>
                                                    </div>
                                                            </td>
                                                            <td style="width: 100px">
                                                                <a class="btn btn-outline-secondary btn-sm changeCover" title="Edit" >
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                           
                                                        </tr>

                                                    <?php }

                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>

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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">FileUploader</h5>
                        
                    </div>
                    <div class="modal-body">
                        <form  method="post" enctype="multipart/form-data" id="form">
                            <div class="mb-3">
                                <label for="fileName" class="col-form-label">File Name:</label>
                                <input type="text" class="form-control" id="fileName" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="col-form-label">File:</label>
                                <input class="form-control" type="file" id="formFile" accept="image/*" name="image" />
                            </div>
                            <div class="mb-3">
                                <div id="preview">
                                    <img id="img" src="filed.png" width="150px" />
                                </div>
                            </div>
                        </form>
                        <div id="err"></div>
                        <hr>
                    </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary send-data">Upload</button>
                        
                    </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url()?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url()?>assets/libs/node-waves/waves.min.js"></script>
    <script type="text/javascript">
         $(document).on('click','.close', function(){
            location.reload();
         });
        $(document).on('click','.changeCover', function(){
            $.ajax({
                url: '<?= base_url('get-bg');?>',
                dataType: 'json',
                method: "POST",
                complete: function(response, status) {
                    var json = response.responseJSON;
                    var ResponseData = json.data;
                    console.log(ResponseData);
                    if (ResponseData == '' || ResponseData == null) {
                    } else {
                        $.each(ResponseData, function(k, v) {
                            $('#fileName').val(v.name);
                            $("#img").attr("src",v.path);
                        });
                        $('#exampleModal').modal('show');
                    }
                }
            }).fail(function(jqXHR, textStatus) {
                console.warn("something went wrong.");
            });
        });

        $(document).on('click','.send-data', function(e) {
            var fileName = $('#fileName').val();
            var fd = new FormData();
            var files = $('#formFile')[0].files;
            if(files.length > 0 ){
                fd.append('file',files[0]);
                fd.append('fileName',fileName);
                $.ajax({
                    url: '<?= base_url('save-bg');?>',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response != 0){
                            $("#img").attr("src",response); 
                            $(".preview img").show();
                        }
                        else{
                            alert('file not uploaded');
                        }
                    },
                });
            }
            else{
                alert("Please select a file.");
            }
        });
    </script>
</body>
</html>
