<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone Multiple PDF Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone Multiple PDF Upload in Laravel</h1>
                
                <form action="{{ route('pdf.store') }}" method="post" enctype="multipart/form-data" 
                      class="dropzone" id="pdf-upload">
                    @csrf
                </form>

                <button type="button" id="button" class="btn btn-primary mt-3">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        
        var myDropzone = new Dropzone("#pdf-upload", {
            maxFilesize: 5, // Maksimal ukuran file (MB)
            acceptedFiles: ".pdf", // Hanya menerima file PDF
            addRemoveLinks: true,
            autoProcessQueue: false, // Mencegah auto upload saat file dipilih
            uploadMultiple: true, // Aktifkan upload banyak file
            parallelUploads: 5, // Batasi proses upload bersamaan
            maxFiles: 5, // Maksimal jumlah file
            dictRemoveFile: "Hapus file",
            init: function () {
                var myDropzone = this;

                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on('sendingmultiple', function(data, xhr, formData) {
                    var data = $("#pdf-upload").serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                });

                this.on("successmultiple", function(files, response) {
                    alert("Files uploaded successfully!");
                    location.reload();
                });

                this.on("errormultiple", function(files, response) {
                    alert("Failed to upload files!");
                });
            }
        });
    </script>
</body>
</html>
