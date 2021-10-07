<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include('config/config.php');
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $hashpass = password_hash($password, PASSWORD_DEFAULT); #băm password
        $repassword = $_POST['repassword'];
        #kiểm tra xem password đã khớp chưa? việc này để validate trực tiếp trên form
        #tạo 1 string ngẫu nhiên để activation
        $strRandom = rand(1000,9999);
        $strActivation = md5($strRandom);
        echo $strActivation;
        #insert dữ liệu vào bảng newuser
        #tạm bỏ qua bước check xem email đã tồn tại hay chưa
        $sql = "INSERT INTO `newuser`(`username`, `mail`, `password`, `activation`) VALUES ('$username','$email','$hashpass','$strActivation')";
        $query = mysqli_query($cnn, $sql);
        #gửi mail xác nhận
        require 'sendmail/Exception.php';
        require 'sendmail/PHPMailer.php';
        require 'sendmail/SMTP.php';
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'hackviet98@gmail.com';// SMTP username
            $mail->Password = 'clvcxhginrvnfagp'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('hackviet98@gmail.com', 'Facebook');

            #$mail->addReplyTo('hackviet98@gmail.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
            
            $mail->addAddress($email); // Add a recipient
            
            // Attachments
            // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
            #$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = 'Facebook';
            $mail->Subject = $tieude;
            
            // Mail body content 
            $bodyContent = '<p>Mời bạn xác minh mật khẩu facebook</p>'; 
            $bodyContent .= "<a href='http://localhost/login/activation.php?email=$email&activation=$strActivation'> click here</a>";
            
            
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()){
                echo 'Thư đã được gửi đi';
            }else{
                echo 'Lỗi. Thư chưa gửi được';
            }  

        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    else
    {
        header('location: index.php');
    }

?>