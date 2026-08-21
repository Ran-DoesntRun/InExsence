<?php

namespace App\Http\Controllers;

use App\Enums\Enums\Category;
use App\Models\Expense;
use App\Enums\Type;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'type' => ['required', Rule::enum(Type::class)],
            'category' => ['required', Rule::enum(Category::class)],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
