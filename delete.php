
<?php
//unit of work
//repository

//data access layer
//java + spring , C# +asp.net core
    ?><script>alert("Delete запущен")</script><?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        ?><script>alert("Пост получен")</script><?php
        $xml = simplexml_load_file("catalog.xml") or die("Error: Cannot create object");
        $id = $_GET['id'];
        $i = 0;
        foreach ($xml->item as $item){
            if($item['id'] == $id){
                unset($xml->item[$i]);
                break;
            }
            $i++;
        }
        $xml->saveXML('catalog.xml');
    }


?>