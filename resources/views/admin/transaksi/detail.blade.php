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
                                    <h2>Detail Transaksi</h2>
                                    <p>Hi <strong>{{ Auth::user()->name }}</strong>! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="{{ route('admin.transaksi') }}" class="btn btn-default notika-btn-default waves-effect">Back</a>
                                {{-- <a href="{!! route('project.print', ['id' => $project->id]) !!}" class="btn btn-primary primary-icon-notika waves-effect" style="margin-bottom: 0px" target="_blank"><i class="notika-icon notika-print"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->

<!-- Search Engine Start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-example-wrap mg-t-30">
                    <div class="cmp-tb-hd cmp-int-hd">
                        <h2>Data Transaksi</h2>
                    </div>
                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm horizontal-label">Nama Pelanggan</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <strong>{{ $transaksi->pelanggan }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 0.5em">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm horizontal-label">Tanggal Transaksi</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <strong>{{ Carbon\Carbon::parse($transaksi->created_at)->toFormattedDateString() }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 0.5em">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm horizontal-label">Alamat</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <strong>{{ $transaksi->alamat }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 0.5em">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm horizontal-label">Jatuh Tempo</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <strong>{{ Carbon\Carbon::parse($transaksi->tanggal)->toFormattedDateString() }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    {{-- <div class="contact-hd search-hd-eg">
                        <h2>Project Item</h2>
                        <p>Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero</p>
                    </div> --}}
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Ukuran</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi->barangs as $barang)
                                <tr>
                                    <td>{{ $barang->kode }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->ukuran->ukuran }}</td>
                                    <td>{{ $barang->satuan }}</td>
                                    <td>{{ number_format($barang->harga,0,".",".") }}</td>
                                    <td>{{ $barang->pivot->kuantitas }}</td>
                                    <td class="text-right">
                                        <h4>{{ number_format($barang->harga * $barang->pivot->kuantitas,0,".",".") }}</h4>
                                    </td>
                                </tr>
                                @php
                                $total += $barang->harga * $barang->pivot->kuantitas;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6" class="text-center">Total</th>
                                    <th class="text-right">{{ number_format($total,0,".",".") }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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


@endsection
