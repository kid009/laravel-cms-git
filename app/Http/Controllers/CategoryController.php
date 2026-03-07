<?php

namespace App\Http\Controllers;

use App\Actions\Category\CreateCategoryAction;
use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\DTOs\Category\CreateCategoryData;
use App\DTOs\Category\UpdateCategoryData;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id', 'name')->latest()->paginate(10);

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create', [
            'category' => new Category(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request, CreateCategoryAction $action)
    {
        $dto = new CreateCategoryData(
            name: $request->validated('name'),
            userId: Auth::user()->id,
        );

        $action->execute($dto);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id, UpdateCategoryAction $action)
    {
        $category = Category::findOrFail($id);

        $dto = new UpdateCategoryData(
            name: $request->validated('name')
        );

        $action->execute($category, $dto);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeleteCategoryAction $action)
    {
        try
        {
            $category = Category::findOrFail($id);

            $action->execute($category);

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        }
        catch (Exception $e)
        {
            // จับ Exception จาก Action มาแสดงผล
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
    }
}
