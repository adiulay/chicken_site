<?php

function say_hello_news() {
    return "Hello Chicken app!";
}

function chicken_news_api() {
    return '78f7752ea1b44ef7a6e2a8d7461f289d';
}

function chicken_news( $apikey ) {
    if ( !isset($apikey["key"]) ) {
        return 'Requires api key using keyword: key.';
    }

    $url = "https://newsapi.org/v2/everything?q=chicken&from=" . date('Y-m-d') . "&sortBy=publishedAt&apiKey=" . $apikey["key"];
    $data = wp_remote_get($url);
    $body = wp_remote_retrieve_body($data);

    $json = json_decode($body, true);

    if (!$body) {
        return 'Chicken news is currently down, sorry for inconvenience.';
    } else if ($json["status"] == "error") {
        return $json["message"];
    } 
    
    return $json['articles'];
}

function display_chicken_news( $apikey ) {
    $json = chicken_news( $apikey );

    foreach ($json as $news_article) { ?>
    <div class="chicken_article">
        <h1><?php echo $news_article['title']; ?></h1>
        <h2><?php echo $news_article['author']; ?></h2>
        <p>
            <?php echo $news_article['description']; ?>
        </p>
    </div>
    <?php
    }
}