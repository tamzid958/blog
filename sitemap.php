<?php
//sitemap.php
require_once 'controller/controller.php';
$sitemap_urls = sitemap();

$base_url = "https://" . $_SERVER['SERVER_NAME'] . "/post.php/";

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

foreach ($sitemap_urls as $sitemap_url) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url . $sitemap_url["post_slug"] . '</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}

echo '</urlset>' . PHP_EOL;
