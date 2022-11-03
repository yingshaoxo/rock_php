<?php
require 'rb-mysql.php';

R::setup('mysql:host=db;dbname=geekland', 'root', '123456');
#R::setup('mysql:host=141.002.009.163;dbname=geekland', 'root', '1256');

function get_sql_offset_and_limit_command_by_using_pagesize_and_pagenum($page_size, $page_num)
{
    // 20
    // 0: 20*(-1) - 20*0
    // 1: 20*0-20*1
    // 2: 20*1-40*2
    // 3: 20*2-60*3
    if (($page_size <= 0) || ($page_num <= 0)) {
        return " ;";
    }
    if (is_null($page_size) || is_null($page_num)) {
        return " ;";
    }
    return sprintf(" LIMIT %d OFFSET %d;", $page_size * $page_num, $page_size * ($page_num - 1));
}

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