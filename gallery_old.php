<?php
    $conn = new mysqli("localhost", "root", "", "imagegallery");

    if (isset($_POST['delImage'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $conn->query("DELETE FROM photos WHERE id='$id'");
        exit('success');
    }

    if (isset($_POST['getImages'])) {
        $start = $conn->real_escape_string($_POST['start']);
        $sql = $conn->query("SELECT id, path FROM photos ORDER BY id DESC LIMIT $start, 8");
        $response = array();
        while ($data = $sql->fetch_assoc())
            $response[] = array("path" => $data['path'], "id" => $data['id']);

        exit(json_encode(array("images" => $response)));
    }

    if (isset($_FILES['attachments'])) {
        $msg = "";
        $targetFile = time() . basename($_FILES['attachments']['name'][0]);

        if (file_exists($targetFile))
            $msg = array("status" => 0, "msg" => "File already exists!");
        else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], "uploads/" . $targetFile)) {
            $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => "uploads/" . $targetFile);

            $conn->query("INSERT INTO photos (path, uploadedOn) VALUES ('$targetFile', NOW())");
        }

        exit(json_encode($msg));
    }

    $sql = $conn->query("SELECT id FROM photos");
    $numRows = $sql->num_rows;
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


    <title>PIXO - A website for explore your</title>

    <style type="text/css">
			#dropZone {
				border: 3px dashed #0088cc;
				padding: 50px;
				width: 500px;
				margin-top: 100px;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 200px;
				display: none;
			}

            #error {
                color: red;
            }

            .container-main, .row {
                margin-top: 50px;
            }

            #uploadedFiles img {
                width: 100% !important;
            }
		</style>
</head>

<body>
    <div class="container">
    <nav class="navbar fixed-top navbar-expand-xl" style="background:#90ee90;">
        <div class="container">
            <a class="navbar-brand mobile-logo" href="#"><img src="images/pixo.png" alt="PIXO" /></a>
            <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse">
                <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span> </button>

            <div id="my-nav" class="collapse navbar-collapse">

                <div>
                    <p class="text-left follow">Follow Us:</p>
                    <ul class="navbar-nav float-left social-links">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>

                    </ul>
                </div>

                <ul class="navbar-nav mx-auto logo-desktop">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><img src="images/pixo.png" alt="PIXO" /></a>
                    </li>
                </ul>
                <ul class="navbar-nav float-right menu-links">
                    <li class="nav-item">
                        <a class="nav-link" href="/pixo/index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">HALL OF FAME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav></div>

    <div class="container-main">
            <div class="row">
                <div class="col-md-12" align="center">
                <div id="dropZone" >
                    <h1>Drag & Drop Files...</h1>
                    <input type="file" id="fileupload" name="attachments[]" multiple>
                </div>
                <h1 id="error"></h1><br><br>
                <h1 id="progress"></h1><br><br>
                <div id="files"></div>
                </div>
            </div>
		</div>
        <div class="container" id="uploadedFiles">
            <div class="row">
                <!-- <div class="col-md-3 myImg"></div> -->
            </div>
    </div>




    <!-- <div class="container-fluid copy" style="border:2px solid red; z-Index:100;">
        <div class="col-lg-12">
            <p>&copy; 2021 PIXO. All rights Reserved. Design by BCA STUDENTS [GROUP 9]
        </div>
    </div> -->

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- <script src="owl-carousel/owl.carousel.min.js"></script> -->
        <script src="js/isotope-docs.min.js?6"></script>
        <script src="js/main.js"></script>

<!-- ------------------------------------------------------ -->
        <!-- <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
		<script src="jst/vendor/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="jst/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="jst/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                getImages(0, <?php echo $numRows ?>);
            });

            function getImages(start, max) {
                if (start > max)
                    return;

                $.ajax({
                    url: 'gallery.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        getImages: 1,
                        start: start
                    }, success: function (response) {
                        for (var i=0; i < response.images.length; i++)
                            addImage("uploads/" + response.images[i].path, response.images[i].id);

                        getImages((start+8), max);
                    }
                });
            }

            function delImg(id) {
                if (id === 0)
                    alert('You are not able to delete this image now!');
                else if (confirm('Are you sure that you want to delete this image?')) {
                    $.ajax({
                        url: 'index.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            delImage: 1,
                            id: id
                        }, success: function (response) {
                            $("#img_"+id).remove();
                        }
                    });
                }
            }

            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'gallery.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 1000000)
                       $("#error").html('Your file is too big! Max allowed size is: 1MB');
                   else {
                       $("#error").html("");
                       data.submit();
                   }
               }).on('fileuploaddone', function(e, data) {
                    var status = data.jqXHR.responseJSON.status;
                    var msg = data.jqXHR.responseJSON.msg;

                    if (status == 1) {
                        var path = data.jqXHR.responseJSON.path;
                        addImage(path, 0);
                    } else
                        $("#error").html(msg);
               }).on('fileuploadprogressall', function(e,data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").html("Completed: " + progress + "%");
               });
            });

            function addImage(path, id) {
                if ($("#uploadedFiles").find('.row:last').find('.myImg').length === 4)
                    $("#uploadedFiles").append('<div class="row"></div>');


                $("#uploadedFiles").find('.row:last').append('<div id="img_'+id+'" class="col-md-3 myImg" onclick="delImg('+id+')"><img src="'+path+'" /></div>');
            }
        </script>
</body>

</html>