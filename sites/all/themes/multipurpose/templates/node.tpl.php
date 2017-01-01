<?php
global $obj ,$user;
?>

<?php if (!$page): ?>
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php endif; ?>
    <?php if (!$page): ?>
        <header>
        <?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if (!$page): ?>
            <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <?php if ($display_submitted): ?>
            <ul class="meta clearfix">
                <li><strong>Posted on:</strong> <?php print $date; ?></li>
                <li><strong>By:</strong> <?php print $name; ?></li>
            </ul>
        <?php endif; ?>

        <?php if (!$page): ?>
        </header>
    <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
		<?php if (!$is_front): ?>
			<?php
				$nodeid = (arg(0) == 'node' && is_numeric(arg(1)))?arg(1):FALSE; 
				$result = $obj->get_status_of_event($nodeid);
				if($result > 0 ) :
			?>
		
				<a id="<?php echo $nodeid.'|'.$user->name;?>" class="book_seat" onclick='ajax_book_seat(this.id)'>Click here to book Seat</a>
			<?php endif;?>
			
		<?php endif; ?>
        <?php
        // Hide comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //hide($content['field_featured_event']);
        print render($content);

        ?>
		
    </div>

    <?php if (!empty($content['links'])): ?>
        <footer>
            <?php print render($content['links']); ?>
        </footer>
    <?php endif; ?>

    <?php //print render($content['comments']); ?>
    <?php if (!$page): ?>
    </article> <!-- /.node -->
<?php endif; ?>