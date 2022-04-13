<?php

namespace App\Helpers;

class CategoryHelper
{
    public static function getCategoryMultiLevel($categories, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {
                $html .= ' <option value="' . $category->id . '">' . $char .' '. $category->name . '</option> ';
                unset($categories[$key]);
                $html .= self::getCategoryMultiLevel($categories, $category->id, $char . ''.'-');
            }
        }
        return $html;
    }
}
