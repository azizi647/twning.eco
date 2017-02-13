@extends('adminpanel.panel')

@section('body')

<link rel="stylesheet" href="{{ asset("public/adminassets/plugins/select2/select2.min.css") }}">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/{{ LaravelLocalization::setLocale() }}/twadm/roles"></i> Roles</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-1"></div>
      <!-- right column -->
      <div class="col-md-10">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Add Role</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="Post" action="{{ url(LaravelLocalization::setLocale().'/twadm/roles/')}}">
            <div class="box-body">

            <div class="flash-message">

               @if(Session::has('alert-success'))
                <p class="alert alert-success">{{ Session::get('alert-success') }} 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
              @endif
            </div>
            
              <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">title</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTitle" placeholder="name" name="title" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputSlug" class="col-sm-2 control-label">slug</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputSlug" placeholder="slug" name="slug" >
                </div>
              </div>

              <div class="form-group">

                <label for="inputpermissions" class="col-sm-2 control-label">Permission</label>

                <div class="col-sm-10">

                  <select name="permissions[]" class="form-control select2" id="inputpermissions" multiple="multiple" data-placeholder="select permission">
                  @foreach($permissions as $permission)
                    <option  value="{{ $permission->id }}">{{$permission->title}}</option>
                  @endforeach
                  </select>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                            
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <a href="/twadm/roles" class="btn btn-default">Cancel</a>

              <button type="submit" class="btn btn-info pull-right">Save</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<script src="{{ asset("public/adminassets/plugins/select2/select2.full.min.js") }}"></script>

<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>


@stop