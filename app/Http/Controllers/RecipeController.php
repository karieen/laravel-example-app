<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(): View
    {
        return view('recipe.index', [
            'recipes' => Recipe::query()
                ->where('published', '=', 1)
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view('recipe.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $recipe = new Recipe([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'published' => isset($request->published['published']),
        ]);

        $recipe->save();

        return redirect()->route('recipe.show', ['recipe' => $recipe]);
    }

    public function show(Recipe $recipe): View
    {
        return view('recipe.show', [
            'recipe' => $recipe,
        ]);
    }

    public function edit(Recipe $recipe): View
    {
        return view('recipe.edit', [
            'recipe' => $recipe,
        ]);
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $recipe->name = $validated['name'];
        $recipe->description = $validated['description'];
        $recipe->published = isset($request->published['published']) ;
        $recipe->save();
        return redirect()->route('recipe.show', ['recipe' => $recipe]);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipe.index');
    }
}
