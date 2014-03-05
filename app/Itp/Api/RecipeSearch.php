<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 3/4/14
 * Time: 4:10 PM
 */

namespace Itp\Api;


class RecipeSearch {

    public function getResults($query) {

        $endpoint = "http://www.recipepuppy.com/api/?q=" . $query;
        $json = file_get_contents($endpoint);
        return json_decode($json);
    }

} 