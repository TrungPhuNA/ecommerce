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
                        <h2> Cập nhật  danh mục <small class="text-danger">Mục chứa  (*) không được để trống </small></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="checkbox" type="checkbox" name="" />
                                        </td>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkbox" type="checkbox" name="" />
                                        </td>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkbox" type="checkbox" name="" />
                                        </td>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>

@stop