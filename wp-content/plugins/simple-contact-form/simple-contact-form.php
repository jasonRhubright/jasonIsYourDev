<?php
/**
 * Plugin Name: Simple Contact Form
 * Description: Contact form for portfolio site.
 * Author: Jason R
 * Author URI: https://jasonisyourdev.com
 * Version: 1.0.0
 * Text Domain: simple-contact-form
 * 
 */

if (!defined('ABSPATH'))
{
    exit;
}

class SimpleContactForm
{
    public function __construct() {

        // Add assets (js, css, etc)
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        // Add shortcode
        add_shortcode('contact-form', array($this, 'load_shortcode'));

        // Load JS
        add_action('wp_footer', array($this, 'load_scripts'));

        // Register REST API
        add_action('rest_api_init', array($this, 'register_rest_api'));
    }

    /**
     * Enqueues styles and scripts necessary for the Simple Contact Form plugin.
     *
     * This function registers and enqueues the plugin's stylesheet and the Lottie animation
     * library. The stylesheet enhances the visual presentation of the contact form, while
     * Lottie is used to render animations, providing visual feedback for form submissions.
     */
    public function load_assets()
    {
        wp_enqueue_style(
            'simple-contact-form', 
            plugin_dir_url( __FILE__ ) . '/css/simple-contact-form.css',
            array(),
            1,
            'all'
        );

        wp_enqueue_script(
            'simple-contact-form',
            'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js',
            array('jquery'),
            1,
            false
        );
    }

    /**
     * Loads a shortcode representing a contact form section with dynamic behavior.
     *
     * This function outputs HTML markup for a contact form wrapped in a section element.
     * The form includes input fields for name, email, and message, as well as reCAPTCHA.
     * The submission is handled asynchronously via JavaScript, providing user feedback
     * through success and failure messages and an optional lottie animation.
     */
    public function load_shortcode()
    {   $siteKey = defined('CAPTCHA_SITE_KEY') ? CAPTCHA_SITE_KEY : 'Not defined';
        ?>
        <section data-w-id="b8e40d7c-18c2-70a4-db25-b0ea36d89eca" style="opacity:0" class="section-2">
            <div class="w-layout-blockcontainer container w-container">
            <div class="form-block w-form">
                <h3 class="heading-2">Contact</h3>
                <form id="email-form" name="email-form" data-name="Email Form" class="form">
                <div class="w-layout-grid grid">
                    <div id="w-node-_41ff6c89-28b5-88db-5e57-7b3235b214e0-35b214d9">
                        <label for="Name-3" class="field-label">Name</label>
                        <input class="w-input" maxlength="256" name="Name" data-name="Name" placeholder="" type="text" id="Name-3">
                    </div>
                    <div id="w-node-_41ff6c89-28b5-88db-5e57-7b3235b214e4-35b214d9">
                        <label for="Email-3" class="field-label">Email Address</label>
                        <input class="w-input" maxlength="256" name="Email" data-name="Email" placeholder="" type="email" id="Email-3" required="">
                    </div>
                </div>
                <label for="Msg" class="field-label">Message</label>
                <textarea class="w-input" maxlength="5000" name="Msg" data-name="Msg" placeholder="" id="Msg"></textarea>
                <div class="rc-wrapper">
                    <div data-sitekey="<?php echo $siteKey; ?>" class="w-form-formrecaptcha recaptcha g-recaptcha g-recaptcha-error g-recaptcha-disabled"></div>
                </div>
                <input type="submit" data-wait="Please wait..." id="contact-submit" class="submit-button w-button" value="Submit">
                </form>
                <div class="success-message w-form-done">
                    <div class="lottie-animation" id="player"></div>
                    <div class="text-block-4">Thank you! Your submission has been received!</div>
                </div>
                <div class="form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </div>
            </div>
        </section>
    <?php }

