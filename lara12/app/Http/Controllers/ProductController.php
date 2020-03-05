<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();

        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands' => $brands
        ]);
    }

    protected function productValidate($request){
        $this->validate($request,[
            'product_name' => 'required'
        ]);
    }

    protected function mainImageUpload($request){
        $mainImage = $request->file('main_image');
        $ext = '.'.$request->main_image->getClientOriginalExtension();
        $imageName = str_replace($ext, date('d-m-Y-h').$ext, $request->main_image->getClientOriginalName());
        $directory = 'public/admin/product-images/main/';
        $imageUrl = $directory.$imageName;
        $mainImage->move($directory, $imageName);
        return $imageUrl;
    }

    protected function productInfoSave($request, $imageUrl){
        foreach($request->file('imagefile') as $image){
            $imageName2 = $image->getClientOriginalName();
            $directory = 'public/admin/product-images/gallery/';
            $imageUrl2 = $directory.$imageName2;
            $image->move($directory, $imageName2);
            $data[] = $imageUrl2;
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->product_price = $request->product_price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->product_size = $request->product_size;
        $product->product_qty = $request->product_qty;
        $product->main_image = $imageUrl;
        $product->imagefile = json_encode($data);
        $product->save();
    }


    public function newProduct(Request $request){
        $this->productValidate($request);
        $imageUrl = $this->mainImageUpload($request);
        $this->productInfoSave($request, $imageUrl);

        return back()->with('message','Product Added Successfully');
    }

    public function viewProduct(){
//        $products = Product::all();
        $products = DB::table('products')
                            ->join('categories','categories.id','=','products.cat_id')
                            ->join('brands','brands.id','=','products.brand_id')
                            ->get();
//        return $products;
        return view('admin.product.view-product',['products'=>$products]);
    }
}












