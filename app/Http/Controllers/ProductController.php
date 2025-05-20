<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('pages.Products.product', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'productname' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description'=>'required|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120',
            'sub_images.*' => 'image'
        ]);

        $product = new Product();
        $product->name = $request->productname;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        
        if ($request->hasFile('main_image')) {
            $folder = 'product/';
            $imageName = uniqid() . '.' . $request->main_image->getClientOriginalExtension();
            $request->main_image->move(public_path($folder), $imageName);
            $product->main_image = $imageName;
        }

        // Save sub images
        for ($i = 0; $i < 5; $i++) {

            if ($request->hasFile("sub_images.$i")) {
                $folder = 'product/';
                $imageName = uniqid() . '_' . $i . '.' . $request->file("sub_images.$i")->getClientOriginalExtension();
                $request->file("sub_images.$i")->move(public_path($folder), $imageName);
                $field = 'sub_image_' . ($i + 1);
                $product->$field = $imageName;
            }
        }

        $product->save();
        return redirect()->route('table')->with('success', 'Product added!');
    }
    public function index()
    {
        $product = Product::with('category')->paginate(5);
        return view('pages.table', compact('product'));
    }

    public function productedit($id)
    {

        $product = Product::find($id);
        $categories=Category::all();
        return view('pages.Products.productedit', compact('product','categories'));
    }
    public function productupdate(Request $request, $id)
    {   
        $product = Product::find($id);
        $request->validate([
            'productname' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description'=>'required|string',
            'main_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5120',
            'sub_images.*' => 'image'
        ]);

        $product->name = $request->productname;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('main_image')) {
            $folder = 'product/';
            $imageName = uniqid() . '.' . $request->main_image->getClientOriginalExtension();
            $request->main_image->move(public_path($folder), $imageName);
            $product->main_image = $imageName;
        }

        // Save sub images
        for ($i = 0; $i < 5; $i++) {
            if ($request->hasFile("sub_images.$i")) {
                $folder = 'product/';
                $imageName = uniqid() . '_' . $i . '.' . $request->file("sub_images.$i")->getClientOriginalExtension();
                $request->file("sub_images.$i")->move(public_path($folder), $imageName);
                $field = 'sub_image_' . ($i + 1);
                $product->$field = $imageName;
            }
        }
        $product->save();
        return redirect()->route('table');
    }

public function view($id){
    $product = Product::with('category')->find($id);
        return view('pages.Products.productview', compact('product'));
}
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('table');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return back()->with('success', 'Products imported successfully.');
    }

public function card()  //index
{
  
    $products = Product::all(); // Fetch all produts

    return view('pages.products.productcard', compact('products'));
}
public function show($id)
{
    $product = Product::findOrFail($id);
    return view('pages.Products.productshow', compact('product'));
}

}
