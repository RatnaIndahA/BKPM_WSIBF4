<!DOCTYPE html>
<html>
<head>
    <title>Dropzone Multiple Image Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Dropzone Multiple Image Upload in Laravel</h1><br>
            
            <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" 
                  class="dropzone" id="image-upload">
                @csrf
                <div>
                    <h3 class="text-center">Upload Multiple Images</h3>
                </div>
            </form>

            <button type="button" id="upload-button" class="btn btn-primary mt-3">Upload</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#image-upload", {
        maxFilesize: 10, // Maksimal ukuran file (MB)
        acceptedFiles: ".jpeg,.jpg,.png,.gif", // Jenis file yang diperbolehkan
        addRemoveLinks: true,
        autoProcessQueue: false, // Jangan langsung upload
        uploadMultiple: true, // Mengaktifkan upload banyak file sekaligus
        parallelUploads: 5, // Batas proses upload bersamaan
        maxFiles: 5, // Maksimal jumlah file
        dictRemoveFile: "Hapus file",
        init: function () {
            var myDropzone = this;

            $("#upload-button").click(function (e) {
                e.preventDefault();
                if (myDropzone.files.length === 0) {
                    alert("Silakan tambahkan file sebelum upload!");
                    return;
                }
                myDropzone.processQueue();
            });

            this.on("sendingmultiple", function (data, xhr, formData) {
                var data = $("#image-upload").serializeArray();
                $.each(data, function (key, el) {
                    formData.append(el.name, el.value);
                });
            });

            this.on("successmultiple", function (files, response) {
                alert("Upload berhasil!");
                location.reload();
            });

            this.on("errormultiple", function (files, response) {
                alert("Upload gagal: " + response);
            });
        }
    });
</script>

</body>
</html>