<div id="main">
    <div class="main-content">
        <div class="content-full-width">
            <div class="fullwidth-section">
                <section id="primary" class="content-full-width">
                    <div class="fullwidth-section  thank_you dt-sc-paralax">
                        <div class="container">
                            
                            <div class="dt-sc-one-half column first col-md-6">
                                <h3>Thank you.</h3>
                                <!--<p>Our representative will get back to you as soon as possible. We aim to respond to all queries within 24 hours. If your enquiry requires urgent attention or you would like to speak to someone immediately, please contact us.</p>
                                <p> If you don't receive an email from our website in the next few minutes, please check your spam / junk email folder & white list our email address for future correspondence. Feel free to keep browsing our site at <a href="http://sixpackabsindia.com/" target="_blank">GarjaHindustan</a></p>-->
                                <h4><span class="org">Garja Hindustan</span></h4>
                                <p class="address1"><span> 3/6 Navratna Building, Ground Floor,</span><br><span>Opp Bhumi Tower, Santacruz,</span><br><span>Maharashtra 400065,</span><span> India</span></p>
                                <p class="tel"><a href="tel:+919819697620">+919819697620</a></p>

                                <p><a  class="email"  href="mailto:editor@garjahindustan.in"> editor@garjahindustan.in</a></p>
                                <p><a  class="url fn n"  href="garjahindustan.in" target="_blank"> GarjaHindustan.com</a></p>
                            </div>
                            <div class="dt-sc-one-half column vcard col-md-6">
                                <h3>We are here</h3>
                            
                                <div id="contact_map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235.66144847668238!2d72.84437572852569!3d19.082055668309145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9a9e18f2ed1%3A0xb3245a5c6cec8623!2sGarja+Hindustan!5e0!3m2!1sen!2sin!4v1551939689967" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> 
                            </div>
                        </div>
                    </div>
                </section> 
            </div>
        </div>
    </div>
</div>
<script src="<?php echo JS_PATH_FRONTEND; ?>jquery.validate.js"></script>
<script>
    jQuery(document).ready(function () {

        jQuery.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[^-\s][a-zA-Z,""\s]+$/i.test(value);
        });
        jQuery.validator.addMethod("digitonly", function (value, element) {
            return this.optional(element) || /^[^-\s][0-9,""\s]+$/i.test(value);
        });
        jQuery.validator.addMethod("lettersdigitonly", function (value, element) {
            return this.optional(element) || /^[^-\s][a-zA-Z0-9,""\s]+$/i.test(value);
        });

        jQuery("#contact-form").validate({
            rules: {
                'customer[first_name]': {
                    required: true,
                    lettersonly: true
                },
                'customer[last_name]': {
                    required: true,
                    lettersonly: true
                },
                'customer[display_name]': {
                    required: true,
                    lettersdigitonly: true

                },
                'customer[code]': {
                    required: true,
                    lettersdigitonly: true

                },
                'customer[address]': {
                    required: true,
                    //lettersdigitonly: true

                },
                'contact_no': {
                    required: true,
                    rangelength: [10, 10],
                    digits: true,
                },
                'customer[email_account]': {
                    required: true


                },
                'customer[pan_number]': {
                    required: true,
                    lettersdigitonly: true

                }
            },
            messages: {
                'customer[name]': {
                    required: "Name Required",
                    lettersonly: "Please enter correct Name without space"
                },
                'customer[display_name]': {
                    required: "Display Name Required",
                    lettersdigitonly: "Please enter correct Display Name without space"

                },
                'customer[code]': {
                    required: "Code Required",
                    lettersdigitonly: "Please enter correct Code without space"

                },
                'customer[address]': {
                    required: "Address Required",
                    // lettersdigitonly: "Please enter correct address without Initial and last space"
                },
                'customer[phone]': {
                    required: "Phone Required",
                    digitonly: "Please enter correct Digits only  without initial space "

                },
                'customer[email_account]': {
                    required: "Email Required"

                },
                'customer[pan_number]': {
                    required: "Pan Number Required",
                    lettersdigitonly: "Please enter correct Name without space"

                }
            },
        });
    });
</script>
