<?php
	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Bad_Movie_Night
	 */

?>

</div>

<footer class="bg-black text-white mt-5">
    <div class="container pt-4">
        <div class="row">
<!--            <div class="col-md-4">-->
<!--                <h3>Latest News</h3>-->
<!--                <div class="media">-->
<!--                    <div class="media-body">-->
<!--                        <h5 class="mt-0 mb-1">List-based media object</h5>-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante-->
<!--                        sollicitudin.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="media my-4">-->
<!--                    <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"-->
<!--                         alt="Generic placeholder image">-->
<!--                    <div class="media-body">-->
<!--                        <h5 class="mt-0 mb-1">List-based media object</h5>-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante-->
<!--                        sollicitudin.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="media">-->
<!--                    <div class="media-body">-->
<!--                        <h5 class="mt-0 mb-1">List-based media object</h5>-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante-->
<!--                        sollicitudin.-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-md-6">
                <h3>Recent Tweets</h3>
                <div class="media">
                    <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                         alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                        sollicitudin.
                    </div>
                </div>
                <div class="media my-4">
                    <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                         alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                        sollicitudin.
                    </div>
                </div>
                <div class="media">
                    <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                         alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">List-based media object</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                        sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Get In Touch</h3>
                <form action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <p><small>&copy; <?= date('Y') ?> <a href="https://robert-kent.com" target="_blank">Robert Kent</a>. All rights
                    reserved.</small></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>