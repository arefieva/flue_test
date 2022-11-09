<?php

class Model_News extends \Model_Crud
{
    protected static $_table_name = 'news';

    protected static $_primary_key = 'new_id';

    protected static $_rules = [
        'title' => 'required',
        'short_description' => 'required',
        'full_content' => 'required',
        'author' => 'required',
    ];

    protected static $_properties = [
        'new_id',
        'title',
        'short_description',
        'full_content',
        'author',
        'created_at',
    ];

    protected static $_created_at = 'created_at';
}