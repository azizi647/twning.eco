@extends('adminpanel.panel')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm/settings') }}"></i>Setting</a></li>
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
              <h3 class="box-title">Add Setting</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/twadm/settings') }}" method="Post">
              <div class="box-body">
                    <div><!-- error olanda  -->
                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                    </div>

                  <div class="flash-message">
                      @if(Session::has('alert-success'))
                      <p class="alert alert-success">{{ Session::get('alert-success') }}
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                  </div> <!-- end .flash-message -->

                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">name</label>
                        <div class="col-sm-10">
                          <input type="text"  name="name" value="{{ old('name') }}" class="form-control" id="inputname" placeholder="name">
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="inputvalue" class="col-sm-2 control-label">value</label>
                        <div class="col-sm-10">
                          <input type="text"  name="value" value="{{ old('value') }}" class="form-control" id="inputvalue" placeholder="value">
                        </div>
                    </div>
                    

              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
                <a href="/twadm/menus" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @stop