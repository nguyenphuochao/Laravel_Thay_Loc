<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ViewProduct;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id, $qty)
    {
        $this->retoreFromDB();
        $product = ViewProduct::find($product_id);
        Cart::add(['id' => $product_id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->sale_price, 'weight' => 0, 'options' => ['image' => $product->featured_image]]);
        $this->storeIntoDb();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $qty = $request->input('qty');
        $this->create($product_id, $qty);
        $this->display();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        Cart::destroy();
        // $this->retoreFromDB();
        $cart = Cart::content();
        var_dump($cart);
    }
    protected function display()
    {
        // Trả về json
        $result = [];
        $result["count"] = Cart::count();
        $result["subtotal"] = Cart::subtotal();
        $result["items"] = view("cart_items")->render();
        echo json_encode($result);
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
    public function update($rowId, $qty)
    {
        $this->retoreFromDB();
        Cart::update($rowId, $qty);
        $this->storeIntoDb();
        $this->display();
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
    public function delete($rowId)
    {
        $this->retoreFromDB();
        Cart::remove($rowId);
        $this->storeIntoDb();
        $this->display();
    }
    protected function storeIntoDb()
    {
        if (Auth()->check()) {
            $email = Auth::user()->email;
            Cart::store($email);
        }
    }
    protected function retoreFromDB()
    {
        if (Auth()->check()) {
            $email = Auth::user()->email;
            Cart::restore($email);
        }
    }
}
