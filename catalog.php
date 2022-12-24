<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/catalog.css">
    <title>catalog</title>
</head>
<body>
    <div class="container">
    <?php
        $catalog = simplexml_load_file('catalog.xml');
        foreach($catalog->item as $item){
            $name = $item->name;
            $cost = $item->cost;
            $id = $item->attributes()['id'];
            $info = $item->info;
            $h = $item->height;
            $w = $item->width;
            $img = $item->img;
            ?>
            <div class="Pop" id="<?= $id ?>">                  <!-- текст слева -->
                <div class="PopBlock">
                    <div class="Nehz">
                        <?= $name ?>
                    </div>
                    <div class="NehZ1">
                        <?= $info ?>
                    </div>
                    <div>
                        <?= $h ?> x <?= $w ?>
                    </div>
                    <div class="Nehz">
                        <?= $cost ?> руб.
                    </div>
                </div>
                <div class="slide-img">
                    <img src="<?= $img ?>">
                </div>
                <a href="change.php?id=<?= $id ?>" class="change">Change</a>
                <button class="delete" onclick="DeleteItemById(<?= $id ?>)">Delete</button>
            </div>
            <?php
        }
    ?>
    </div>
    <script src="./js/delete.js"></script>
</body>
</html>