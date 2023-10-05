<?php

    session_start();
    require_once('php\controllers\index-ctrl.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="styles\index.css">
    <link rel="stylesheet" href="styles\page-container.css">    
    <script src="js/index.js"></script>
    <?php include_once('php/includes/common-css-js.php'); ?>
</head>
<body>
    <?php
        include("php/templates/header.php");
    ?>

    <!--body-->
    <form class="search-form" action="index.php">
        <input type="search" name="search" id="search">
        <input type="submit" value="Search">
        <input id='adv-search' type="button" value="advanced search" onclick="advancedSearch()">

        <div class="advanced-search">
            <div class="s-field">
			<label class="hide" for="min_price">min price</label>
            <input class='hide' type="number" name="min_price" id="min_price"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="max_price">max price</label>
            <input class='hide' type="number" name="max_price" id="max_price"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="min_area">min area</label>
            <input class='hide' type="number" name="min_area" id="min_area"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="max_area">max area</label>
            <input class='hide' type="number" name="max_area" id="max_area"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="min_date">min date</label>
            <input class='hide' type="date" name="min_date" id="min_date"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="max_date">max date</label>
            <input class='hide' type="date" name="max_date" id="max_date"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="city">city</label>
            <input class='hide' type="text" name="city" id="city"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="district">district</label>
            <input class='hide' type="text" name="district" id="district"   disabled>
			</div>
            <div class="s-field">
			<label class="hide" for="province">province</label>
            <input class='hide' type="text" name="province" id="province"   disabled>
			</div>

        </div>
    </form>

    <div class="container">

        <?php if (isset($results)) : ?>
            <div class="first">
                <h3>Results</h3>
                <div class="card-container">
                    <?php 
                        if ($results)
                        {
                            foreach ($results as $cardData)
                            {
                                include('php\templates\sale-card.php');
                            }
                        }
                        else
                        {
                            echo "<h2>No results found</h2>";
                        }
                    ?>
                </div>
            </div>
        <?php else : ?>
            <div class="first">
                <h3>Top-Sales</h3>
                <div class="card-container">
                    <?php 
                        if ($topPosts)
                        {
                            foreach ($topPosts as $cardData)
                            {
                                include('php\templates\sale-card.php');
                            }
                        }
                        else
                        {
                            echo "<h2>No results found</h2>";
                        }
                    ?>
                </div>
            </div>
            <div class="second">
                <h3>Sales</h3>
                <div class="card-container">
                    <?php 
                        if ($posts)
                        {
                            foreach ($posts as $cardData)
                            {
                                include('php\templates\sale-card.php');
                            }
                        }
                        else
                        {
                            echo "<h2>No results found</h2>";
                        }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="btn-container-ralign">
            <?php
                $uri =  $_SERVER['REQUEST_URI'];
                if (preg_match("/page=/", $uri))
                {
                    $page = (int)$_GET['page'];
                    if ($page > 1)
                    {
                        echo "<input type='button' class='page-btn' value='Prev Page' onclick=\"window.location.href = '".preg_replace("/page=\d+/", 'page='.$page - 1, $uri)."' \">";
                    }
                    echo "<input type='button' class='page-btn' value='Next Page' onclick=\"window.location.href = '".preg_replace("/page=\d+/", 'page='.$page + 1, $uri)."' \">";
                }
                else{
                    echo "<input type='button' class='page-btn' value='Next Page' onclick=\"window.location.href = '".preg_replace("/php.?/",'php?page=2&', $uri)."' \">";
                    
                }
            ?>
        </div>
    </div>

    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>