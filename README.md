# tripleauthenticationsystem
Project showing authentication using Text Based password, QR code grid selection and OTP on registered email for higher security.

To install and run it-

In your computer after installing xampp. You need to go to C:/xampp and open xampp-control file. 

Then in the browser you need to go to localhost/phpmyadmin

Create a new database- tripleauthentication

And import the sql file from the import tab of the database

For sending emails-
Important is to allow Less secure app access to the gmail so that application can send mails through it. That you can do on https://myaccount.google.com/security?pli=1#connectedapps
Turn on- Less secure app access for your gmail id 

Then in C:\xampp\php\php.ini find extension=php_openssl.dll and remove the semicolon from the beginning of that line 

Then in php.ini file find [mail function] and change

SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = yourgmail@gmail.com 
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
remove semicolons in front of these lines if there is any
Now Open C:\xampp\sendmail\sendmail.ini. Replace all the existing code in sendmail.ini with following code
[sendmail]

smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=yourgmail@gmail.com
auth_password=yourpassword
force_sender=yourgmail@gmail.com  

Also, in otpstep.php, change all yourgmail@gmail.com to your correct gmail ID, and yourpassword to your gmail password.
Now you can access the application from http://localhost/tripleauthentication/ 

Try to register yourself and send otp and choose correct QR image to login.

The login total time and registration total time is calculated inside the database tables- http://localhost/phpmyadmin/sql.php?server=1&db=tripleauthentication&table=login_log&pos=0
and http://localhost/phpmyadmin/sql.php?server=1&db=tripleauthentication&table=reg_log&pos=0

Further work-
For security reasons, do not store password like its stored directly in the database. Use hashing plus salting before storing database. Use BCrypt for this purpose. Refer- https://www.geeksforgeeks.org/how-to-use-bcrypt-for-hashing-passwords-in-php/


