<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;

class QuoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        return view('order.quote_edit')->with('quote', $quote);
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
        $quote = Quote::findOrFail($id);

        $request->validate([
            'link' => 'required|min:7',
            'qty' => 'required|min:1|numeric',
            'description' => 'nullable'
        ]);

        $quote->link = $request->link;
        $quote->qty = $request->qty;
        $quote->description = $request->description;
        $quote->update();

        $order = $quote->order_id;
        //return view('order.show')->with('order', $order);
        return redirect()->route('order.show', $order);
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
