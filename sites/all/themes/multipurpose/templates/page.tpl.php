
<div id="wrap" class="clr container">
    <div id="header-wrap" class="clr fixed-header">
        <header id="header" class="site-header clr">
            <div id="logo" class="clr">
                <?php if (theme_get_setting('image_logo', 'multipurpose')): ?>
                    <?php if ($logo): ?><div id="site-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                            </a></div><?php endif; ?>
                <?php else: ?>
                    <h2 id="site-name">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
                    </h2>
                    <?php if ($site_slogan): ?><div id="site-slogan"><?php print $site_slogan; ?></div><?php endif; ?>
                <?php endif; ?>
            </div>
            <div class='user_details'>
				<span>
				 <?php 
				global $user;
				if (!empty($user->name)) { 
					echo "<a href='/event_mangment/user'>Welcome, ". $user->name .'</a> |  <a href="/event_mangment/user/logout">Log Out</a>' ; 
				}else{
					echo '<a href="/event_mangment/user">Login</a> | <a href="/event_mangment/user/register">Sign Up</a>' ; 
				} ?>
				</span>
				
			</div>
        </header>
    </div>

    <div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
    <div id="site-navigation-wrap">
        <a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span>Menu</a>
        <nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
            <div id="main-menu" class="menu-main-container">
                <?php
                $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                print drupal_render($main_menu_tree);
                ?>
            </div>
        </nav>
    </div>

    <?php if ($is_front): 
		global $obj;
	
		$result = $obj->get_featured_article();
		$slider = '';
		foreach ($result as $results){
			$node_id = $results->nid;
			$slider .="<li>";
			$slider .= "<a href='node/$node_id'><img src= ".file_create_url($results->uri)." /></a>";
			$slider .= "<a href='node/$node_id'><div class='slider_title'>".$results->title."</div></a>";
			$slider .="</li>";
		}
		//die;
	?>

	
        <?php if (theme_get_setting('slideshow_display', 'multipurpose')): ?>
            <div id="homepage-slider-wrap" class="clr flexslider-container">
                <div id="homepage-slider" class="flexslider">
					<div class='featured_event'>Featured Event</div>
                    <ul class="slides clr">
                        <?=$slider?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>


    <?php if ($page['preface_first'] || $page['preface_middle'] || $page['preface_last'] || $page['header']): ?>
        <div id="preface-wrap" class="site-preface clr">
            <div id="preface" class="clr">
                <?php if ($page['preface_first'] || $page['preface_middle'] || $page['preface_last']): ?>
                    <div id="preface-block-wrap" class="clr">
                        <?php if ($page['preface_first']): ?><div class="span_1_of_3 col col-1 preface-block ">
                            <?php print render($page['preface_first']); ?>
                            </div><?php endif; ?>
                        <?php if ($page['preface_middle']): ?><div class="span_1_of_3 col col-2 preface-block ">
                            <?php print render($page['preface_middle']); ?>
                            </div><?php endif; ?>
                        <?php if ($page['preface_last']): ?><div class="span_1_of_3 col col-3 preface-block ">
                            <?php print render($page['preface_last']); ?>
                            </div><?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($page['header']): ?>
                    <div class="span_1_of_1 col col-1">
                        <?php print render($page['header']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>


    <div id="main" class="site-main clr">
        <?php
        $sidebarclass = "";
        if ($page['sidebar_first']) {
            $sidebarclass = "left-content";
        }
        ?>
        <div id="primary" class="content-area clr">
            <section id="content" role="main" class="site-content <?php print $sidebarclass; ?> clr">
                <?php if (theme_get_setting('breadcrumbs')): ?><?php if ($breadcrumb): ?><div id="breadcrumbs"><?php print $breadcrumb; ?></div><?php endif; ?><?php endif; ?>
                <?php print $messages; ?>
                <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
                <div id="content-wrap">
					<?php if ($is_front): ?>
					<h1>Latest Events: </h1>
					<?php endif; ?>
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clr"><?php print render($tabs); ?></div><?php endif; ?>
                    <?php print render($page['help']); ?>
                    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                    <?php print render($page['content']); ?>
                </div>
            </section>

            
        </div>
    </div>

    <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer']): ?>
        <div id="footer-wrap" class="site-footer clr">
            <div id="footer" class="clr">
                <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
                    <div id="footer-block-wrap" class="clr">
                        <?php if ($page['footer_first']): ?><div class="span_1_of_3 col col-1 footer-block ">
                            <?php print render($page['footer_first']); ?>
                            </div><?php endif; ?>
                        <?php if ($page['footer_second']): ?><div class="span_1_of_3 col col-2 footer-block ">
                            <?php print render($page['footer_second']); ?>
                            </div><?php endif; ?>
                        <?php if ($page['footer_third']): ?><div class="span_1_of_3 col col-3 footer-block ">
                            <?php print render($page['footer_third']); ?>
                            </div><?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($page['footer']): ?>
                    <div class="span_1_of_1 col col-1">
                        <?php print render($page['footer']); ?>
                    </div>
                <?php endif; ?>
            </div>
			
        </div>
    <?php endif; ?>

    <footer id="copyright-wrap" class="clear">
        <div id="copyright">
		<?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
		 |<a> Terms & conditions </a>|<a> About us </a>|<a> Site Map </a>
		<?php if (theme_get_setting('socialicon_display', 'multipurpose')): ?>
                <?php
                $twitter_url = check_plain(theme_get_setting('twitter_url', 'multipurpose'));
                $facebook_url = check_plain(theme_get_setting('facebook_url', 'multipurpose'));
                $google_plus_url = check_plain(theme_get_setting('google_plus_url', 'multipurpose'));
                $pinterest_url = check_plain(theme_get_setting('pinterest_url', 'multipurpose'));
                ?>
                <div id="header-social" class="clr">
                    <ul>
                        <?php if ($facebook_url): ?><li>
                                <a target="_blank" title="<?php print $site_name; ?> in Facebook" href="<?php print $facebook_url; ?>"><img alt="Facebook" src="<?php print base_path() . drupal_get_path('theme', 'multipurpose') . '/images/social/facebook.png'; ?>"> </a>
                            </li><?php endif; ?>
                        <?php if ($twitter_url): ?><li>
                                <a target="_blank" title="<?php print $site_name; ?> in Twitter" href="<?php print $twitter_url; ?>"><img alt="Twitter" src="<?php print base_path() . drupal_get_path('theme', 'multipurpose') . '/images/social/twitter.png'; ?>"> </a>
                            </li><?php endif; ?>
                        <?php if ($google_plus_url): ?><li>
                                <a target="_blank" title="<?php print $site_name; ?> in Google+" href="<?php print $google_plus_url; ?>"><img alt="Google+" src="<?php print base_path() . drupal_get_path('theme', 'multipurpose') . '/images/social/google.png'; ?>"> </a>
                            </li><?php endif; ?>
                        <?php if ($pinterest_url): ?><li>
                                <a target="_blank" title="<?php print $site_name; ?> in Pinterest" href="<?php print $pinterest_url; ?>"><img alt="Pinterest" src="<?php print base_path() . drupal_get_path('theme', 'multipurpose') . '/images/social/pinterest.png'; ?>"> </a>
                            </li><?php endif; ?>
                        <li>
                            <a target="_blank" title="<?php print $site_name; ?> in RSS" href="<?php print $front_page; ?>rss.xml"><img alt="RSS" src="<?php print base_path() . drupal_get_path('theme', 'multipurpose') . '/images/social/rss.png'; ?>"> </a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
		
		</div>
		
    </footer>
</div>