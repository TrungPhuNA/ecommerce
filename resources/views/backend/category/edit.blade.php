@extends('backend.layouts.default')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"> </i><a href=""> Dashboard </i></a></li>
                        <li class=""><a href=""> Category </a></li>
                        <li class=""><a href=""> Add </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Thêm mới danh mục <small class="text-danger">Mục chứa  (*) không được để trống </small></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="col-md-3 bor">
                                <div class="col-md-12 border-cus">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-12">
                                            <i class="fa fa-file-image-o"></i> Ảnh đại diện
                                            <input type="file" accept="image/*" name="thunbar" onchange="loadFileThunbar(event)" class="col-md-12">
                                            @if($categoryEdit['thunbar'] != '')
                                                <img src="{{ asset('uploads')}}/{{ $categoryEdit['thunbar'] }}" width="100%" height="150">
                                            @endif
                                        </label>
                                        
                                    </div>
                                    <img  class="outputthunbar" class="col-md-12" width="100%" height="150" />
                                   
                                    
                                </div>

                                <div class="col-md-12 border-cus">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-12">
                                            <i class="fa fa-file-image-o"></i> Banner 
                                            <input type="file" accept="image/*" onchange="loadFile(event)" class="col-md-12">
                                            @if($categoryEdit['banner'] != '')
                                                <img src="{{ asset('uploads')}}/{{ $categoryEdit['banner'] }}" width="100%" height="150">
                                            @endif
                                        </label>
                                        
                                    </div>
                                    <img class="outputimg" class="col-md-12" width="100%" height="150" />
                                    
                                </div>


                            </div>
                            <div class="col-md-8 bor">

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Parent  <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="parent_id">
                                            <option value="0"> [ROOT]</option>
                                                @foreach($categoryList as $item)
                                                    <option value="{{ $item['id'] }}" <?php echo ($categoryEdit['parent_id'] == $item['id']) ? "selected = 'selected'" : '' ?>><?php $str = ''; for($i = 0; $i < $item['level']; $i ++) { echo $str; $str .='|---';} ?>{{ $item['name'] }}</option>
                                                @endforeach                                  
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Name <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset($categoryEdit) ? $categoryEdit['name'] : '' }}">
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Hot </label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="hot">
                                            <option value="0" {{  isset($categoryEdit) && $categoryEdit['hot'] == 0 ? "selected = 'selected'" : '' }}> No </option>
                                            <option value="1" {{  isset($categoryEdit) && $categoryEdit['hot'] == 1 ? "selected = 'selected'" : '' }}> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Tag </label>
                                    <div class="col-md-10">
                                        <input type="text" id="first-name" name="tag" required="required" class="form-control col-md-7 col-xs-12" value="{{ isset($categoryEdit) ? $categoryEdit['tag'] : '' }}">
                                    </div>
                                </div>
                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                    <a class="btn btn-danger" href="{{ route('backend.category.index') }}" type="button">Cancel</a>
                                    <button type="submit" class="btn btn-success" class="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop