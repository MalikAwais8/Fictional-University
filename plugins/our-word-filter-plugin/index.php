<?php 
/* 
Plugin Name: Our Word Filter Plugin
Description: A truly amazing plugin to filter your words
Version: 1.0
Author: Awais
Author URI: http://fictional-university.local/
*/

if(!defined('ABSPATH')) exit;

class OurWordFilterPlugin {
    function __construct()
    {
        add_action('admin_menu', array($this, 'ourMenu'));
    }
    function ourMenu(){
        $mainPageHook = add_menu_page('Words to Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+', 100);
        add_submenu_page('ourwordfilter', 'Word List', 'Words List', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'));
        add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
        add_action("load-$mainPageHook", array($this, 'mainPageAssets'));
    }
    function mainPageAssets(){
        wp_enqueue_style('filterAdminCSS', plugin_dir_url(__FILE__) . 'styles.css');
    }
    function wordFilterPage(){ ?>
<div class="wrap">
    <h1>Word Filter</h1>
    <form method="POST">
        <label for="plugins_word_to_filter"><p>Enter a <strong>comma-separated</strong> list of words from your site's content</p></label>
        <div class="word-filter__flex-container">
            <textarea name="plugins_word_to_filter" id="plugins_word_to_filter" placeholder="bad, mean, horrible, awful"></textarea>
        </div>
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </form>
</div>
    <?php }

    function optionsSubPage(){ ?>
<h2>Sub Page</h2>
    <?php }
}

$ourWordFilterPlugin = new OurWordFilterPlugin();
?>