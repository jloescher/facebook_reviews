<?php
/**
 * Created by PhpStorm.
 * User: jonat
 * Date: 5/13/2016
 * Time: 9:30 AM
 */

function like_facebook( $atts ) {
    ?>
        <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
        </div>
    <?php
}
add_shortcode( 'likefacebook', 'like_facebook' );