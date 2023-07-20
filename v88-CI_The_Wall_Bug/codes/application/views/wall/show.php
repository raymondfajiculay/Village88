<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="The Wall - Final">
        <meta name="author" content="Karen Marie E. Igcasan">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/wall_style.css"/>
    </head>
    <body>
        <nav>
            <h1>CodingDojo Wall</h1>
            <p>Welcome <?=$first_name?></p>
            <a href="<?=base_url();?>logoff">Logoff</a>
        </nav>        
        
        <?=$this->session->flashdata('input_errors'); ?>

        <h2>Post a message</h2>
        <form action="<?=base_url();?>wall/add_message" method="post">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <textarea name="message_input"></textarea>

            <input type="submit" value="Post a message"/>
        </form>
<?php   
        foreach($inbox as $message) {
?>
            <h3><?=$message["message_sender_name"]?> - <?=$message["message_date"]?></h3>
            <p><?=$message["message_content"]?></p>
                
<?php       foreach($message['comments'] as $comment) {
?>              <h4><?=$comment['comment_sender_name']?> - <?=$comment['comment_date']?></h4>
                <p><?=$comment['comment_content']?></p>
<?php       }
?>          <form action="<?=base_url();?>wall/add_comment" method="post" class="comment_form">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="message_id" value="message_id"/>

                <label for="comment_input">Post a comment</label>
                <textarea name="comment_input"></textarea>               

                <input type="submit" value="Post a comment"/>
            </form> 
<?php   }
?>
    </body>
</html>
