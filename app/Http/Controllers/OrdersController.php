<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Counterpaty;
use App\Helpers;
use App\Order;
use DB;
use Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = key($_GET);
        $counterpaties = Counterpaty::where('type', $type)->get(['id', 'name']);
        $page = explode('/', request()->path())[0];

        return view('order.create', [
            'page'          => $page,
            'counterpaties' => $counterpaties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = Helpers::handlerOrderProviders($request->except('_token'));
        for($count = 0; $count < count($orders); $count++) {
            Order::create($orders[$count]);
        }

        return redirect()->route('order.index')->with(['message' => 'Create Order(s)']);
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

    public function getProducts()
    {
        $idCounterpaties = json_decode(request()->idCounterpaties);
        $products = Product::with(['counterpaty', 'storage'])
            ->whereIn('id_counterpaty', $idCounterpaties)
            ->get()
            ->toArray();
        $getProductStorage = Helpers::getProductStorage($products);

        echo json_encode($getProductStorage);
    }
}
