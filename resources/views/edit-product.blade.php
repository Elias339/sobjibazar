@extends('master')
@section('content')

    <section class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h2>{{session('message')}}</h2>
                        <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}" class="form-control">
                            <div class=" row form-group my-3">
                                <label class="col-form-label col-md-3">Product Name:</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                                </div>
                            </div>
                            <div class=" row form-group my-3">
                                <label class="col-form-label col-md-3">Product price:</label>
                                <div class="col-md-9">
                                    <input type="text" name="price" value="{{$product->price}}" class="form-control">
                                </div>
                            </div>

                            <div class=" row form-group my-3">
                                <label class="col-form-label col-md-3">Description:</label>
                                <div class="col-md-9">
                                    <input type="text" name="description" value="{{$product->description}}" class="form-control">
                                </div>
                            </div>
                            <div class=" row form-group my-3">
                                <label class="col-form-label col-md-3">Product Image:</label>
                                <div class="col-md-9">
                                    <input type="file" name="image"  class="form-control">
                                    <img src="{{asset($product->image)}}" width="70px" alt="">
                                </div>
                            </div>
                            <div class=" row form-group my-3 mt-5">
                                <div>
                                    <button type="submit" class="form-control btn btn-outline-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
