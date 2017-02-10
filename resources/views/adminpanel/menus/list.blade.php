@extends('adminpanel.panel')

@section('body')
  <link rel="stylesheet" href="{{ asset('lightbox2/css/lightbox.min.css') }}">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ LaravelLocalization::setLocale() }}/twadm"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">    
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu list</h3>
              <div class="pull-right">
                  <a href="{{ url('/twadm/menus/create') }}"  class="btn btn-info">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Menu Type</th>
                  <th>Status</th>
                  <th>Ordering</th>
                  <th>Lang</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              @foreach($menus as $menu)
                
                <tr>
                  <td>  {{ $menu->menu_id }}     </td>
                  <td>  {{ $menu->title }}       </td>
                  <td>  {{ $menu->description }} </td>
                  <td>  {{ $menu->type }}       </td>
                  <td>  {{ $menu->status == 1 ? "Active" : "Deactive" }} </td>
                  <td>  {{ $menu->order }}  </td>
                  <td>  {{ $menu->lang }} </td>
                  <td>
                    <div class="col-md-2">
                      <a  href="{{ url(LaravelLocalization::setLocale().'/twadm/menus/').'/'.$menu->menu_id.'/edit'   }}" class="btn btn-default" >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </div>
                    <div class="col-md-1">
                      <form action="{{ url(LaravelLocalization::setLocale().'/twadm/menus'.'/'.$menu->menu_id) }}" method="post" onsubmit="return confirm('Do you really want to submit the form?');"  >
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>  
                       </form>
                    </div>
                  </td>
                </tr>
              @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Menu Type</th>
                  <th>Status</th>
                  <th>Ordering</th>
                  <th>Lang</th>
                  <th>Action</th>
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
    <!-- /.content -->

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

    <script src="{{ asset('lightbox2/js/lightbox.min.js') }}" type="text/javascript" ></script>

  </div>
  <!-- /.content-wrapper -->



@stop