<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Counterpaty;
use App\Helpers;
use Validator;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = request()->path();
        $products = Product::with('counterpaty')->get()->toArray();

        return view('product.index', [
            'products' => $products,
            'page'     => $page
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = explode('/', request()->path());
        $counterpaties = Counterpaty::get(['id','name'])->toArray();

        return view('product.create', [
            'counterpaties' => $counterpaties,
            'page'          => $page[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $dataProduct = $request->except('_token');
        Product::create($dataProduct);

        return redirect()->route('product.index')->with(['message' => 'Add new product']);
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
        $page = explode('/', request()->path());
        $counterpaties = Counterpaty::get(['id','name'])->toArray();
        $product = Product::with('counterpaty')
            ->get(['id', 'id_counterpaty', 'name', 'count', 'price'])
            ->where('id',$id)->first()->toArray();

        return view('product.edit', [
            'page'          => $page[0],
            'product'       => $product,
            'counterpaties' => $counterpaties 
        ]);
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
        Validator::make($request->all(), [
                'name'           => 'required|unique:products,name,'.$id,
                'count'          => 'required|numeric|min:1|max:10000',
                'price'          => 'required|numeric|min:1|max:1000000000',
                'id_counterpaty' => 'required'
            ])->validate();

        $dataProduct = $request->except(['_token', '_method']);
        Product::find($id)->update($dataProduct);

        return redirect()->route('product.index')->with(['message' => 'Update product']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with(['message' => 'DELETE']);
    }
}
