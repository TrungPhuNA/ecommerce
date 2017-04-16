@extends('backend.layouts.default')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"> </i><a href=""> Dashboard </i></a></li>
                        <li class=""><a href=""> Category </a></li>
                        <li class=""><a href=""> Index </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Cập nhật  danh mục <small class="text-danger">Mục chứa  (*) không được để trống </small> <a href="{{ route('backend.category.add') }}" class="btn btn-success" > Thêm mới </a></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        @include('backend.partials.notification')
                    </div>
                    <div class="x_content">
                        <form>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <input class="checkbox" type="checkbox" name="" id="checkall" />
                                        </th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categoryList as $item)
                                        <tr>
                                            <td>
                                                <input class="checkbox" type="checkbox" name="" />
                                            </td>
                                            <th scope="row">{{ $item['id'] }}</th>
                                            <td>
                                                <?php $str = '' ;for($i = 1; $i <= $item['level']; $i ++)  { echo $str ; $str.='|---';} ?>{!! $item['name'] !!}
                                            </td>
                                            <td> {{ $item['created_at'] }} </td>
                                            <td>
                                                <a class="btn btn-xs btn-default" href="{{ route('backend.category.edit',$item['id']) }}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-xs btn-danger btn-delete-action" href="{{ route('backend.category.delete',$item['id']) }}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>

@stop