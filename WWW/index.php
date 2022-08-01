<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8" />
  <title>GeekLand</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="renderer" content="webkit" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="format-detection" content="telephone=no" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="Cache-Control" content="no-store, must-revalidate" />
  <meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT" />
  <meta http-equiv="expires" content="0" />
  <style>
    body {
      font: 16px arial, "Microsoft Yahei", "Hiragino Sans GB", sans-serif;
    }

    h1 {
      margin: 0;
      color: #3a87ad;
      font-size: 26px;
    }

    .content {
      width: 45%;
      margin: 0 auto;
    }

    .content>div {
      margin-top: 200px;
      padding: 20px;
      background: #d9edf7;
      border-radius: 12px;
    }

    .content dl {
      color: #2d6a88;
      line-height: 40px;
    }

    .content div div {
      padding-bottom: 20px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="content">
    <div>
      <h1>站点创建成功</h1>
      <p>This is the website created by yingshaoxo!</p>
    </div>
  </div>
</body>

</html>

<?php
// require 'rb-mysql.php';
// R::setup('mysql:host=localhost;dbname=test', 'root', 'root');

// # create a table
// R::store(R::dispense([
//   '_type' => 'book',
//   'title' => 'My Book',
//   'ownPageList' => [
//     ['_type' => 'page', 'name' => 'first page']
//   ]
// ]));

// $post = R::dispense('post');
// $post -> title = "My holiday";
// $id = R::store($post);

// # update data
// $book = R::load( 'book', $id ); //reloads our book
// $post_list = R::findAll('post', 'title = ?', ['My holiday']);
// foreach($post_list as $item) {
//   print($item->title);
//   // $item->title = "ok";
//   // R::store($item);
//   print("<br>");
// }

// # query data
// $post_list = R::getAll('SELECT * FROM post');
// foreach($post_list as $item) {
//   print($item['title']);
//   print("<br>");
// }

// # delete data
//R::trash($item);
// R::wipe('post');
?>