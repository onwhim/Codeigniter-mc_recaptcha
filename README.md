# mc_recaptcha

Secured, effective and widely-used, captcha plugins shared by Google.
ReCAPTCHA v2 and Invisible library for Codeigniter 3. 

## How to setup.

1. Firstly, go to google and apply for a recaptcha - https://www.google.com/recaptcha/admin#list - and follow the steps it asks you to do. In domains field, you can add 127.0.0.1 and localhost if you're testing locally. 
2 Download and put Mc_recaptcha.php in application/libraries folder.
3. Open Mc_recaptcha.php and set the value of `$secret_key` to the secret key given to you by google. 
4. Again in Mc_recaptcha.php set the value of `$site_key` to the site key given to you by google. 
5. You can load the library in your controllers by doing `$this->load->library('Mc_captcha');`
6. To validate recaptcha in your form submission, you can do `$this->mc_recaptcha->validated()` which returns TRUE when recaptcha is valid and FALSE when not.
7. Done.

### (Optional)
BTW, there's an existing CI_Form_validation subclass included in this repo. To use it do the following steps.
1. Download and put MY_Form_validation.php in application/libraries folder. Or if you already have the subclass, just copy the function - `valid_recaptcha() {..}` - from my file and paste it in yours.
2. In your controller, on form submission block, you can use this subclass in setting recaptcha form rule by doing `$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|valid_recaptcha');`
3. That's it.
