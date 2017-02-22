<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

#Recursos
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        $products = Product::with('Company', 'Category','Tax', 'Inventory')->get();

        if (!empty($products)) {
            return json_encode($products);
        }
        else
        {
            return "No products";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProducts(Request $request)
    {
        $product = new Product();

        $imagen = $request->file('product_image');

        $product->product_description = $request->product_description;
        $product->product_barcode = $request->product_barcode;
        $product->product_price = $request->product_price;

        if (!empty($imagen))
        {
            $ruta   = '/images/products/';
            $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();

            $imagen->move(getcwd() . $ruta, $nombre);
            $product->product_image = $ruta . $nombre;
        }
          
        $product->product_remarks = $request->product_remarks;
        $product->product_stock = $request->product_stock;
        $product->company_id = $request->company_id;
        $product->category_id = $request->category_id;
        $product->tax_id = $request->tax_id;
        $product->save();
  
      return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
