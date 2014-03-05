<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 3/4/14
 * Time: 4:21 PM
 */

class RecipeController extends BaseController{

    public function search() {
        return View::make('recipes/search');
    }

    public function listRecipes() {

        $recipe = new \Itp\Api\RecipeSearch();
        $query = Input::get('title');
        $json = $recipe->getResults($query);

        return View::make('recipes/recipes-list', [
            'recipes' => $json->results
        ]);
    }

} 