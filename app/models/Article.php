<?php

class Article extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    public static function validate($input = array()) {

        $rules = [
            'title' => 'required',
            'body'  => 'required',
        ];

        $validation = Validator::make($input, $rules);
        if ( $validation -> fails() ) {
            return false;
        }

        return true;
    }

}