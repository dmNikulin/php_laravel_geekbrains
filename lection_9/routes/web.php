<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Events\NewsHidden;

Route::get('/', function () {
    return view('welcome');
});

Route::get('news/create-test', function () {
    $news = new News();

    $news->title="First news";
    $news->body="Welcome to the our news web page";

    $news->save();

    return $news;
});

Route::get('/news/{id}/hide', function ($id) {
   $news = News::findOrFail($id);
   $news->hidden = true;
   $news->save();

   $news_hidden = new NewsHidden($news);
   
   return 'News hidden';
});
