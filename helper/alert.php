<?php
function set_alert_success($text = 'Cập nhật thành công')
{
    $_SESSION['alert_success'] = "<div class='alert-success'> $text <i class='fa-solid fa-circle-check'></i></div>";
}

function get_alert_success()
{
    if (isset($_SESSION['alert_success'])) {
        echo $_SESSION['alert_success'];
        unset($_SESSION['alert_success']);
    }
}

function set_alert_failed($text = 'Cập nhật thất bại')
{
    $_SESSION['alert_failed'] = "<div class='alert-failed'> $text <i class='fa-solid fa-circle-xmark'></i></div>";
}

function get_alert_failed()
{
    if (isset($_SESSION['alert_failed'])) {
        echo $_SESSION['alert_failed'];
        unset($_SESSION['alert_failed']);
    }
}
