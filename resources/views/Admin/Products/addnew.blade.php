@extends('Admin.layout')
@section('title')
    Yeni Ürün  Ekle
@endsection
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <ul>
                            <li class="alert alert-danger">{{$error}}</li>
                        </ul>
                    @endforeach
                @endif
                <form method="POST" action="{{route('admin.product.insert')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Adı</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_name" type="text"
                                   placeholder="Ürün Adını Giriniz"
                                   id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Kodu</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_code" type="text"
                                   placeholder="Ürün Kodunu Giriniz"
                                   id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Stok Adeti</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_quantity" type="number" id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bulunduğu Konum</label>
                        <div class="col-sm-10">
                            <select required name="product_location" class="custom-select">
                                @foreach($data['locations'] as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <input class="btn btn-outline-success" value="Kaydet" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
