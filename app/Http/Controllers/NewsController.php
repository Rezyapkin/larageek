<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news.index', ['newsList' => $this->getNewsList()]);
    }

    public function show(int $id) {
        if (!$this->getNewsById($id)) {
            abort('404');
        } else {
            return view('news.show', ['news' => $this->getNewsById($id)]);
        }
    }

    public function showByCategory(int $id) {
        return view('news.index', ['newsList' => $this->getListNewsByCategoryId($id)]);
    }
}
