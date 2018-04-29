# mc_racaptcha
Recaptcha v2 library for codeigniter 3

How to setup.

Firstly, go to google and apply for a recaptcha - https://www.google.com/recaptcha/admin#list - and follow the steps it asks you to do. Choose recaptcha v2 as this library only works on that version. In domains field, you can add 127.0.0.1 and localhost if you're testing locally. 

Then follow these steps.
1. Download and put Mc_recaptcha.php in application/libraries folder.
2. Open Mc_recaptcha.php and set the value of $secret_key to the secret key given to you by google. 
2. Again in Mc_recaptcha.php set the value of $site_key to the site key given to you by google. 
3. You can load the library in your controllers by doing $this->load->library('Mc_captcha');
4. To validate recaptcha in your form submission, you can do $this->mc_recaptcha->validated() which returns TRUE when recaptcha valid and FALSE when not.
4. Done.
