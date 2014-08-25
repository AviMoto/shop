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
                        $productRes = query("Select pf.`entity_id` as id, pf.`name`, pf.`price` from `catalog_category_product` as cp inner join `catalog_product_flat_1` as pf on (cp.`product_id` = pf.`entity_id`) where cp.`category_id` = ". $res['id']);
                        $categories[$res['id']]['name'] = $res['name'];
                        while ($product = mysql_fetch_assoc($productRes)) {
                           $categories[$res['id']]['products'][$product['id']]['name'] =  $product['name'];
                           $categories[$res['id']]['products'][$product['id']]['price'] =  $product['price'];
                        }                            
                    }      
                } else {
                    $result = query("SELECT `entity_id` as id,`name` FROM `catalog_category_flat_store_1` WHERE `entity_id`= $id");                    
                    $categories = array();
                    while($res = mysql_fetch_assoc($result)){
                        $productRes = query("Select pf.`entity_id` as id, pf.`name`, pf.`price` from `catalog_category_product` as cp inner join `catalog_product_flat_1` as pf on (cp.`product_id` = pf.`entity_id`) where cp.`category_id` = ". $res['id']);
                        $categories[$res['id']]['name'] = $res['name'];
                        while ($product = mysql_fetch_assoc($productRes)) {
                           $categories[$res['id']]['products'][$product['id']]['name'] =  $product['name'];
                           $categories[$res['id']]['products'][$product['id']]['price'] =  $product['price'];
                        }
                    }
                }
                echo json_encode($categories);
                die();
            }
            break;
        case 'POST':
            if(isset($GLOBALS['HTTP_RAW_POST_DATA'])){
                $postData = json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true);
                $name = filter_var($postData['name'],FILTER_SANITIZE_STRING);
                query("insert into `catalog_category_flat_store_1` (`name`) value ('$name')");            
            }
            break;
        case 'PUT':
            break;
        case 'DELETE':
            break;
    }
