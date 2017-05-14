<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;

class PageDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Voyager::model('Category')->count();
        $string = $count == 1 ? 'category' : 'categories';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-categories',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string} in your database. Click on button below to view all categories.",
            'button' => [
                'text' => 'View all categories',
                'link' => url('/admin/categories'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.png'),
        ]));
    }
}
