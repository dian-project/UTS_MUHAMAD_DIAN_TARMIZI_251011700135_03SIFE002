<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function home()
    {
        $furnitures = Furniture::orderBy('name')
            ->take(3)
            ->get();

        return view('home', compact('furnitures'));
    }

    public function index(Request $request)
    {
        $query = Furniture::query();

        if ($request->filled('search')) {
            $query->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $categories = Furniture::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $furnitures = $query
            ->orderBy('name')
            ->paginate(6)
            ->withQueryString();

        return view('furnitures.index', compact(
            'furnitures',
            'categories'
        ));
    }

    public function show($id)
    {
        $furniture = Furniture::findOrFail($id);

        return view('furnitures.show', compact('furniture'));
    }
    
public function about()
{
    return view('about');
}

public function contact()
{
    return view('contact');
}

}
