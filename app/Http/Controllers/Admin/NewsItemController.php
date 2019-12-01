<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\NewsItem;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::all();
        return view('admin.newsItems.index', compact('newsItems'));
    }

    public function create()
    {
        $newsItem = new NewsItem();
        return view('admin.newsItems.form', compact('newsItem'));
    }

    public function edit(NewsItem $newsItem)
    {
        $recipes = Recipe::all();

        foreach ($recipes as $key => $recipe) {
            foreach ($recipe->newsItems()->get() as $newsItemRecipe) {
                if ($newsItem->id === $newsItemRecipe->id) {
                    unset($recipes[$key]);
                    break;
                }
            }
        }

        return view('admin.newsItems.form', compact('newsItem', 'recipes'));
    }

    public function store()
    {
        request()->validate(array(
            'title' => 'required',
        ));

        $newsItem = new NewsItem();
        $newsItem->title = request('title');
        $newsItem->save();

        return redirect('admin/news-items/' . $newsItem->id . '/edit');
    }

    public function update(NewsItem $newsItem)
    {
        request()->validate([
            'title' => 'required',
        ]);

        $newsItem->title = request('title');
        $newsItem->description = request('description');
        $newsItem->save();

        return redirect('admin/news-items/' . $newsItem->id . '/edit');
    }

    public function saveImage(NewsItem $newsItem)
    {
        if (!empty(request()->image)) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = new Filesystem();
            $file->cleanDirectory('images/newsItems/' . $newsItem->id);

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/newsItems') . '/' . $newsItem->id, $imageName);

            $newsItem->image_name = $imageName;
            $newsItem->save();
        }

        return redirect('admin/news-items/' . $newsItem->id . '/edit');
    }

    public function deleteImage(NewsItem $newsItem)
    {
        $newsItem->image_name = '';
        $newsItem->save();

        return redirect('admin/news-items/' . $newsItem->id . '/edit');
    }

    public function addRecipe(NewsItem $newsItem)
    {
        $newsItem->recipes()->attach(request('recipe_id'));
        return redirect('admin/news-items/' . $newsItem->id . '/edit');
    }

    public function deleteRecipe(NewsItem $newsItem, Recipe $recipe)
    {
        $newsItem->recipes()->detach($recipe->id);
        return redirect('admin/news-items/' . $newsItem->id . '/edit');
    }

    public function destroy(NewsItem $newsItem)
    {
        $newsItem->delete();
        return redirect('admin/news-items');
    }
}
