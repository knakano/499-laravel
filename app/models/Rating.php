<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/21/14
 * Time: 11:29 PM
 */

class Rating extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
} 