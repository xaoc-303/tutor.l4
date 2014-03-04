<?php

Article::observe(new ArticleObserver);

Event::listen('article.*', function ($param, $event) {
    Log::info('article Event param='.print_r($param,true));
    Log::info('article Event event='.print_r($event,true));
});

Event::listen('article.test', 'ArticleObserver@test_method');