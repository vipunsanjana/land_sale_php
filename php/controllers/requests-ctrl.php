<?php

    require_once('php\includes\dbFunctions.php');
    if(isset($_GET['search']))
    {
        if(isset($_GET['min_price']))
        {
            if (isset($_GET['page'])) $data = advancedSearchRequest($_GET, (((int)$_GET['page']) - 1) * 30);
            else $data = advancedSearchRequest($_GET);
        }
        else{
            if (isset($_GET['page'])) $data = searchRequest($_GET['search'], (((int)$_GET['page']) - 1) * 30);
            else $data = searchRequest($_GET['search']);
        }
        $results = $data['results'];
        $count = $data['count'];

    }
    else
    {
        if (isset($_GET['page'])) $data = getRequests((((int)$_GET['page']) - 1) * 15);
        else $data = getRequests();

        $topPosts = $data['top'];
        $posts = $data['posts'];
        $count = $data['count'];
    }

?>