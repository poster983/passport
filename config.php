<?

//Server Login
$servername = "localhost";
$dbusername = "uname";
$dbpassword = "pass";
$database = "dbname";

//Set to "0" to disable debug echos (optional)
$devDebugEchoToggle = 1;

//Default Teacher Password
$defaultTeacherPassword = "teacher";

//close pass request on weekends
$closePassRequestOnDaysToggle = 0;

//SIGN UP Required ending.  set it blank if you want to allow any domain email to create an account
$signUpDomainEmailEnding = "@gmail.com";





//-----------------------------------

//PHPMailer stuff  USES SMTP
$enableEmailServicePlugin = 1;

//smtpservers set multiple with semicolens
$emailSMTPHostServers = 'smtp1.example.com;smtp2.example.com';
//smtp username
$emailSMTPUsername = 'user@example.com';
//password
$emailSuperSecretSpecialPassword = 'secret';
//encryption `ssl` also accepted
$emailSMTPEncryption = 'tls';
$emailSMTPEncryptionPORT = 587;

//dft sent FROM
$emailDefaultSentFromEmail = 'from@example.com';
$emailDefaultSentFromName = 'Passport';

//default reply
$emailSMTPReplyEMAIL = 'no-reply@example.com';
$emailSMTPReplyNAME = 'DO-NOT-REPLY'
?>
