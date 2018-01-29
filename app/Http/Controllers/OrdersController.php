<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Counterpaty;
use App\Helpers;
use App\Order;
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

/*    public function counterpaties()
    {
        $type = key($_GET);
        $counterpaties = Counterpaty::where('type', $type)->get(['id', 'name']);

        return view('order.counterpaties', [
            'type' => $type,
            'counterpaties' => $counterpaties
        ]);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = key($_GET);

        $counterpaties = Counterpaty::where('type', $type)->get(['id', 'name']);
        $idCounterpaty = request()->counterpaty;

        return view('order.create', [
            'id'            => $idCounterpaty,
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

    public function getProducts()
    {
        $idCounterpaty = request()->id_;
        $products = Product::with(['counterpaty', 'storage'])
            ->where('id_counterpaty', $idCounterpaty)
            ->get(['id', 'name', 'price'])
            ->toArray();
        $getProductStorage = Helpers::getProductStorage($products);

        echo json_encode($getProductStorage);
    }
}
