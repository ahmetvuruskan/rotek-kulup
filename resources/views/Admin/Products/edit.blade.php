@extends('Admin.layout')
@section('title')
    {{$data['product'][0]->product_name}}
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
                <form method="POST" action="{{route('admin.product.update')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Adı</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_name" type="text"
                                   value="{{$data['product'][0]->product_name}}"
                                   id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Kodu</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_code" type="text"
                         readonly   value="{{$data['product'][0]->product_id}}"
                                   id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input"  class="col-sm-2 col-form-label">Ürün Stok Adeti</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_quantity" value="{{$data['product'][0]->product_quantity}}" type="number"
                                   id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bulunduğu Konum</label>
                        <div class="col-sm-10">
                            <select required name="product_location" class="custom-select">
                               @foreach($data['locations'] as $location)
                                @if($data['product'][0]->id == $location->id)
                                        <option selected value="{{$location->id}}">{{$location->location_name}}</option>
                                    @else
                                        <option value="{{$location->id}}">{{$location->location_name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$data['product'][0]->id}}">
                    <div class="d-flex flex-row-reverse">
                        <input class="btn btn-outline-success" value="Kaydet" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
