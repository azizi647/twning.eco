@extends('adminpanel.panel')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(LaravelLocalization::setLocale()."/twadm")}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url(LaravelLocalization::setLocale()."/twadm/menus")}}"></i> Menu</a></li>
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
              <h3 class="box-title">Add Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/twadm/menus') }}" method="Post"  enctype="multipart/form-data">
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
                        <label for="inputtype" class="col-sm-2 control-label">site position</label>
                        <div class="col-sm-10">
                          <select name="type" id="inputtype" class="form-control">
                            <option value="">menu position ...</option>
                            <option @if(old('type') == 'top') selected @endif value="top">Header Menu</option>
                            <option @if(old('type') == 'left') selected @endif value="left">Content Menu</option>
                            <option  @if(old('type') == 'bottom') selected @endif value="bottom">Footer Menu</option>
                          </select>
                        </div>
                    </div>
                  <div class="form-group">
                      <label for="parent" class="col-sm-2 control-label">menu type</label>
                      <div class="col-sm-10">
                          <select name="parent" id="parent" class="form-control">
                              <option value="0">parent menu...</option>
                              @foreach($menutypes as $menutype)
                                  <option @if(old('parent') == $menutype->menu_id) selected @endif value="{{$menutype->menu_id}}">{{$menutype->title}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                    <div class="form-group">
                        <label for="inputordering_az" class="col-sm-2 control-label">ordering</label>
                        <div class="col-sm-10">
                          <input type="text"  name="order" value="{{ old('order') }}" class="form-control" id="inputordering" placeholder="ordering">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputordering" class="col-sm-2 control-label">Visibility</label>
                      <div class="col-sm-10"> 
                        <!-- radio -->
                          <div class="radio">
                            <label>
                              <input type="radio" value="1" name="status" id="status2" value="option2" checked>
                              Active Menu
                            </label>
                            <label>
                              <input type="radio" value="0" name="status" id="status1" value="option1">
                              Deactive menu
                            </label>
                          </div>
                      </div>
                    </div>


               <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li role="presentation" class="active"><a href="#az" aria-controls="az" role="tab" data-toggle="tab">az</a></li>
                  <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">en</a></li>
                </ul>
              
                <br>
              
                <!-- Tab panes -->
                <div class="tab-content">

                <!-- lang az  -->
                  <div role="tabpanel" class="tab-pane active" id="az">
                            
                      <!-- form commponents begin -->
                      <div class="form-group">
                        <label for="inputtitle_az" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title_az" class="form-control" id="inputtitle_az"  value="{{ old('title_az') }}" placeholder="title az">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputdescription_az" class="col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                          <input type="text" name="description_az" class="form-control"  value="{{ old('description_az') }}" id="inputdescription_az" placeholder="description az">
                        </div>
                      </div>



                  </div>
                <!-- lang az end -->

                <!-- lang en -->
                  <div role="tabpanel" class="tab-pane" id="en">
                    
                      <!-- form commponents begin -->
                      <div class="form-group">
                        <label for="inputtitle_en" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control" id="inputtitle_en" placeholder="title en">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputdescription_en" class="col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                          <input type="text" name="description_en" value="{{ old('description_en') }}" class="form-control" id="inputdescription_en" placeholder="description en">
                        </div>
                      </div>



                  </div>
                <!-- lang en end -->
                    <hr />

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