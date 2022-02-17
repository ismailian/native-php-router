<?php

use FlexRouter\Helpers\Url;
use PHPUnit\Framework\TestCase;

class FlexRouterTest extends TestCase
{

   use Url;

   /**
    * @test
    */
   public function match_url_to_route()
   {
      $all = [
         '/'                                          => '/',
         '/about'                                     => '/about',
         '/contact'                                   => '/contact/',
         '/users/:username'                           => '/users/ismail',
         '/users/:username/profile'                   => '/users/ismail/profile',
         '/news/:news-title/'                         => '/news/my-first-news-article/', // invalid route
         '/news/:news_title/'                         => '/news/my first news article/', // invalid url
         '/articles/:article_name/'                   => '/articles/my-first-article',
         '/drives/:drive/folders/:folder/files/:file' => '/drives/d-o6EdsV32/folders/jY62GavR/files/f-4628163',

      ];

      $valid = 0;
      foreach ($all as $route => $url)
         if ($this->getInfo($url, $route)['isMatch'])
            $valid++;

      $this->assertEquals(7, $valid);
   }
}
