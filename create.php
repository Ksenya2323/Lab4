<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!checking()){
            ?><script>alert("Ошибка: товар уже существует.")</script><?php
        }
        else{
            addItem();
            ?><script>alert("Товар успешно добавлен")</script><?php
        }
        
    }

    function checking(){
        $catalog = simplexml_load_file('catalog.xml');
        $searchName = $_POST["item_name"];
        foreach( $catalog->item as $child){
            if ($child->name == $searchName){
                return false;
            }
        }
        return true;
    }

    function createNewID(){
        $catalog = simplexml_load_file('catalog.xml');
        $id = 0;
        foreach( $catalog->item as $child){
            if ((int)($child->attributes()['id']) > $id){
                $id = $child->attributes()['id'];
            }
        }
        return $id + 1;
    }

    function addItem()
    {
        $catalog = simplexml_load_file('catalog.xml');
        
        $item_id = createNewID();
        $item_name = $_POST["item_name"];
        $item_cost = $_POST["cost"];
        $item_info = $_POST["info"];
        $h = $_POST['item_h'];
        $w = $_POST['item_w'];


        $uploaddir = "./uploads/";
        $item_img = $_FILES["item_img"]['name'];
        move_uploaded_file($_FILES['item_img']['tmp_name'], $uploaddir . $item_img);
        
        $item = $catalog->addChild('item', '');
        $item->addAttribute('id', $item_id);
        $item->addChild("name", $item_name);
        $item->addChild("cost", $item_cost);
        $item->addChild("info", $item_info);
        $item->addChild("height", $h);
        $item->addChild("width", $w);
        if(($uploaddir . $item_img )!= $uploaddir){
            $item->addChild("img", $uploaddir . $item_img);
        }

        $catalog->saveXML('catalog.xml');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-panel</title>
    <style>
        .catalog-add-form{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        form{
            width: 500px;
            display:flex;
            flex-direction:column;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="catalog-add-form">
            <p>Введите данные товара</p>
            <form id="post-element" action="create.php" method="post" enctype="multipart/form-data">
                <input type="text" name="item_name" placeholder="Название товара">
                <div style="display:flex"><input type="text" name="cost" placeholder="Цена"><p style="margin:0">₽</p></div>
                <textarea name="info" id="" cols="30" rows="10" placeholder="Описание"></textarea>
                <input type="text" name="item_h" placeholder="Высота">
                <input type="text" name="item_w" placeholder="Ширина">
                <div class="img">Загрузите изображение товара:<br><input type="file" name="item_img"></div></br>
                <input type="submit" class="enter" value="Создать">
            </form>
            <?php
                function exist(){
                    echo("Ошибка: товар уже существует.");
                }
            ?>
        </div>
    </div>
</body>
</html>