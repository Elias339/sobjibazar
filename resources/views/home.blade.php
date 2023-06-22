@extends('master')
@section('content')
 <section class="container">
     <div class="row mt-5">
         @foreach($products as $product)
         <div class="col-md-3 mb-5">
             <div class="card h-100">
                 <div class="card-body">
                     <img src="{{asset($product->image)}}" class="img-fluid" alt="image">
                 </div>
                 <div class="ms-2">
                     <h3><b>Name: </b>{{$product->name}}</h3>
                     <h4><b>Price: </b>{{$product->price}}</h4>
                     <h6><b>Description: </b>{{$product->description}}</h6>
                 </div>

                 <div class="mt-2">
                     <button class="btn btn-success form-control">Add to bag</button>
                 </div>
             </div>
         </div>
         @endforeach
     </div>
 </section>
@endsection()
