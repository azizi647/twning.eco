@extends('adminpanel.panel')

@section('body')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header with-border">
              <h3 class="box-title">All roles</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="pull-right">
                    <a href="/twadm/roles/create"  class="btn btn-info">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                <div class="flash-message">

                   @if(Session::has('alert-success'))
                    <p class="alert alert-success">{{ Session::get('alert-success') }} 
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                  @endif
                </div>
            
              <table class="table table-hover table-bordered">
                <tr>
                  <th>ID</th>
                  <th>title</th>
                  <th>slug</th>
                  <th>permissions</th>
                  <th>action</th>
                </tr>
                @foreach($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->title }}</td>
                  <td>{{ $role->slug }}</td>
                  <td>
                      @foreach($role->permissions as $permission)
                          {{ $permission->title}} | 
                      @endforeach
                  </td>
                  <td>
                   <div class="row" style="margin-right: 0px;margin-left: 0px;">
                    <div class="col-md-3">
                      <a  href="{{ url(LaravelLocalization::setLocale().'/twadm/roles/').'/'.$role->id.'/edit'   }}" class="btn btn-default" >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </div>
                    <div class="col-md-3">
                      <form action="{{ url(LaravelLocalization::setLocale().'/twadm/roles'.'/'.$role->id) }}" method="post" onsubmit="return confirm('Do you really want to submit the form?');"  >
                      
                        <input type="hidden" name="_method" value="DELETE">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>  
                       </form>
                    </div>
                  </div>

                  </td>
                </tr>
                @endforeach
               
              </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop