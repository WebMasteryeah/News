<?php echo doctype('html5');  ?>  <!--use of html_helper module-->
<?php echo link_tag('/design/css/news.css'); ?>
<?php echo link_tag('/design/navbar/css/stylesheet.css'); ?>

<?php
    
?>

<html>
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    
    <div id="container">
        <!-- site banner, menu etc would go here -->
        <h1>News Service Very Limited</h1>
        <div id="nav">
            <ul class="menu">
                <li><a class="<?php echo $viewA; ?>" href="http://localhost/News/index.php/news"><span>Home</span></a></li>
                <li><a class="<?php echo $createA; ?>" href="http://localhost/News/index.php/news/create"><span>Create</span></a></li>
                <li><a class="<?php echo $deleteA; ?>" href="http://localhost/News/index.php/news/deleteView"><span>Delete</span></a></li>
            </ul>
        </div>
        <div id="contents">
            <?php echo $content; ?>
        </div>
        <p class="footer">Written by Maya Jung 2013</p>
    </div>
</body>
</html>
