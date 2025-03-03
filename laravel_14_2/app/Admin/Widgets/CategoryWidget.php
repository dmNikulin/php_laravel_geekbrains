<?php
namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Category;

class CategoryWidget extends AbstractWidget {
    protected $config = [];

    public function run()
    {
        $count = Category::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => 'Счетчик товаров',
            'text' => $count,
            'image' => '',
            'button' => [
                'text' => 'Понятно',
                'link' => 'a'
            ]
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true;
    }
}