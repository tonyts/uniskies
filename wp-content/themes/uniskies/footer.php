<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Uniskies
 * @since Uniskies 1.0
 */
?>
        <div class="footer">
            <?php wp_nav_menu(array('theme_location' => 'primary'))?>
            <!--ul>
                <li><a href="?c=about">About</a></li>
                <li><a href="?c=article">Ideology</a></li>
                <li><a href="?c=article">Services</a></li>
                <li><a href="?c=article">Organization</a></li>
                <li><a href="?c=article">History</a></li>
            </ul-->
            <span class="copy">© Copyright 2013 Uniskies</span>
            <a class="top" href="#top">回到頂端</a>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>