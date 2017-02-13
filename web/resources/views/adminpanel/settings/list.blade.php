@extends('adminpanel.panel')

@section('body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Settings
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/{{ LaravelLocalization::setLocale() }}/twadm/settings"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Settings</li>
		</ol>


		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">

					<div class="box">
						<div class="box-header">
							<h3 class="box-title">All Settings</h3>
							<div class="pull-right">
								<a href="/twadm/settings/create"  class="btn btn-info">
									<i class="fa fa-plus" aria-hidden="true"></i>
								</a>
							</div>
						</div>

						<div class="box-header">
							<div class="flash-message">
								@if(Session::has('alert-success'))
								<p class="alert alert-success">{{ Session::get('alert-success') }}
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
									@endif
								</div> <!-- end .flash-message -->
							</div>

							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>name</th>
											<th>value</th>
											<th>action</th>
										</tr>
									</thead>
									<tbody>

										@foreach ($settings as $setting)
										<tr>
											<th>{{ $setting->id }}</th>
											<th>{{ $setting->name }} </th>
											<th>{{ $setting->value }}</th>
											
											<th>
												<div class="col-md-2">
													<button type="button" id="editbutton" value="{{ $setting->id  }}" class="btn btn-default" >
														<i class="fa fa-pencil" aria-hidden="true"></i>
													</button>
												</div>

												<div class="col-md-1">
													<form action="{{ url(LaravelLocalization::setLocale().'/twadm/settings'.'/'.$setting->id) }}" method="post" onsubmit="return confirm('Do you really want to submit the form?');"  >
														<input type="hidden" name="_method" value="DELETE">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="btn btn-danger">
															<i class="fa fa-trash-o" aria-hidden="true"></i>
														</button>  
													</form>
												</div>

											</th>
										</tr>
										@endforeach

									</tbody>
									<tfoot>
										<tr>
											<th>ID</th>
											<th>name</th>
											<th>value</th>
											<th>action</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</section>
		<!-- /.content -->



<script>

			var table;

			var data;
			var id;
			var name;
			var value;

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


	$(function () {

				table = $("#example1").DataTable();

				$(document).on( 'click','#editbutton', function () {

					getRowThValues(this,false);


					var input = '<input class="form-control" type="text" value="'+value+'"  />'+
					'<span id="savechange" class="form-control btn btn-primary pull-right">'+
					'<i class="fa fa-floppy-o" aria-hidden="true"></i>'+
					'</span> ';

					row.find('th:nth-child(3)').empty().append(input);

	});


				$(document).on( 'click','#savechange', function () {

					getRowThValues(this,true);

					$.ajax({
						type: 'PUT',
						url: '/twadm/settings/'+id,
						dataType: 'json',
						data: {
							name: name,
							value: value,
							_token: CSRF_TOKEN
						},
						cache: false,
						// beforeSend: function(result) {
						//   submit.empty();
						//   submit.append('<i class="fa fa-cog fa-spin"></i> Wait...');
						// },
						success: function(result) {
							if (result == 1) {
								row.find('th:nth-child(3)').empty().append(value);        
							}
						}
					});
				});

	});

	function getRowThValues(me,newval) {

		row = $(me).closest( "tr" );
		data  = table.row(row).data();
		id    = data[0];
		name  = data[1];

		if (!newval) {
			value = row.find('th:nth-child(3)').html();
		} else {
			value = row.find('th:nth-child(3) input').val()
		}

	}

</script>



</div>



@stop