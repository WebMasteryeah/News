
<!-- News Overview -->
<h2>Delete news Items</h2>
<?php 
    //set template
    $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
    $this->table->set_template($tmpl);
    
    //add news_items to the table
    foreach($news as $news_item): 
    
        //read more link
        $slug= $news_item['slug'];
        $linkRead = anchor('news/'.$slug, 'Read More', 'title="read"');
        
        // delete link
        $linkDelete = anchor('news/delete/'.$slug, 'Delete', 'title="delete"');
        
        //displaying words is limited
        $text = $news_item['text'];
        $len = str_word_count($text);
        $text = word_limiter($text, 30);
        
        if($len>=15){ //if the length of text is more than limit
            $row_2 = $text.' '.$linkRead;  //text + read more 
        } else{  //otherwise
            $row_2 = $text; // display text only
        }
        $this->table->add_row($news_item['title'], $row_2, $linkDelete);
        $this->table->add_row("<hr>", "<hr>", "<hr>");
?>

<div id="main">
    <?php 
        //-- Display Table
        $table = $this->table->generate();
        echo $table;
    ?>
    
</div>

<?php endforeach ?>

