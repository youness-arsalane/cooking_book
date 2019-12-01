<?php

namespace App\Http\Controllers;

use App\NewsItem;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::all();
        return view('newsItems.index', compact('newsItems'));
    }

    public function show(NewsItem $newsItem)
    {
        return view('newsItems.form', compact('newsItem'));
    }
}
