<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторские букеты в Петербурге</title>
    <link rel="stylesheet" href="./css/styleFlower.css"/>

    <!-- Шрифты -->
    <link rel="stylesheep" href="./fonts/Montserrat/montserrat.css"/>
    <link rel="stylesheep" href="./fonts/PlayfairDisplay/stylesheet.css"/>
    <link rel="stylesheep" href="./fonts/AvenirNextCyr/stylesheet.css"/>
    <link rel="stylesheep" href="./fonts/SegoeUI/stylesheet.css"/>

</head>
<body>
    <div class="containerGlav"> 

        <div class="top-van-menu-container" id="topNavMenu" onclick="openMenu()">    <!-- блок меню сверху -->
            <a href="#"><div>Каталог</div></a>
            <a href="#"><div>Доставка и оплата</div></a>
            <a href="#"><div>Отзывы</div></a>
            <a href="#"><div>Спецпредложения</div></a>
            <a href="#"><div>Контакты</div></a>
            <a href="#"><div>Корзина</div></a>
            <div class="toggle-bth">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        
        <div class="column">         <!-- блок первой страницы -->
            <div class="top-left">         <!-- текст слева -->
                <div>
                    <div>Авторские букеты</div>
                    <div id="Naclon">в Петербурге</div>
                </div>
                
                <div id="Menshe">
                    <div>Оригинальные свежие букеты</div>
                    <div>с доставкой по всему городу</div>
                </div>
                
                <div class="Look"><a href="#">Смотреть каталог</a></div>
            </div>
    
            <div class="top-right">             <!-- картинка справа -->
                <img src="./img/First.svg">
            </div>
        </div>

        <div class="short">  <!-- блок с короткой информацией (3) -->
            <div class="shortBox">
                <div class="Box"><img src="./img/Car.svg"></div>
                <div class="blocks">
                    <div class="Z1">Быстрая доставка</div>
                    <div class="Z2">Можем собрать букет и передать его в доставку всего за час.</div>
                </div>
            </div>
            
            <div class="shortBox">
                <div class="Box"><img src="./img/FlowerSmall.svg"></div>
                <div class="blocks">
                    <div class="Z1">Всегда свежие цветы</div>
                    <div class="Z2">Тщательно следим за состоянием цветов, а опытные флористы отбирают для букетов каждый цветок.</div>
                </div>
            </div>
            
            <div class="shortBox">
                <div class="Box"><img src="./img/Camera.svg"></div>
                <div class="blocks">
                    <div class="Z1">Отправляем фото цветов</div>
                    <div class="Z2">Перед доставкой сделаем фотографию букета и отправим вам.</div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="./css/slider.css">
        
        <div class="Popular">             <!-- заголовок -->
            Популярные букеты
        </div>

        <div class="BlockYellow">   <!-- блок "Популярные букеты" -->
            <a class="prev" onclick="plusSlides(-1)">❮</a>
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
                    <div class="Pop mySlides" id="<?= $id ?>">                  <!-- текст слева -->
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
                            <div class="Klick"><a href="#">Заказать</a></div>
                            
                        </div>
                        <div class="slide-img">
                            <img src="<?= $img ?>">
                        </div>
                    </div>
                    <?php
                }
            ?>
            
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>

        <script src="./js/slider.js"></script>

        <div>                           <!-- блок скидка 10% -->
            <div class="Pop">             <!-- текст слева -->
                <div class="column2">
                    <div id="SaleLeft">
                        <div id="Sale">
                            Скидка 10% <br>на первый заказ
                        </div>
                        <div id="SaleText">
                            Если заказываете у нас букет впервые — при оформлении заказа введите промокод «Botanika2021» и получите скидку 10%.
                        </div>  
                    </div>                   
                    <div>
                        <img src="./img/SALE.jpg">
                    </div>
                </div>
            </div>

        </div>

        <div class="Katalog">                 <!-- блок каталога -->
            <a href="#" class="position">
                <img src="./img/1Blok.jpg" alt="">
                <img src="./img/Sloy.svg" alt="">
                <div>
                    <div class="H">Свадебные букеты</div>
                    <div>Букеты для невест</div>
                </div>
            </a>
            <a href="#" class="position">
                <img src="./img/2Blok.jpg" alt="">
                <img src="./img/Sloy.svg" alt="">
                <div>
                    <div class="H">Букеты с пионами</div>
                    <div>Букеты с сезонными пионами</div>
                </div>
            </a>
            <a href="#" class="position">
                <img src="./img/3Blok.jpg" alt="">
                <img src="./img/Sloy.svg" alt="">
                <div>
                    <div class="H">Выбрать букет</div>
                    <div>Букеты в ассортименте</div>
                </div>
            </a>
        </div>

        <div class="Otziv">                    <!-- блок с отзывами -->
            <div class="Ottz"><a href="#">Отзывы</a></div>
            <div class="OtzColumn">
                <div class="OtzOts">
                    <div>
                        Всё очень понравилось! Быстрое оформление заказа, выбор удобного времени доставки. Всем большое спасибо!
                    </div>
                    <div class="OtzName">
                        Марина
                    </div> 
                </div>
                <div class="OtzOts">
                    <div>
                        Внимательные флористы, вежливые. Магазин находится прям рядом с метро. Букет очень понравился, буду ещё заказывать!
                    </div>
                    <div class="OtzName">
                        Татьяна
                    </div>
                </div>
                <div class="OtzOts">
                    <div>
                        Выбор букетов на любой вкус и цену. Бывают хорошие скидки, а флористы всегда помогут и точно соберут красивый букет!
                    </div>
                    <div class="OtzName">
                        Ольга
                    </div>
                </div>
            </div>

        </div>

        <div class="Futer">              <!-- блок футер -->
            <div><a href="#">Каталог</a></div>
            <div><a href="#">Доставка и оплата</a></div>
            <div><a href="#">Отзывы</a></div>
            <div><a href="#">Спецпредложения</a></div>
            <div><a href="#">Контакты</a></div>
        </div>

    </div>

    <script>
        function openMenu() {
            document.getElementById('topNavMenu').classList.toggle('active');
        }
    </script>

</body>
</html>