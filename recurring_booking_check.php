<?php
include 'database/DBController.php';

$field_id = $_POST['field_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$day_of_week = $_POST['day_of_week'];
$start_time = $_POST['start_time'];
$duration = floatval($_POST['duration']);

$end_time = date('H:i:s', strtotime($start_time) + $duration * 3600);

$current_date = $start_date;
$conflict_dates = [];
$conflict_times = []; // Mảng lưu giờ trùng theo từng ngày


while (strtotime($current_date) <= strtotime($end_date)) {
    if (date('l', strtotime($current_date)) === $day_of_week) {
        // Kiểm tra trùng trong bảng bookings
        $check1 = mysqli_query($conn, "SELECT * FROM bookings 
            WHERE field_id = '$field_id'
              AND booking_date = '$current_date'
              AND status != 'Đã hủy'
              AND (
                    (start_time <= '$start_time' AND end_time > '$start_time') OR
                    (start_time < '$end_time' AND end_time >= '$end_time') OR
                    (start_time >= '$start_time' AND end_time <= '$end_time')
                  )");

        // Kiểm tra trùng trong recurring_bookings
        $check2 = mysqli_query($conn, "SELECT * FROM recurring_bookings
            WHERE field_id = '$field_id'
              AND status != 'Đã hủy'
              AND '$current_date' BETWEEN start_date AND end_date
              AND day_of_week = '$day_of_week'
              AND (
                    (start_time <= '$start_time' AND ADDTIME(start_time, SEC_TO_TIME(duration * 3600)) > '$start_time') OR
                    (start_time < '$end_time' AND ADDTIME(start_time, SEC_TO_TIME(duration * 3600)) >= '$end_time') OR
                    (start_time >= '$start_time' AND ADDTIME(start_time, SEC_TO_TIME(duration * 3600)) <= '$end_time')
                  )");

        if (mysqli_num_rows($check1) > 0 || mysqli_num_rows($check2) > 0) {
            $conflict_dates[] = date('d/m/Y', strtotime($current_date));

            $times = [];
            // Lấy giờ từ bookings
            while ($row = mysqli_fetch_assoc($check1)) {
                $times[] = $row['start_time'] . ' - ' . $row['end_time'];
            }
            // Lấy giờ từ recurring_bookings
            while ($row = mysqli_fetch_assoc($check2)) {
                $start = $row['start_time'];
                $duration_hours = floatval($row['duration']);
                $end = date('H:i:s', strtotime($start) + $duration_hours * 3600);
                $times[] = $start . ' - ' . $end;
            }
            // Lưu giờ trùng theo ngày (gộp giờ lại bằng dấu phẩy)
            $conflict_times[date('d/m/Y', strtotime($current_date))] = implode(', ', $times);
        }
    }
    $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
}

if (count($conflict_dates) > 0) {
    echo json_encode(['conflict' => true, 'dates' => $conflict_dates, 'times' => $conflict_times]);
} else {
    echo json_encode(['conflict' => false]);
}
?>
