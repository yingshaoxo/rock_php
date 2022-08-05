
<?php
require 'rb-mysql.php';
R::setup('mysql:host=localhost;dbname=geekland', 'root', 'root');

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