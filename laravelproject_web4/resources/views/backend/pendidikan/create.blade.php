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
                    <li><i class="fa fa-files-o"></i>Pendidikan</li>
                </ol>
            </div>
        </div>

        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-9"> <!-- Menggunakan col-lg-9 agar form dekat sidebar -->
                <section class="panel">
                    <header class="panel-heading">
                        <h4>Pendidikan</h4>
                    </header>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="pendidikan_form" method="POST" action="{{ route('pendidikan.store') }}">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="nama" class="control-label col-lg-3">Nama Sekolah <span class="required">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" id="nama" name="nama" minlength="5" type="text" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tingkatan" class="control-label col-lg-3">Tingkatan <span class="required">*</span></label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="tingkatan" id="tingkatan" required>
                                            <option value="1">TK</option>
                                            <option value="2">SD</option>
                                            <option value="3">SMP</option>
                                            <option value="4">SMA/SMK</option>
                                            <option value="5">D3</option>
                                            <option value="6">S1/D4</option>
                                            <option value="7">S2</option>
                                            <option value="8">S3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_masuk" class="control-label col-lg-3">Tahun Masuk <span class="required">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_keluar" class="control-label col-lg-3">Tahun Selesai <span class="required">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="tahun_keluar" type="text" name="tahun_keluar" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('pendidikan.index') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        @push('content-css')
            <link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
        @endpush

        @push('content-js')
            <script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
            <script type="text/javascript">
                $('#tahun_masuk').datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });
                $('#tahun_keluar').datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });
            </script>
        @endpush
    </section>
</section>
@endsection
