<?php
    include 'db.php';
    header("Content-Type: application/json");
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['id'])  && ctype_digit($_GET['id'])){
                $id = $_GET['id'];
                if($id == 0){
                    $result = query("SELECT `entity_id` as id,`name` FROM `catalog_category_flat_store_1` WHERE `entity_id`>2");
                    $categories = array();
                    while($res = mysql_fetch_assoc($result)){
                        $categories[$res['id']]['name'] = $res['name'];
                    }         
                } else {
                    $result = query("SELECT `entity_id` as id,`name` FROM `catalog_category_flat_store_1` WHERE `entity_id`= $id");
                    $categories = array();
                    while($res = mysql_fetch_assoc($result)){
                        $categories[$res['id']]['name'] = $res['name'];
                    }
                }
                echo json_encode($categories);
                die();
            }
            break;
        case 'POST':
            if(isset($_POST['name'])){
                $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
                query("insert into `catalog_category_flat_store_1` (`name`) value ('$name')");            
            }
            break;
        case 'PUT':
            break;
        case 'DELETE':
            break;
    }
