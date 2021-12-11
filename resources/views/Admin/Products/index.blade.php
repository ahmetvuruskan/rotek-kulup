
@extends('Admin.layout')
@section('title')
    Demirbaş Listesi
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <div class="btn-group mo-mb-2">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Yeni Ekle</button><div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.products.add')}}">Yeni Demirbaş</a>
                                <a class="dropdown-item" href="#">Ürün konumu </a>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Ürün Adı</th>
                            <th>Stok Kodu</th>
                            <th>Ürün Stok Adeti</th>
                            <th>Ürün Konumu</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data['products'] as $product)
                            <tr align="center">
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_id}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->product_location}}</td>
                                <td><a href="{{route('admin.product.edit',['slug'=>$product->product_slug])}}">
                                        <button class="btn btn-outline-primary  btn-sm"><i
                                                class="material-icons">edit</i>
                                        </button>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- Required datatable js -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables/jszip.min.js"></script>
    <script src="/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/pages/datatables.init.js"></script>
    <script src="/assets/pages/modal-animation.init.js"></script>
    <!-- App js -->
    <script src="/assets/js/app.js"></script>

@endsection
@section('css')
    <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
@endsection
