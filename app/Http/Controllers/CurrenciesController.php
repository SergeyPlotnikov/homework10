<?php

namespace App\Http\Controllers;

use App\Entity\Currency;
use App\Http\Requests\StoreCurrencyRequest;
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
}