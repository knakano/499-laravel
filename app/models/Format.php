<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/24/14
 * Time: 6:11 PM
 */

class Format extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
} 