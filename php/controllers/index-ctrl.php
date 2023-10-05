<?php

    require_once('php\includes\dbFunctions.php');
    if(isset($_GET['search']))
    {
        if(isset($_GET['min_price']))
        {
            if (isset($_GET['page'])) $data = advancedSearchSale($_GET, (((int)$_GET['page']) - 1) * 30);
            else $data = advancedSearchSale($_GET);
        }
        else{
            if (isset($_GET['page'])) $data = searchSale($_GET['search'], (((int)$_GET['page']) - 1) * 30);
            else $data = searchSale($_GET['search']);
        }

        

        $results = $data['results'];
        $count = $data['count'];

    }
    else
    {
        if (isset($_GET['page'])) $data = getSales((((int)$_GET['page']) - 1) * 15);
        else $data = getSales();

        $topPosts = $data['top'];
        $posts = $data['posts'];
        $count = $data['count'];
    }

?>