<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return response(['transaction' => TransactionResource::Collection($transactions), 'message' => 'Retrieved successfully']);
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
            'code' => 'required', 'amount' => 'required', 'sender' => 'required',
            'payment_id' => 'required'
        ]);

        if ($validator->fails()){
            return response(['errors' => $validator->errors(), "Validation error in supplied fields"]);
        }
        $transaction = Transaction::create($data);

        return response(['transaction' => new TransactionResource($transaction), 'message' => 'Retrieved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
         return response(['transaction'=> new TransactionResource($transaction), 'message' => 'Retrieved successfully']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction -> update($request->all());
        return response(['transaction' => new TransactionResource($transaction), 'message' => "Retrieved Successfully", '200']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction -> delete();
        return response(['message' => "Delete"]);
    }
}
