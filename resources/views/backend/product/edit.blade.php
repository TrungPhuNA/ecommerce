@extends('backend.layouts.default')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"> </i><a href=""> Dashboard </i></a></li>
                        <li class=""><a href=""> Product </a></li>
                        <li class=""><a href="" class="text-danger"> Edit </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Cập nhật sản phẩm  <small class="text-danger">Mục chứa  (*) không được để trống </small></h2>

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


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Price <span class="required">(*)</span> </label>
                                    <div class="col-md-8">
                                        <input type="number" id="first-name" name="price" required="required" class="form-control" value="{{ isset($productEdit) ? $productEdit['price'] : ''}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Sale </label>
                                    <div class="col-md-8">
                                        <input type="text" id="first-name" name="sale" required="required" class="form-control" value="{{ isset($productEdit) ? $productEdit['sale'] : ''}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Producer<span class="required">(*)</span> </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="producer_id">
                                            <option value="0"> Không </option>
                                            @foreach($producer as $item)
                                                <option value="{{ $item['id'] }}" <?php echo $item['id'] == $productEdit['producer_id'] ? "selected = 'selected'" : '' ?>>{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 border-cus">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-12">
                                            <i class="fa fa-file-image-o"></i> Ảnh đại diện
                                            <input type="file" accept="image/*" name="thunbar" onchange="loadFileThunbar(event)" class="col-md-12">
                                            @if($productEdit['thunbar'] != '')
                                                <img src="{{ asset('uploads')}}/{{ $productEdit['thunbar'] }}" width="100%" height="150">
                                            @endif
                                        </label>
                                        
                                    </div>
                                    <img  class="outputthunbar" class="col-md-12" width="100%" height="150" />                                   
                                </div>
                            </div>
                            <div class="col-md-8 bor">

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Category  <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category_id">
                                            <option value=""> Mời bạn chọn danh mục </option>
                                            @foreach($category as $item)
                                                <option value="{{ $item['id'] }}" <?php echo $item['id'] == $productEdit['category_id'] ? "selected = 'selected'": '' ?>><?php $str = ''; for($i = 0; $i < $item['level']; $i ++) { echo $str ; $str .= '|---';} ?>{{ $item['name'] }}</option>
                                            @endforeach                                          
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Name <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" required="required" class="form-control" value="{{ isset($productEdit) ? $productEdit['name'] : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Number <span class="required">(*)</span></label>
                                    <div class="col-md-5">
                                       <input type="number" name="number" class="form-control" value="{{ isset($productEdit) ? $productEdit['number'] : ''}}">
                                    </div>

                                    <label class="control-label col-md-1" for="first-name"> Hot </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="hot">
                                            <option value="0"> No </option>
                                            <option value="1"> Yes </option>
                                        </select>
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Description <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="10" name="description">{{ isset($productEdit) ? $productEdit['description'] : ''}}</textarea>
                                    </div>
                                </div>

                               
                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                    <a class="btn btn-danger" href="{{ route('backend.product.index') }}" type="button">Cancel</a>
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