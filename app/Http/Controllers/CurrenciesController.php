<?php

namespace App\Http\Controllers;

use App\Entity\Currency;
use App\Http\Requests\ChangeRateRequest;
use App\Http\Requests\StoreCurrencyRequest;
use App\Jobs\SendRateChangedEmail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class CurrenciesController extends Controller
{
    public function main()
    {
        return view('main', ['title' => 'Currency market']);
    }

    public function index()
    {
        $currencies = Currency::all();
        return view('currencies', ['title' => 'Currency market', 'currencies' => $currencies->toArray()]);
    }

    public function show($id)
    {
        $currency = Currency::find($id)->toArray();
        return view('currency', ['title' => $currency['name'], 'currency' => $currency]);
    }

    public function edit($id)
    {
        if (Gate::allows('currencies.edit')) {
            $currency = Currency::find($id)->toArray();
            return view('change-currency', ['title' => 'Edit', 'userId' => Auth::id(), 'id' => $id, 'currency' => $currency]);
        } else {
            return redirect()->route('currencies');
        }
    }

    public function create()
    {
        if (Gate::allows('currencies.create')) {
            return view('create-currency', ['title' => 'Add currency']);
        } else {
            return redirect()->route('currencies');
        }
    }

    public function store(StoreCurrencyRequest $request)
    {
        if (Gate::allows('currencies.store')) {
            $currency = new Currency($request->all());
            $currency->save();
            return redirect()->route('currencies');
        } else {
            return redirect()->route('currencies');
        }
    }

    public function changeRate(ChangeRateRequest $request, $id)
    {
        $oldRate = $request->input('old_rate');
        $currency = Currency::find($id);
        $currency->rate = $request->input('rate');
        $currency->save();

        $user = User::find($request->userId);
        SendRateChangedEmail::dispatch($user, $currency, $oldRate);

        return response()->json(['id' => $id, 'currency' => $currency->name, 'old_rate' => $oldRate,
            'new_rate' => $request->input('rate')], 200);
    }

}