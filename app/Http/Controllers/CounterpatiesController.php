<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCounterpatyRequest;
use App\Product;
use App\Counterpaty;
use App\Helpers;
use Validator;

class CounterpatiesController extends Controller
{
    static private $_types = ['provider', 'buyer'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = request()->path();
        $counterpaties = Counterpaty::get(['id','name', 'type', 'phone', 'email'])->toArray();
        
        return view('counterpaty.index', [
            'page'          => $page,
            'counterpaties' => $counterpaties
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
        return view('counterpaty.create', [
            'page' => $page[0],
            'types' => self::$_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCounterpatyRequest $request)
    {
        $dataCounterpaty = $request->except(['_token']);
        Counterpaty::create($dataCounterpaty);

        return redirect()->route('counterpaty.index', ['message' => 'Add new counterpaty']);
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
        $dataCounterpaty = Counterpaty::find($id)->toArray();

        return view('counterpaty.edit', [
            'counterpaty' => $dataCounterpaty,
            'page'        => $page[0],
            'types'       => self::$_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCounterpatyRequest $request, $id)
    {
        $dataCounterpaty = $request->except(['_token', '_method']);
        Counterpaty::find($id)->update($dataCounterpaty);

        return redirect()->route('counterpaty.index', ['message' => 'Update Countepaty']);
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
