<?php namespace Genetsis\Admin\Extensions;

use \View;

class AdminMenu {

    protected $menu = array();

    public function __construct() {

    }

    public function add($new_item) {
        $this->menu[] = $new_item;
    }

    public function show() {
        $contents = '';
        foreach ($this->menu as $item) {
            $view = View::make($item);

            $contents .= $view->render();
        }

        return $contents;
    }
}