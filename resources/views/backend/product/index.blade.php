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
                        <form class="form-horizontal" action="{{ route('backend.product.index') }}">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input type="text" name="name" placeholder="Tên tìm theo tên .." class="form-control" value="{{ isset($name) ? $name : '' }}">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="category_tk">
                                        <option> -- Category -- </option>
                                        @foreach($category as $item)
                                           <option value="{{ $item['id'] }}" <?php (isset($category_tk) && $item['id'] == $category_tk) ? "selected = 'selected'" : ''?>><?php $str = ''; for($i = 0; $i < $item['level']; $i ++) { echo $str ; $str .= '|---';} ?>{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="producer_tk">
                                        <option> -- Producer -- </option>
                                        @foreach($producer as $item)
                                            <option value="{{ $item['id'] }}" <?php (isset($producer_tk) && $item['id'] == $producer_tk) ? "selected = 'selected'" : ''?>>{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i></button>
                            </div>
                            
                        </form>
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
                                            
                                            <a class="btn btn-xs btn-info viewproductmd" data-idproduct="{{ $item['id'] }}" data-toggle="modal" data-target="#viewproduct"><i class="fa fa-eye"></i></a>
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
                                <a href="{{ route('backend.product.index') }}" class="btn btn-danger">   Trở về</a>
                            </div>
                            <div class="pull-right">
                                {!! $product->appends(['name' => $name,'category_tk' => $category_tk,'producer_tk' => $producer_tk])->links() !!}
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="viewproduct" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Chi tiết sản phẩm </h4>
                                        </div>
                                        <div class="modal-body" id="viewdetal">
                                            <div class="x_content">
                                                <div class="col-md-7 col-sm-7 col-xs-12">
                                                    <div class="product-image">
                                                        <img src="{{ asset('backend') }}/images/prod-1.jpg" alt="...">
                                                    </div>
                                                    <div class="product_gallery">
                                                        <a>
                                                        <img src="{{ asset('backend') }}/images/prod-2.jpg" alt="...">
                                                        </a>
                                                        <a>
                                                        <img src="{{ asset('backend') }}/images/prod-3.jpg" alt="...">
                                                        </a>
                                                        <a>
                                                        <img src="{{ asset('backend') }}/images/prod-4.jpg" alt="...">
                                                        </a>
                                                        <a>
                                                        <img src="{{ asset('backend') }}/images/prod-5.jpg" alt="...">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                                                    <h3 class="prod_title">Tên sản phẩm </h3>
                                                        <p id="tensanpham"></p>
                                                    <br>
                                                    {{-- <div class="">
                                                        <h2>Thông tin </h2>
                                                        <ul class="list-inline prod_color">
                                                            <li>
                                                                <p>Green</p>
                                                                
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                    <br> --}}
                                                    
                                                    <div class="">
                                                        <div class="product_price">
                                                            <h1 class="price"></h1>
                                                            <span class="price-tax"></span>
                                                            <br>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Thông tin chi tiết sản phẩm </a>
                                                            </li>
                                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                                                            </li>
                                                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                                            </li>
                                                        </ul>
                                                        <div id="myTabContent" class="tab-content">
                                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                                
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                                    booth letterpress, commodo enim craft beer mlkshk aliquip
                                                                </p>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                                    photo booth letterpress, commodo enim craft beer mlkshk 
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-->  
                        </form>
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </div>

@stop