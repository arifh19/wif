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
                                    <h2>Tambah Transaksi</h2>
                                    <p>Hi <strong>{{ Auth::user()->name }}</strong>! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="{{ route('admin.transaksi') }}" class="btn btn-default notika-btn-default waves-effect">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->

<!-- Form Examples area start-->
<div class="form-example-area">
    <div class="container">

    </div>
</div>
<!-- Form Examples area End-->

<!-- Normal Table area Start-->
<div class="normal-table-area">
    <div class="container">
        <form class="" action="{!! route('admin.transaksi.store') !!}" method="post">
            {{ csrf_field() }}
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
                                            <input type="text" id="transaksi-name" class="form-control input-sm" placeholder="Nama pelanggan" name="pelanggan" value="{{ old('pelanggan') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Alamat</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" id="transaksi-name" class="form-control input-sm" placeholder="Alamat pelanggan" name="alamat" value="{{ old('alamat') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Jatuh Tempo</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                            <div class="input-group date nk-int-st">
                                                <span class="input-group-addon"></span>
                                                <input name="tanggal" id="tanggal" type="text" class="form-control" value="{!! date('d F Y') !!}">
                                            </div>
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
                    <div class="normal-table-list mg-t-30">
                        <div class="col-lg-12" style="margin-bottom: 2em">
                            <div class="col-lg-6">
                                <div class="basic-tb-hd">
                                    <h2>Pilih Barang</h2>
                                    <!-- <p>Add Classes (<code>.table-striped</code>) to any table row within the tbody</p> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-10 col-md-3 col-sm-3 col-xs-12">

                                            </div>
                                            <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <button id="tambah" type="button" class="btn btn-info notika-btn-info" data-toggle="modal" data-target="#myModalone">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Ukuran</th>
                                        <th>Satuan</th>
                                        <th>Kuantitas</th>
                                        <th>Harga</th>
                                        <th>Sub Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr>
                                        <td colspan="7" id="no-data" style="text-align: center">No data</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align: center">Total</th>
                                        <th id="total" colspan="2" class="number">0</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <button type="submit" id="submit" class="btn btn-success notika-btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="myModalone" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_barang_clicked">
                        <input type="hidden" id="ukuran">
                        <input type="hidden" id="barang_clicked_pelanggan">
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Kode Barang</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" id="barang_id" name="barang_id" data-live-search="true">
                                                    <option value="" selected disabled>Cari Barang</option>
                                                    @foreach ($barangs as $key => $barang)
                                                    <option class="item-option" data-id="{{ $barang->kode }}" value="{{ $barang->kode }}">{{ $barang->kode }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Ukuran</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" id="ukuran_id" name="ukuran_id" data-live-search="false">
                                                    <option value="0" selected disabled>Pilih Ukuran</option>
                                                    @foreach ($ukurans as $key => $ukuran)
                                                    <option class="item-option" data-id="{{ $ukuran->id }}" value="{{ $ukuran->id }}">{{ $ukuran->ukuran }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Nama Barang</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" id="nama" class="form-control input-sm" placeholder="Nama Barang" name="nama" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Satuan</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" id="satuan" class="form-control input-sm" placeholder="Satuan" name="satuan" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Stok</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="number" id="stok" class="form-control input-sm" placeholder="Stok" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Kuantitas</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="number" id="kuantitas" class="form-control input-sm" placeholder="Kuantitas" name="Kuantitas" writeable>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm horizontal-label">Harga</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="number" id="harga" class="form-control input-sm number" placeholder="Harga" name="harga" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm horizontal-label">Sub Total</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="number" id="subtotal" class="form-control input-sm number" placeholder="Sub Total" name="subtotal" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="add-button" class="btn btn-default" data-dismiss="modal">Tambah</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Normal Table area End-->
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
    var total = 0;

    $(document).ready(function() {
        $('#tanggal').datepicker({
            format : "dd MM yyyy",
        });

        $('#tambah').on('click', function(e) {
            $("#ukuran_id").trigger("change");
            $('#kuantitas').val('0');
            $('#nama').val('');
            $('#satuan').val('');
            $('#stok').val('');
            $('#harga').val('');
            $('#subtotal').val('');
        });

        $('#barang_id').on('change', function(e) {
            var id = $(this).val();

            $("#ukuran_id").trigger("change");
            $('#kuantitas').val('0');
            $('#nama').val('');
            $('#stok').val('');
            $('#satuan').val('');
            $('#harga').val('');
            $('#subtotal').val('');


        });
        $('#ukuran_id').on('change', function(e) {
            var kode = $('#barang_id').val();
            var ukuran = $(this).val();

            $.get("/api/barang/" + kode +"/" + ukuran, function(data) {
                if (data.result == "none") {
                    swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Barang tidak temukan",
                    "showConfirmButton": true,
                    "type": "error"
                    });
                    $('#kuantitas').val('0');
                    $('#nama').val('');
                    $('#satuan').val('');
                    $('#stok').val('');
                    $('#harga').val('');
                    $('#subtotal').val('');
                }else if (data.result.stok == 0) {
                    swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Barang habis",
                    "showConfirmButton": true,
                    "type": "error"
                    });
                    $('#kuantitas').val('0');
                    $('#nama').val('');
                    $('#stok').val('');
                    $('#satuan').val('');
                    $('#harga').val('');
                    $('#subtotal').val('');
                }else{
                    $('#id_barang_clicked').val(data.result.id);
                    $('#barang_clicked_pelanggan').val(data.result.kode);
                    $('#nama').val(data.result.nama);
                    $('#ukuran').val(data.ukuran);
                    $('#satuan').val(data.result.satuan);
                    $('#stok').val(data.result.stok);
                    $('#harga').val(data.result.harga);
                    var subtotal = $('#harga').val() * $('#kuantitas').val();
                    $('#subtotal').val(subtotal);
                    $('.number').number(true, 2, ',', '.');
                }
            });


        });

        $('#kuantitas').on('keyup', function(e) {
            var kuantitas = parseInt(document.getElementById('kuantitas').value, 10);
            var stok = parseInt(document.getElementById('stok').value, 10);
            if(kuantitas>stok){
                swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Stok barang tidak mencukupi",
                    "showConfirmButton": true,
                    "type": "error"
                });
                $('#kuantitas').val('0');
            }else{
                var subtotal = $('#harga').val() * $('#kuantitas').val();
                $('#subtotal').val(subtotal);
                $('.number').number(true, 2, ',', '.');
            }

        });

        $('#add-button').on('click', function functionName() {
            var kuantitas = parseInt(document.getElementById('kuantitas').value, 10);
            var stok = parseInt(document.getElementById('stok').value, 10);
            if((kuantitas==0)||($('#nama').val()=="")){
                swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Mohon lengkapi data barang",
                    "showConfirmButton": true,
                    "type": "error"
                });
            }else if(kuantitas>stok){
                swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Stok barang tidak mencukupi",
                    "showConfirmButton": true,
                    "type": "error"
                });
                $('#kuantitas').val('0');
            }else if(stok==0){
                swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Stok barang tidak mencukupi",
                    "showConfirmButton": true,
                    "type": "error"
                });
                $('#kuantitas').val('0');
            }
            else{
                total += parseInt($('#subtotal').val());
                var markup = '<tr class="row-item"><input type="hidden" name="barang_id[]" value="' + $('#id_barang_clicked').val() + '"><input type="hidden" name="kuantitas[]" value="' + $('#kuantitas').val() + '"><td>' + $(
                        '#barang_clicked_pelanggan').val() +
                    '</td><td>' + $('#nama').val() + '</td><td>' + $('#ukuran').val() + '</td><td>' + $('#satuan').val() + '</td><td>' + $('#kuantitas').val() + '</td><td class="number">' + $('#harga').val() + '</td><td class="number">' + $('#subtotal').val() +
                    '</td><td><button type="button" data-subtotal="' + $('#subtotal').val() + '" class="btn btn-danger danger-icon-notika waves-effect delete-item"><i class="notika-icon notika-close"></i></button></td></tr>';
                $('#no-data').hide();
                $('#table-body').append(markup);
                $('#total').html(total);
                $('.number').number(true, 2, ',', '.');
            }

        });

        $('#submit').on('click', function() {
            var count_row = $('#table-body tr').size();
            if (count_row == 1 && $('#transaksi-name').val() != '') {
                swal({
                    "timer": 5000,
                    "title": "Error",
                    "text": "Please select an item",
                    "showConfirmButton": true,
                    "type": "error"
                });
                event.preventDefault();
            }
        })
    });

    $(document).on('click', '.delete-item', function() {
        $(this).parent().parent().remove();
        var count_row = $('#table-body tr').size();
        total -= parseInt($(this).data('subtotal'));
        $('#total').html(total);
        $('.number').number(true, 2, ',', '.');
        if (count_row == 1) {
            $('#no-data').show();
        }
    });
</script>
@endsection
