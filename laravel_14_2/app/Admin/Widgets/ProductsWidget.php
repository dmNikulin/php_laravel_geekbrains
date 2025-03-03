<?php
namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Product;

class ProductsWidget extends AbstractWidget 
{
    protected $config = [];

    public function run()
    {
        $count = Product::count();

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