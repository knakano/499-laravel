<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/18/14
 * Time: 4:13 PM
 */

class DVDController extends BaseController{

    public function search() {
        return View::make('dvds/search');
    }

    public function listDVDs() {

        $dvd_title = Input::get('dvd_title');

        $dvds = DVD::search($dvd_title);
        // dd($songs);

        return View::make('dvds/dvds-list', [
            'dvds' => $dvds

        ]);
    }



}