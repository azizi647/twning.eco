@extends('adminpanel.panel')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        Pages
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms/pages"></i> Pages</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Page</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/cms/pages') }}" method="Post" enctype="multipart/form-data">
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
                      <label for="inputlink" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-10">
                          <input type="text" name="link" class="form-control" id="inputlink"  value="{{ old('link') }}" placeholder="link">
                        </div>
                  </div>
              
        
                  <div class="form-group">
                    <label for="inputordering" class="col-sm-2 control-label">ordering</label>
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
                        <label for="inputsubtitle_az" class="col-sm-2 control-label">subtitle</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="subtitle_az" rows="3" placeholder="Enter ...">{{ old('subtitle_az') }}</textarea>
                        </div>
                      </div>

                  
                       <div class="form-group">
                        <label for="InputFile_az" class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                          <textarea id="editor1" name="editor1"  class="form-control" rows="10" cols="80"></textarea>
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
                          <input type="text" name="title_ru" class="form-control" id="inputtitle_ru"  value="{{ old('title_ru') }}" placeholder="title ru">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputsubtitle_ru" class="col-sm-2 control-label">subtitle</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="subtitle_ru" rows="3" placeholder="Enter ...">{{ old('subtitle_ru') }}</textarea>
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="InputFile_ru" class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                          <textarea id="editor1" name="editor2"  class="form-control" rows="10" cols="80"></textarea>
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
                          <input type="text" name="title_en" class="form-control" id="inputtitle_en"  value="{{ old('title_en') }}" placeholder="title en">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputsubtitle_en" class="col-sm-2 control-label">subtitle</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="subtitle_en" rows="3" placeholder="Enter ...">{{ old('subtitle_en') }}</textarea>
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="InputFile_en" class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                          <textarea id="editor3" name="editor3"  class="form-control" rows="10" cols="80"></textarea>
                        </div>
                      </div>
                      <!-- form commponents end -->
                  </div>
                <!-- lang en end -->
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
                <a href="/cms/pages" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Save</button>
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



<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    
  });
</script>


  @stop