@extends('backend.layouts.default')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"> </i><a href=""> Dashboard </i></a></li>
                        <li class=""><a href=""> Producer </a></li>
                        <li class=""><a href="#" class="text-danger"> Index </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Danh sách hãng sản phẩm  </h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        @include('backend.partials.notification')
                        <div class="alert alert-success showalertjs hide"></div>
                        <div class="alert alert-danger showalerterrorjs hide"></div>
                    </div>
                    <div class="x_content" id="x_content">
                        <form>
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>
                                            <input class="checkbox" type="checkbox" name="" id="checkall" />
                                        </th>
                                        <th>#</th>
                                        <th> Name </th>
                                        <th> Slug </th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($producerList as $item)
                                        <tr>
                                            <td>
                                                <input class="checkbox" type="checkbox" name="idall[]" value="{{ $item['id'] }}" />
                                            </td>
                                            <th scope="row">{{ $item['id'] }}</th>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['slug'] }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-default" href="{{ route('backend.producer.edit',$item['id']) }}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-xs btn-danger btn-delete-action"  data-id="{{ $item['id'] }}" href="javascript:;"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <a href="javascript:;" class="btn btn-danger deleteall"  data-token="{{ csrf_token() }}">Delete All</a>
                                <a href="{{ route('backend.producer.add') }}" class="btn btn-success">   Thêm mới</a>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>

@stop