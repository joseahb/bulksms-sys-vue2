<?php

namespace App\Http\Controllers\API;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::all();
        return response(['wallets' => new WalletsResource($wallets), 'message' => 'Retrieved successfully'], 200);
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

        $validator = Validator::make($data,
        [
            'user_id' => 'required',
        ]
        );

        if ($validator->fails()){
            return response(['errors' => $validator->errors() , "Validation error"]);
        }
        $wallet = Wallet::create($data);

        return response('wallet' => new WalletsResource($wallet), 'message' => 'wallet created successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        return response(['wallet' => new WalletsResource($wallet), 'message' => "retrieved successfully"], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        $wallet->update($request->all());
        return response(['wallet' => new WalletsResource($wallet), 'message' => "Retrieved successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        return response(['message' => 'Delete']);
    }
}
