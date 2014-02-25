<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/24/14
 * Time: 6:11 PM
 */

class Sound extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
} 