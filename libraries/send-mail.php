<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Gọi các phương thức để làm việc
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_mail($send_to,$subject,$content)
{
    global $email_config;

    $mail = new PHPMailer(true);
    try {
        //Server settings ( Cài đặt sever,cấu hình )
        $mail->isSMTP();                                                            // Send using SMTP
        $mail->Host       = $email_config['host'];                                  // Cấu hình Sever google mail
        $mail->SMTPAuth   = true;                                                   // Bật xác thực
        $mail->Username   = $email_config['username'];                              // Tài khoản mail
        $mail->Password   = $email_config['password'];                              // Mật khẩu AppPassword của mail
        $mail->SMTPSecure = $email_config['smtp_secure'];                           // Cấu hình SMTP
        $mail->Port       = $email_config['port'];                                  // Cổng gửi

        //Recipients ( Người nhận )
        $mail->setFrom($email_config['mail_send'],$email_config['mail_send_name']); // Người gửi mail
        $mail->addAddress($send_to);                                                // Người nhận mail
        // $mail->addReplyTo('info@example.com', 'Information');                    // Email sẽ phản hồi lại người nhận
        // $mail->addCC('cc@example.com');                                          // Thêm người nhận ( Có thể copy ra thêm);

        //Attachments ( File đính kèm )
        // $mail->addAttachment('/tmp/image.jpg','new.jpg');                        // Thêm file, cài đặt đổi tên ( có thể đổi hoặc không );

        //Content ( Nội dung )
        $mail->isHTML(true);                                                        // Set email format to HTML
        $mail->Subject = $subject;                                                  // Tiêu đề mail
        $mail->Body    = $content;                                                  // Nội dung với định dạng HTML
        $mail->CharSet = 'UTF-8';                                                      // Định dạng chữ cái

        // Thông báo gửi mail thành công hoặc lỗi
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
