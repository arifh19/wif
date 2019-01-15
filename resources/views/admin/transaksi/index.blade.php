@extends('layouts.master')

@section('content')
<!-- Breadcomb area Start-->
<div class="breadcomb-area" style="margin-top: 3em">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Transaksi</h2>
                                    <p>Hi <strong>{{ Auth::user()->name }}</strong>! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="{!! route('admin.transaksi.create') !!}" class="btn btn-success notika-btn-success waves-effect">Tambah Transaksi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>List Transaksi</h2>
                        {{-- <p>Jika ada data yang ingin diubah silahkan hubungi Sekretaris Umum / Sekretaris Jenderal</p> --}}
                        {{-- <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="notika-icon notika-close"></i>
                                    </span>
                                </button> Jika ada data kepanitiaan yang ingin diubah silahkan hubungi Sekretaris Umum / Sekretaris Jenderal
                            </div> --}}
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($transaksis)
                                @foreach ($transaksis as $key => $transaksi)
                                @foreach ($transaksi->barangs as $key => $barang)
                                @php
                                $total += $barang->harga * $barang->pivot->kuantitas;
                                @endphp
                                @endforeach
                                <tr>
                                    <td>{{ $transaksi->id }}</td>
                                    <td>{{ $transaksi->pelanggan }}</td>
                                    <td>{{ number_format($total,0,".",".") }}</td>
                                    <td>{{ Carbon\Carbon::parse($transaksi->created_at)->toFormattedDateString() }}</td>
                                    <td style="text-align: center">
                                        <a href="{!! route('admin.transaksi.show', ['id' => $transaksi->id]) !!}" class="btn btn-lightgreen lightgreen-icon-notika waves-effect"><i class="notika-icon notika-menus">Detail</i></a>
                                    </td>
                                </tr>
                                @php
                                $total = 0;
                                @endphp
                                @endforeach
                                @endisset
                            </tbody>
                            {{--  <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th></th>
                                </tr>
                            </tfoot>  --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->
@endsection

@section('script')
<script type="text/javascript">
    (function($) {
        "use strict";

        $(document).ready(function() {
            $('#data-table-basic').DataTable();
        });

    })(jQuery);
</script>
<script type="text/javascript">
    function deleteFunction(id) {
        this.id = id;
        Swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result) {
                document.getElementById("delete-" + this.id).submit();
            }
        });
    }
</script>
@endsection
