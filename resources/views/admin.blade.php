@extends('master')
@section('content')

    <section class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h2>{{session('message')}}</h2>
                       <form action="{{route('add.product')}}" method="post" enctype="multipart/form-data">
                           @csrf

                           <div class=" row form-group my-3">
                               <label class="col-form-label col-md-3">Product Name:</label>
                               <div class="col-md-9">
                                   <input type="text" name="name" class="form-control">
                                   @error('name')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>
                           <div class=" row form-group my-3">
                               <label class="col-form-label col-md-3">Product price:</label>
                               <div class="col-md-9">
                                   <input type="text" name="price" class="form-control">
                                   @error('price')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>

                           <div class=" row form-group my-3">
                               <label class="col-form-label col-md-3">Description:</label>
                               <div class="col-md-9">
                                   <input type="text" name="description" class="form-control">
                                   @error('description')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>
                           <div class=" row form-group my-3">
                               <label class="col-form-label col-md-3">Product Image:</label>
                               <div class="col-md-9">
                                   <input type="file" name="image" class="form-control" multiple>
                                   @error('image')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>
                           <div class=" row form-group my-3 mt-5">
                               <div>
                                   <button type="submit" class="form-control btn btn-outline-success">Submit</button>
                               </div>
                           </div>
                       </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                <h1 class="text-light text-bg-dark">All Product List</h1>
                <table class="table table-responsive table-bordered table-striped">
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Description</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>

                    @foreach($products as $product)
                    <tr>
                        <td class="text-break">{{$product->name}}</td>
                        <td class="text-break">{{$product->price}}</td>
                        <td class="text-break">{{$product->description}}</td>

                        <td class="text-break">
                            <img src="{{asset($product->image)}}" width="70px" alt="">
                        </td>

                        <td class="btn-group">
                            <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-success btn-sm">Edit</a>

                            <form method="post" action="{{route('product.delete')}}">
                                @csrf
                                <input type="hidden" value="{{ $product->id}}" name="id">
                                <button type="submit" class="btn btn-danger btn-sm ms-2">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>

    </section>

@endsection
