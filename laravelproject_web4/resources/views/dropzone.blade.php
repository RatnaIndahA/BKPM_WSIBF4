<!DOCTYPE html>
<html>
<head>
    <title>Dropzone Image Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Dropzone Image Upload in Laravel</h1><br>
            <form action="{{ route('dropzone.store') }}" method="post" name="file" files="true"
                  enctype="multipart/form-data" class="dropzone" id="image-upload">
                @csrf
                <div>
                    <h3 class="text-center">Upload Multiple Images</h3>
                </div>
            </form>
            <button type="button" id="button" class="btn btn-primary">Upload</button>
        </div>
    </div>
</div>

</body>
</html>
<script type="text/javascript">
    Dropzone.options.imageUpload = {
    maxFilesize: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    createImageThumbnails: true,
    autoProcessQueue: false, // Jangan otomatis upload
    init: function () {
        var myDropzone = this;

        $("#button").click(function (e) {
            e.preventDefault();
            if (myDropzone.files.length === 0) {
                alert("Silakan tambahkan file sebelum upload!");
                return;
            }
            myDropzone.processQueue();
        });

        this.on("success", function (file, response) {
            alert("Upload berhasil: " + response.success);
        });

        this.on("error", function (file, response) {
            alert("Upload gagal: " + response);
        });
    }
};
</script>