@extends('backend.layouts.default')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"> </i><a href=""> Dashboard </i></a></li>
                        <li class=""><a href=""> Product </a></li>
                        <li class=""><a href="" class="text-danger"> Index </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Danh sách sản phẩm <small class="text-danger"></small></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        @include('backend.partials.notification')
                        <div class="alert alert-success showalertjs hide"></div>
                        <div class="alert alert-danger showalerterrorjs hide"></div>
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
                                        <th> Name </th>
                                        <th> Producer </th>
                                        <th> Category </th>
                                        <th> Image </th>
                                        <th> Info </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $item)
                                    <tr>
                                        <td>
                                            <input class="checkbox" type="checkbox" name="" />
                                        </td>
                                        <th scope="row">{{ $item['id'] }}</th>
                                        <th scope="row">{{ $item['name'] }}</th>
                                        <td>{{ $item['producer']['name'] }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads') }}/{{ $item['thunbar'] }}" class="img-responsive" width="100" height="100">
                                        </td>
                                        <td>
                                            <p>Price  : <small>{{ formatCurrency($item['price']) }}</small></p>
                                            <p>Sale   : <small>{{ ($item['sale']) }} %</small></p>
                                            <p>Number : <small>{!! numberN($item['number']) !!} </small></p>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-default" href="{{ route('backend.product.edit',$item['id']) }}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-xs btn-danger btn-delete-action"  data-id="{{ $item['id'] }}" href="javascript:;"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <a href="javascript:;" class="btn btn-danger deleteall"  data-token="{{ csrf_token() }}">Delete All</a>
                                <a href="{{ route('backend.product.add') }}" class="btn btn-success">   Thêm mới</a>
                            </div>
                            <div class="pull-right">
                                {!! $product->links() !!}
                            </div>  
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>

@stop