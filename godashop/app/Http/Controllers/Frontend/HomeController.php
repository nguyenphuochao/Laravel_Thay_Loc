<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ViewProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy sản phẩm nổi bật
        $product_featured = ViewProduct::where('featured', 1)->take(4)->get();
        // Lấy sản phẩm mới nhất
        $product_last = ViewProduct::orderBy('created_date', 'DESC')->take(4)->get();
        // Lấy sản phẩm theo danh mục
        $categories = Category::all();
        $productCate = [];
        foreach ($categories as $category) {
            $product_category = ViewProduct::where('category_id', $category->id)->take(4)->get();
            $productCate[$category->name] = $product_category;
        }

        // Cách 2
        // foreach ($categories as $category) {
        //     $productCate[$category->name] = $category->products->take(4)->all();
        // }
        return view('frontend.home', compact('product_featured', 'product_last', 'productCate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
