@extends('backend.layouts.default')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"> </i><a href=""> Dashboard </i></a></li>
                        <li class=""><a href=""> Category </a></li>
                        <li class=""><a href=""> Edit </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Cập nhật  danh mục <small class="text-danger">Mục chứa  (*) không được để trống </small></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2"  class="form-horizontal form-label-left" novalidate="">
                            <div class="col-md-3 bor">
                                <div class="col-md-12 border-cus">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-12">
                                            <i class="fa fa-file-image-o"></i> Ảnh đại diện
                                            <input id="file-upload" type="file" name="thunbar" class="col-md-12"> 
                                        </label>
                                        
                                    </div>
                                </div>

                                <div class="col-md-12 border-cus">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-12">
                                            <i class="fa fa-file-image-o"></i> Banner
                                            <input id="file-upload" type="file" name="banner" class="col-md-12"> 
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 bor">

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Parent  <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="parent_id">
                                            <option value="0"> [ROOT]</option>
                                                                                        
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Name <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                    <button class="btn btn-danger" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop