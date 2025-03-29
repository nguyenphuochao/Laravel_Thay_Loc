<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ViewProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null, Request $request)
    {
        $catId = "";
        $cateName = "Tất cả sản phẩm";
        $conds = [];
        // hiển thị sản phẩm theo danh mục
        if ($slug) {
            $tmp = explode('-', $slug);
            $catId = array_pop($tmp);
            $cateName = Category::find($catId)->name;
            $conds[] = ["category_id", "=", $catId];
        }
        // lọc sản phẩm theo khoảng giá
        if ($request->has("price-range")) {
            $priceRange = $request->input("price-range");
            $tmp = explode("-", $priceRange);
            $start = $tmp[0];
            $end = $tmp[1];
            $conds[] = ["sale_price", ">=", $start];
            // sale_price >= 100000
            // bởi vì price-range=1000000-greater
            if (is_numeric($end)) {
                $conds[] = ["sale_price", "<=", $end];
            }
        }
        // sắp xếp sản phẩm theo tiêu chí
        $col = 'name';
        $sortType = "ASC";
        if ($request->has("sort")) {
            $sort = $request->input('sort');
            $colMap = ['alpha' => 'name', 'created' => 'created_date', 'price' => 'sale_price'];
            $temp = explode('-', $sort);
            $col = $colMap[$temp[0]];
            $sortType = $temp[1];
        }
        // Tìm kiếm sản phẩm theo tên
        if ($request->has('search')) {
            $search = $request->input('search');
            $conds[] = ["name", "like", "%$search%"];
        }
        $products = ViewProduct::where($conds)->orderBy($col, $sortType)->paginate(12)->withQueryString();
        $categories = Category::all();
        $data = [
            'products' => $products,
            'categories' => $categories,
            'catId' => $catId,
            'cateName' => $cateName
        ];
        return view('frontend.product', $data);
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
    public function show($slug)
    {
        $tmp = explode('-', $slug);
        $id = array_pop($tmp);
        $product = ViewProduct::find($id);
        $categories = Category::all();
        $data = [
            'product' => $product,
            'categories' => $categories,
            'catId' => $product->category_id
        ];
        return view('frontend.detail', $data);
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
    public function search(Request $request)
    {
        $search = $request->input("pattern");
        $conds = [];
        $conds[] = ["name", "LIKE", "%$search%"];
        $products = ViewProduct::where($conds)->get();
        return view('frontend.search', ["products" => $products]);
    }
}
