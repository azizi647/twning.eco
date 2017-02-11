@extends('adminpanel.panel')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms/gallery"></i> Gallery</a></li>
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
              <h3 class="box-title">Add Galley</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/cms/gallery') }}" method="Post" enctype="multipart/form-data">
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
                        <label for="inputordering_az" class="col-sm-2 control-label">ordering</label>
                        <div class="col-sm-10">
                          <input type="text"  name="ordering" value="{{ old('ordering') }}" class="form-control" id="inputordering" placeholder="ordering">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputordering" class="col-sm-2 control-label">STATUS</label>
                      <div class="col-sm-10"> 
                        <!-- radio -->
                          <div class="radio">
                            <label>
                              <input type="radio" value="0" name="status" id="status1" value="option1" checked>
                              Deactive
                            </label>
                            <label>
                              <input type="radio" value="1" name="status" id="status2" value="option2">
                              Active
                            </label>
                          </div>
                      </div>
                    </div>


               <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li role="presentation" class="active"><a href="#az" aria-controls="az" role="tab" data-toggle="tab">az</a></li>
                  <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">ru</a></li>
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
                      <!-- form commponents end -->
                
                  </div>
                <!-- lang az end -->

                <!-- lang ru -->
                  <div role="tabpanel" class="tab-pane" id="ru">
                         <!-- form commponents begin -->
                      <div class="form-group">
                        <label for="inputtitle_ru" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title_ru" value="{{ old('title_ru') }}" class="form-control" id="inputtitle_ru" placeholder="title ru">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputdescription_ru" class="col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                          <input type="text" name="description_ru" value="{{ old('description_ru') }}" class="form-control" id="inputdescription_ru" placeholder="description ru">
                        </div>
                      </div>
                      <!-- form commponents end -->      
                  </div>
                <!-- lang ru end -->
                
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
                      <!-- form commponents end -->

                  </div>
                <!-- lang en end -->



                      <div class="form-group">

                        <label for="InputFile" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <div class="btn btn-default btn-file">
                              <i class="fa fa-paperclip"></i> Upload image 
                              <input type="file" name="file" class="form-control" id="InputFile">
                            </div>
                            <p class="help-block">only jpg, png Max. 10MB</p>
                        </div>    
                      </div>
                      <!-- form commponents end -->

                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
                <a href="/cms/gallery" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
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