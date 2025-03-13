@extends('backend/layouts.template')
 @section('content')
     <section id="main-content">
         <section class="wrapper">
             <div class="row">
                 <div class="col-lg-12">
                     <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                     <ol class="breadcrumb">
                         <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                         <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                         <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                     </ol>
                 </div>
             </div>
             <!-- Form validations -->
             <div class="row">
                 <div class="col-lg-12">
                     <section class="panel">
                         <header class="panel-heading">
                             {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Pengalaman Kerja </header>
                         @if ($errors->any())
                             <div class="alert alert-danger">
                                 <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
 
                         <div class="panel-body">
                             <div class="form">
                                 <form class="form-validate form-horizontal" id="pengalaman_kerja_form" method="POST"
                                     action="{{ route('pengalaman_kerja.store') }}">
                                     {!! csrf_field() !!}
                                     <div class="form-group">
                                         <label for="cname" class="control-label col-lg-2">Nama Perusahaan <span
                                                 class="required">*</span></label>
                                         <div class="col-lg-10">
                                             <input class="form-control" id="nama_perusahaan" name="nama_perusahaan" minlength="5"
                                                 type="text" required />
                                         </div>
                                     </div>
                                     <div class="form-group">
                                    <label for="posisi" class="control-label col-lg-2">Posisi <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                    <input class="form-control" id="posisi" name="posisi" minlength="2" type="text" required />
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                                    </div>
                                     <div class="form-group">
                                    <label for="tanggal_mulai" class="control-label col-lg-2">Tanggal Mulai <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                    <input id="tanggal_mulai" type="date" name="tanggal_mulai" class="form-control" required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                     <label for="tanggal_selesai" class="control-label col-lg-2">Tanggal Selesai <span class="required">*</span></label>
                                         <div class="col-lg-10">
                                         <input id="tanggal_selesai" type="date" name="tanggal_selesai" class="form-control">
                                            </div>
                                            </div>
                                     <div class="form-group">
                                         <div class="col-lg-offset-2 col-lg-10">
                                             <button class="btn btn-primary" type="submit">Save</button>
                                             <a href="{{ route('pengalaman_kerja.index') }}"> <button class="btn btn-default"
                                                     type="button">Cancel</button></a>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </section>
                 </div>
             </div>
             <!-- page end-->
         </section>
     </section>
 @endsection
 @push('content-css')
     <link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
 @endpush
 @push('content-js')
     <script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
     <script type="text/javascript">
    $('#tanggal_mulai').datepicker({
        format: "yyyy-mm-dd", // Perbaikan format
        autoclose: true,
        todayHighlight: true
    });
    $('#tanggal_selesai').datepicker({
        format: "yyyy-mm-dd", // Perbaikan format
        autoclose: true,
        todayHighlight: true
    });
</script>
 @endpush