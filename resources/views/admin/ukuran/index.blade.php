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
    										<h2>Ukuran</h2>
    										<p>Hi <strong>{{ Auth::user()->name }}</strong>! </p>
    									</div>
    								</div>
    							</div>
    							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
    								<div class="breadcomb-report">
    									<a href="{!! route('admin.ukuran.create') !!}" class="btn btn-success notika-btn-success waves-effect">Tambah Ukuran</a>
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
                            <h2>List Ukuran</h2>
                            {{-- <p>Jika ada data yang ingin diubah silahkan hubungi Admin</p> --}}
                            {{-- <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="notika-icon notika-close"></i>
                                    </span>
                                </button> Jika ada data kepanitiaan yang ingin diubah silahkan hubungi Admin
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ukuran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($ukurans)
                                        @foreach ($ukurans as $key => $ukuran)
                                            <tr>
                                                <td>{{ $ukuran->id }}</td>
                                                <td>{{ $ukuran->ukuran }}</td>
                                                <td style="text-align: center">
                                                    <a href="{!! route('admin.ukuran.edit',['id'=>$ukuran->id]) !!}" class="btn btn-lightgreen lightgreen-icon-notika waves-effect"><i class="notika-icon notika-menus"></i></a>
                                                    <a href="{!! route('admin.ukuran.destroy',['id'=>$ukuran->id]) !!}" class="btn btn-danger danger-icon-notika waves-effect"><i class="notika-icon notika-close"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
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
    (function ($) {
    "use strict";

    $(document).ready(function() {
         $('#data-table-basic').DataTable();
    });

    })(jQuery);
    </script>
@endsection
