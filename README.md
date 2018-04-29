# mc_racaptcha
Recaptcha library for codeigniter 3

How to setup.

Firstly, go to google and apply for a recaptcha - https://www.google.com/recaptcha/admin#list - and follow the steps it asks you to do.

Then follow these steps.
1. Download and put Mc_recaptcha.php in application/libraries folder.
2. Open Mc_recaptcha.php and set the value of $secret_key to the value given to you by google.
3. You can load the library in your controllers by doing $this->load->library('Mc_captcha');
4. Done!
