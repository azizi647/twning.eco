@extends('adminpanel.panel')

@section('body')
  <link rel="stylesheet" href="{{ asset('public/lightbox2/css/lightbox.min.css') }}">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Partners
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Partners</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Partners list</h3>
              <div class="pull-right">
                  <a href="{{ url('/twadm/partners/create')}}"  class="btn btn-info">
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
                  <th>Name</th>
                  <th>Image</th>
                  <th>Ordering</th>
                  <th>Lang</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              @foreach($partners as $partner)
                
                <tr>
                  <td>  {{ $partner->partner_id }}       </td>
                  <td>  {{ $partner->title }}    </td>
                  <td>
                    <a href="{{ asset('public/images/partnergallery/'.$partner->image ) }}" data-lightbox="image-{{ $partner->partner_id}}">
                      <img src="{{ asset('public/images/partnergallery/'.$partner->image )}}" class="img-responsive img-thumbnail" style="height: 100px" alt="">
                    </a>
                  </td>
                  <td>  {{ $partner->order }}     </td>
                  <td>  {{ $partner->lang }}     </td>
                  <td>
                    @if($partner->status == 1)
                      <i class="fa fa-check" aria-hidden="true"></i>
                    @else
                      <i class="fa fa-times" aria-hidden="true"></i>
                    @endif    
                  </td>
                  <td>
                    <div class="col-md-2">
                      <a  href="{{ url(LaravelLocalization::setLocale().'/twadm/partners/').'/'.$partner->partner_id.'/edit'   }}" class="btn btn-default" >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </div>
                    <div class="col-md-1">
                      <form action="{{ url(LaravelLocalization::setLocale().'/twadm/partners'.'/'.$partner->partner_id) }}" method="post" onsubmit="return confirm('Do you really want to submit the form?');"  >
                      
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
                  <th>Name</th>
                  <th>Image</th>
                  <th>Ordering</th>
                  <th>Lang</th>
                  <th>Status</th>
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




<!-- Bootstrap 3.3.6 -->
<!-- DataTables -->


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script src="{{ asset('public/lightbox2/js/lightbox.min.js') }}" type="text/javascript" ></script>

  </div>
  <!-- /.content-wrapper -->



@stop