    /**
     * Loads JavaScript scripts to handle the asynchronous submission of the contact form.
     *
     * This function outputs a script block that attaches an event listener to the form
     * with the ID 'email-form'. When the form is submitted, it prevents the default form
     * submission, gathers form data, sends an asynchronous request to the REST API endpoint
     * 'simple-contact-form/v1/send-email', and updates the UI based on the server response.
     * It utilizes the Fetch API and Lottie library for animations.
     */
    public function load_scripts()
    {?>
        <script>

            document.getElementById('email-form').addEventListener('submit', async function (event) {
                event.preventDefault();

                try {
                    const form = new FormData(this);

		            // Retrieve reCAPTCHA token
                    const recaptchaToken = grecaptcha.getResponse();
                    if (!recaptchaToken) {
                        throw new Error('reCAPTCHA verification failed');
                    }

                    const formDataObject = {
                        Name: form.get('Name'),
                        Email: form.get('Email'),
                        Msg: form.get('Msg'),
                        'g-recaptcha-response': recaptchaToken,
                    };

                    const formJson = JSON.stringify(formDataObject);

                    const nonce = '<?php echo wp_create_nonce('wp_rest');?>';
                    const response = await fetch('<?php echo get_rest_url(null, 'simple-contact-form/v1/send-email') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-WP-Nonce': nonce,
                        },
                        body: formJson,
                    });

                    if (!response.ok) {
                        throw new Error('Sorry, but an error occurred.');
                    }

                    const data = await response.json();

                    const successMessage = document.querySelector('.success-message.w-form-done');
                    const emailForm = document.getElementById('email-form');
                    const formFail = document.querySelector('.form-fail');

                    if (formFail) {
                        formFail.style.display = 'none';
                    }

                    if (successMessage) {
                        emailForm.style.display = 'none';
                        successMessage.style.display = 'inline';

                        const player = document.getElementById('player');
                        if (player) {
                            const animation = lottie.loadAnimation({
                                container: player,
                                renderer: 'svg',
                                loop: false,
                                autoplay: true,
                                path: '<?php echo get_template_directory_uri()?>/documents/success-animation.json',
                            });

                            animation.play();
                        }
                    }

                } catch (error) {
                    // Display the form-fail element
                    const formFail = document.querySelector('.form-fail');
                    if (formFail) {
                        formFail.style.display = 'block';
                    }

                    console.error('Error:', error.message);
                }
            });

        </script>
    <?php }

    /**
     * Registers a custom REST API endpoint for handling contact form submissions.
     *
     * This function defines a new REST route under the namespace 'simple-contact-form/v1'
     * with the route path 'send-email'. It specifies that the route accepts only POST
     * requests and associates the callback method 'handle_contact_form' from the current
     * class as the function to handle incoming requests to this endpoint.
     */
    public function register_rest_api()
    {
        register_rest_route('simple-contact-form/v1', 'send-email', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_contact_form'),
            'permission_callback' => '__return_true'
        ));
    }

    /**
     * Handles the submission of the contact form data.
     *
     * This function verifies the WordPress nonce, prepares the form data,
     * and sends it to an external API endpoint using cURL. It checks the
     * HTTP response code from the external API and returns a corresponding
     * WP_REST_Response with a success or error message.
     *
     * @param WP_REST_Request $data The data received from the REST API request.
     * @return WP_REST_Response The response containing success or error message
     *                        with the appropriate HTTP status code.
     */
    public function handle_contact_form($data)
    {
        $headers = $data->get_headers();
        $params = $data->get_params();
        $nonce = $headers['x_wp_nonce'][0];
        
        if (!wp_verify_nonce($nonce, 'wp_rest')){
            return new WP_REST_Response('Message not sent', 422);
        }

        // Verify reCAPTCHA using cURL
        $recaptcha_response = isset($params['g-recaptcha-response']) ? $params['g-recaptcha-response'] : '';

        $captchaServerSecret = defined('CAPTCHA_SERVER_SECRET') ? CAPTCHA_SERVER_SECRET : 'Not defined';
        $recaptcha_secret_key = $captchaServerSecret; 

        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_data = array(
            'secret' => $recaptcha_secret_key,
            'response' => $recaptcha_response,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        );

        $ch = curl_init($recaptcha_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($recaptcha_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $recaptcha_result = curl_exec($ch);
        curl_close($ch);
        $recaptcha_data = json_decode($recaptcha_result);

        if (is_object($recaptcha_data) && property_exists($recaptcha_data, 'success') && $recaptcha_data->success === true) {
            // reCAPTCHA verification successful
        } else {
            // Log reCAPTCHA verification failure
            error_log('reCAPTCHA Verification Failed. Data: ' . print_r($recaptcha_data, true));

            return new WP_REST_Response('reCAPTCHA verification failed', 422);
        }

        // Define the data to be sent
        $formData = array(
            'firstName' => $params['Name'],
            'lastName' => '',
            'email' => $params['Email'],
            'msg' => 'Msg from Portfolio Website: ' . $params['Msg']
        );

        $jsonData = json_encode($formData);

        $apiUrl = defined('CONTACT_API_ENDPONT') ? CONTACT_API_ENDPONT : 'Not defined';
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // Receive server response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if ($response === false) {
            error_log('cURL Error: ' . curl_error($ch));
            error_log('cURL Error Code: ' . curl_errno($ch));
        }

        // Get the HTTP status code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check if cURL request was successful (status code 200)
        if ($response !== false && $httpCode === 200) {
            return new WP_REST_Response('Success', 200);
        } else {
            return new WP_REST_Response('Message not sent', 500);
        }
    }

}

new SimpleContactForm;



?>