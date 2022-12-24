<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-panel</title>
    <link rel="stylesheet" href="./css/change.css">
</head>
<body>
    <?php
    
    if (!empty($_GET['id']))
    {
        $catalog = simplexml_load_file('catalog.xml');
        $getId = $_GET['id'];
        $i = 0;
        $elem;
        foreach ($catalog->item as $item){
            if($item['id'] == $getId){
                $elem = $item;
                echo($elem->id);
                break;
            }
            $i++;
        }

        $name = $elem->name;
        $info = $elem->info;
        $cost = $elem->cost;
        $h = $elem->height;
        $w = $elem->width;
        $img = $elem->img;


        function addFile($elem){
            if ($_FILES["item_img"]['name']) {
                $uploaddir = "./uploads/";
                $item_img = $_FILES["item_img"]['name'];
                move_uploaded_file($_FILES['item_img']['tmp_name'], $uploaddir . $item_img);
                $img_link = $uploaddir . $item_img;
                if(($uploaddir . $item_img )!= $uploaddir && $elem->img != $img_link){
                    unlink($elem->img);
                }
                $elem->img = $img_link;
            }
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $elem->name = $_POST['item_name'];
            $elem->cost = $_POST["cost"];
            $elem->info = $_POST["info"];
            $elem->height = $_POST["h"];
            $elem->width = $_POST["w"];
            addFile($elem);
            $catalog->saveXML('catalog.xml');
        }


        ?>
        <form action="change.php?id=<?= $getId ?>" method="post" enctype="multipart/form-data"> 
            <div class="modal-window">
                <a href="../catalog.php" class="close" id='close-modal'>&times;</a>
                <div class="specifications">
                    
                    <img src="../<?= $item->img ?>" alt="<?= $item->name ?>">
                    
                    <ul>
                        <li>id: <?= $getId ?></li>
                        <li><div class="img"><input type="file" calss="item-img" name="item_img"></div></li>
                        <li>Размеры: <input type="text" name="h" placeholder="Высота" value="<?=$h?>"> x <input type="text" name="w" placeholder="Ширина" value='<?= $w ?>'></li>
                        <li>Имя: <input type="text" class="required-field" name="item_name" placeholder="Название товара" value="<?=$name?>"> </li>
                        <li>Цена: <input type="text" class="required-field" name="cost" placeholder="Цена" value="<?=$cost?>"><p>₽</p></li>
                        <li><textarea name="info" id="" cols="30" rows="10" placeholder="Описание"><?=$info?></textarea></li>
                    </ul> 
                </div>
            </div>
            <input type="submit" class="enter" value="Обновить">
        </form>
        <!-- <script src="../js/create.js"></script>     -->
        <?php
    } 

    else {
        ?><script>alert("Product is not found. Please, check the ID");</script><?php 
    }
    ?>
    
</body>
</html>