<?php

class Controller_News extends Controller
{
    public function action_home()
    {
        $entry = Model_News::find([
            'order_by' => ['created_at' => 'desc']
        ]);

        return Response::forge(View::forge('news/index', ['news' => $entry]));
    }
}
