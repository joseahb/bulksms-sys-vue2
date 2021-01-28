<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PurchaseResource;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return response(['purchases' => PurchaseResource::Collection($purchases), 'messages' => "Retrieved successfully"], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'amount'=>'required', 'wallet_id'=>'required'
        ]);

        if ($validator->fails()){
            return response(['errors' => $validator->errors(), 'message' => "Validation Error"]);
        }
        $purchase = Purchase::create();
        return response(['purchases' => new PurchaseResource($purchases), 'messages' => "Retrieved successfully"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return response(['purchase' => new PurchaseResource($purchase), 'message' => "Retrieved successfully"], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->update($request->all());
        return response(['purchase' => new PurchaseResource($purchase), 'message' => "Retrieved successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return response(['message' => "Deleted successfully"]);
    }
}
