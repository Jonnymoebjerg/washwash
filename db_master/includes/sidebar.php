<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <?php
                foreach(glob_sidebar_items as $item_name => $item_active) {
                    if ($item_active === "1") {
                        if ($item_name === "Home") {
                            $item_link = "index";
                        } else {
                            $item_link = strtolower($item_name);
                        }
                        
                        $currpage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
                        if ($currpage === strtolower($item_link)) {
                            $item_class = ' class="active"';
                        } else {
                            $item_class = "";
                        }
                        
                        $item_icon = glob_sidebar_item_icons[$item_name];
                        
                        echo '<li' . $item_class . '><a href="' . str_replace(' ', '', $item_link) . '.php"><i class="fa ' . $item_icon .'"></i> <span>' . $item_name . '</span></a></li>';
                    }
                }
            ?>
        </ul>
    </section>
</aside>