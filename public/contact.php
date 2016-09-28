<?php 
require_once("../resources/config.php");
include(TEMPLATE_FRONT .  "/header.php");
?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" id="contactForm" >
                        <?php send_message(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email" name="email" required data-validation-required-message="Please enter your email address.">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your subject" name="subject" required data-validation-required-message="Please enter a subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" name="submit" class="btn btn-xl" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php include(TEMPLATE_FRONT .  "/footer.php");?>