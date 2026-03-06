<?php

function construct()
{
    load_model('index');
}

function checkoutAction()
{
    load("helper","date");
    load("helper","status");

    if (isset($_POST['btn-order'])) {
        $fullname = $_POST['fullname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $payment_method = $_POST['payment_method'];
        $order_note = isset($_POST['note-order']) ? $_POST['note-order'] : '';
        global $error, $conn;
        $error = [];

        check_fullname($fullname);
        check_tel($tel);
        check_email($email);
        check_address($address);

        if (empty($error)) {
            // Nếu không phải là thành viên
            if (!isset($_SESSION['customer'])) {
                // Thêm khách hàng
                $new_customer = [
                    'fullname' => $fullname,
                    'tel' => $tel,
                    'email' => $email,
                    'address' => $address,
                    'created_at' => time()
                ];
                insert_item("tbl_customers", $new_customer);
                $customer_id = mysqli_insert_id($conn);
                $order_code = "#MNW-" . $customer_id;
                // Thêm đơn hàng
                $new_order = [
                    'order_code' => $order_code,
                    'product_quantity' => $_SESSION['cart']['total']['total_quantity'],
                    'total_amount' => $_SESSION['cart']['total']['total_price'],
                    'order_date' => time(),
                    'order_note' => $order_note,
                    'payment_method' => $payment_method,
                    'shipping_address' => $address,
                    'customer_id' => $customer_id,
                    'created_at' => time()
                ];
                insert_item("tbl_orders", $new_order);
                $order_id = mysqli_insert_id($conn);

                // Chi tiết đơn hàng
                foreach ($_SESSION['cart']['buy'] as $item) {
                    $new_order_item = [
                        'order_id' => $order_id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['product_quantity'],
                        'price' => $item['product_price']
                    ];
                    insert_item("tbl_order_items", $new_order_item);
                }
            } else {
                // Nếu là thành viên
                $customer_info = get_customer_info($_SESSION['customer']['username']);
                $customer_id = $customer_info['customer_id'];
                $temp = rand(1, 9999);
                $order_code = "#MNW-$customer_id" . $temp;
                $new_order = [
                    'order_code' => $order_code,
                    'product_quantity' => $_SESSION['cart']['total']['total_quantity'],
                    'total_amount' => $_SESSION['cart']['total']['total_price'],
                    'order_date' => time(),
                    'payment_method' => $payment_method,
                    'shipping_address' => $address,
                    'customer_id' => $customer_id,
                    'created_at' => time()
                ];
                insert_item("tbl_orders", $new_order);
                $order_id = mysqli_insert_id($conn);

                // Chi tiết đơn hàng
                foreach ($_SESSION['cart']['buy'] as $item) {
                    $new_order_item = [
                        'order_id' => $order_id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['product_quantity'],
                        'price' => $item['product_price']
                    ];
                    insert_item("tbl_order_items", $new_order_item);
                }
            }

            // Gửi MAIL
            $order_info = get_order_info($order_id);
            $order_date = set_date($order_info['created_at']);
            $order_status = set_status_order($order_info['status']);
            // $link_checkout = base_url("?mod=checkout&action=checkout");
            $content = "";
            $content .= "
                <!DOCTYPE html>
                <html>
                <head><meta charset='UTF-8'></head>
                <body style='background:#f5f6f8; font-family:Arial, Helvetica, sans-serif'>
                    <div id='wrapper' style='background-color: white; width:600px;margin:0px auto;min-height:500px;padding:20px;box-sizing:border-box;border-radius:7px'>
                        <div class='brand' style='font-weight:700;font-size:20px'>
                            <span style='background:#2F46DA;padding:7px;color:white;border-radius:5px;width:125px'>MONOWEAR</span> - Shop thời trang dành cho Nam giới
                        </div>
                        <div style='font-size: 12px; line-height:1.5'>
                            <h3 style='margin-top:25px'>Xin chào $fullname</h3>
                            Cảm ơn bạn đã mua sắm tại MONOWEAR !
                            Đơn hàng của bạn đã được xác nhận và chúng tôi đang tiến hành xử lý.
                            <br>
                            Dưới đây là thông tin chi tiết về đơn hàng của bạn:
                            <h3>Thông tin đơn hàng</h3>
                            <ul>
                                <li>Mã: {$order_info['order_code']} </li>
                                <li>Ngày mua: $order_date</li>
                            </ul>
                            <table border='1' style='border-collapse: collapse; margin-top: 10px; border-spacing: 10px 10px; width:100%;'>
                                <tr>
                                    <th style='padding: 8px; background-color: #f4f4f4; text-align: left; font-family: Arial, sans-serif; font-size: 14px; color: #333;'>Sản phẩm</th>
                                    <th style='padding: 8px; background-color: #f4f4f4; text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #333;'>Số lượng</th>
                                    <th style='padding: 8px; background-color: #f4f4f4; text-align: right; font-family: Arial, sans-serif; font-size: 14px; color: #333;'>Đơn giá</th>
                                    <th style='padding: 8px; background-color: #f4f4f4; text-align: right; font-family: Arial, sans-serif; font-size: 14px; color: #333;'>Tổng cộng</th>
                                </tr>
                                ";
                                foreach ($_SESSION['cart']['buy'] as $item) {
                                    $price = currency_format($item['product_price']);
                                    $sub_price = currency_format($item['product_sub_price']);
                                    $content .= "
                                        <tr>
                                            <td style='padding: 8px; font-family: Arial, sans-serif; font-size: 14px; color: #333;'> {$item['product_name']} </td>
                                            <td style='padding: 8px; text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #333;'> {$item['product_quantity']} </td>
                                            <td style='padding: 8px; text-align: right; font-family: Arial, sans-serif; font-size: 14px; color: #333;'> $price </td>
                                            <td style='padding: 8px; text-align: right; font-family: Arial, sans-serif; font-size: 14px; color: #333;'> $sub_price </td>
                                        </tr>
                                    ";
                                }
                                $total_price = currency_format($_SESSION['cart']['order']['total_shipping_price']);
                                $content .= "
                                <tr>
                                    <td colspan='4' style='padding: 8px; font-family: Arial, sans-serif; font-size: 14px; color: #333; text-align: left; background-color: #f4f4f4;'>Tổng cộng ( Đã bao gồm phí vận chuyển ): {$total_price} </td>
                                </tr>
                            </table>
                            <h3>Thông tin giao hàng</h3>
                            <ul>
                                <li>Họ tên: $fullname </li>
                                <li>Địa chỉ: $address </li>
                                <li>Số điện thoại: $tel </li>
                            </ul>
                            <h3>Phương thức thanh toán</h3>
                            <ul>
                                <li> $payment_method </li>
                            </ul>
                            <h3>Trạng thái đơn hàng</h3>
                            <ul>
                                <li> $order_status </li>
                            </ul>
                            <h3>Thông tin liên hệ</h3>
                            Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua:
                            <ul>
                                <li>Email: monowear.support@gmail.com </li>
                                <li>Điện thoại: 0933.1999 </li>
                                <li>Website: <a href=''> monowear.com.vn </a></li>
                            </ul>
                            <h3>Cảm ơn bạn đã chọn mua sắm tại MONOWEAR - Chúc bạn một ngày tuyệt vời !</h3>
                        </div>
                    </div>
                </body>
                </html>
                            ";
            send_mail($email, "Xác nhận đơn hàng từ MONOWEAR", $content);

            set_alert_success("Đặt hàng thành công");
            unset($_SESSION['cart']);
            slug_redirect("gio-hang/dat-hang-thanh-cong");
            exit();
        } else {
            set_alert_failed("Đặt hàng thất bại");
        }
    }

    $shipping_fee = 30000;
    $path_img = "./public/uploads/images/product/";
    $data = [
        'path_img' => $path_img,
        'shipping_fee' => $shipping_fee,
    ];
    load_view('checkout', $data);
}

// Thông báo Checkout
function checkout_completeAction()
{
    load_view("checkout_complete");
}

// Tính tổng tiền thanh toán khi chọn phương thức
function change_methodAction()
{
    load("helper", "cart");
    $val_method = $_POST['val_method'];
    $total_price = 0;
    $shipping_fee = 0;

    foreach ($_SESSION['cart']['buy'] as $item) {
        $total_price += $item['product_sub_price'];
        if ($val_method == 'Online Payment') {
            $_SESSION['cart']['order']['total_shipping_price'] = $total_price;
        } else {
            $_SESSION['cart']['order']['total_shipping_price'] = $total_price + 30000;
            $shipping_fee = 30000;
        }
    }

    $_SESSION['cart']['order']['order_method'] = $val_method;

    $new_price = $_SESSION['cart']['order']['total_shipping_price'];

    $data = [
        'val_method' => $val_method,
        'new_price' => currency_format($new_price),
        'shipping_fee' => currency_format($shipping_fee)
    ];

    echo json_encode($data);
}

// Chuẩn hóa dữ liệu form checkout
function validate_checkoutAction()
{
    global $error;
    $error = [];

    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    check_fullname($fullname);
    check_tel($tel);
    check_address($address);
    check_email($email);

    if (empty($error)) {
        $data = ['error' => NULL];
    } else {
        $data = ['error' => $error];
    }

    echo json_encode($data);
}

function email_checkoutAction()
{
    load_view('email_checkout');
}
