# mc_recaptcha

Secured, effective and widely-used, captcha plugins shared by Google.
ReCAPTCHA v2 and Invisible library for Codeigniter 3. 

## How to setup and use.

1. Firstly, go to google and apply for a recaptcha - https://www.google.com/recaptcha/admin#list - and follow the steps it asks you to do. In domains field, you can add 127.0.0.1 or localhost if you're testing locally. 
2. Download and put Mc_recaptcha.php in application/libraries folder.
3. Open Mc_recaptcha.php and set the value of `$secret_key` to the secret key given to you by google. 
4. Again in Mc_recaptcha.php set the value of `$site_key` to the site key given to you by google. 
5. You can load the library in your controller by doing `$this->load->library('Mc_captcha');`
6. To validate recaptcha in your form submission block, you can do `$this->mc_recaptcha->validated()` which returns TRUE when recaptcha is valid and FALSE when not.
7. Done.

### (Optional)
By the way, there's an existing `CI_Form_validation` subclass named `MY_Form_validation` included in this repo. This is for handling error and status messages the regular way for this subject. To do this follow these steps.
1. Download and put MY_Form_validation.php in application/libraries folder, or if you already have the subclass, just copy the function - `valid_recaptcha() {..}` - from the file and paste it in yours.
2. You can create recaptcha form rule in your controller, on form submission block, just do `$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|valid_recaptcha');`
3. That's it.
