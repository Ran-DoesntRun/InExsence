<?php

namespace App\Http\Controllers;

use App\Enums\Type;
use App\Models\Income;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'type' => ['required', Rule::enum(Type::class)],
        ]);

        $income = Income::create([
            'amount' => $validate['amount'],
            'date' => $validate['date'],
            'type' => $validate['type'],
            // 'id_user'=>Auth::user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }
}
