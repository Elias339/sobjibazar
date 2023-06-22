<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pproduct;
use Illuminate\Support\Facades\DB;
use function League\Flysystem\path;

class HomeController extends Controller
{

    public function index()
    {
        $products = pproduct::all();
        return view('home', compact('products'));
    }

    public function admin()
    {
        $products = pproduct::all();
        return view('admin', compact('products'));
    }


    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $product=new pproduct();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->image= $this->saveImage($request);
        $product->save();
        return back()->with('message','info save');

    }


    public function saveImage($request)
    {
        $image=$request->file('image');
        $imageNewName= rand(11111, 99999) . '.' . $image->getClientOriginalExtension();
        $directory='asset/product-image/';
        $imgUrl=$directory.$imageNewName;
        $image->move($directory,$imageNewName);
        return $imgUrl;
    }


    public function editProduct($id)
    {

        $product=pproduct::find($id);
        return view('edit-product',['product'=>$product]);
    }

    public function updateProduct(Request $request)
    {

        $product=pproduct::find($request->id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;

        if($request->file('image')){
            if ($product->image){
                if (file_exists($product->image)){
                    unlink($product->image);
                    $product->image=$this->saveImage($request);
                }
            }
        }
        
        $product->save();
        return redirect('admin');

    }

    public function delete(Request $request)
    {
        $product= pproduct::whereId($request->get('id'))->first();
        $product->delete();
        return back();
    }

}
