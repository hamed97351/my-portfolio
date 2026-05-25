<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hawja";

    // إنشاء اتصال
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, 'utf8');  // تأكد من تصحيح المتغير هنا

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    $query = $_POST['query'];

    // تأكد من أن $query ليست فارغة
    if (empty($query)) {
        echo "لم يتم تقديم استعلام بحث.";
        exit;
    }

    $tables = [];

    // احصل على جميع الجداول في قاعدة البيانات
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);
    if ($result === FALSE) {
        echo "خطأ في استعلام SQL: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                $tables[] = $row[0];
            }
        }
    }

    // طباعة الجداول الموجودة
    echo "الجداول في قاعدة البيانات: " . implode(", ", $tables) . "<br>";

    $results = [];
    foreach ($tables as $table) {
        $columns = [];

        // احصل على الأعمدة في الجدول
        $sql = "SHOW COLUMNS FROM $table";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $columns[] = $row['Field'];
            }
        }

        // طباعة الأعمدة الموجودة في الجدول
        echo "الأعمدة في الجدول $table: " . implode(", ", $columns) . "<br>";

        $searchSql = "SELECT * FROM $table WHERE ";
        $conditions = [];
        foreach ($columns as $column) {
            $conditions[] = "$column LIKE ?";
        }
        $searchSql .= implode(" OR ", $conditions);
        $stmt = $conn->prepare($searchSql);

        $likeQuery = "%$query%";
        $types = str_repeat('s', count($columns));
        $stmt->bind_param($types, ...array_fill(0, count($columns), $likeQuery));
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
        }
    }

    // طباعة النتائج المسترجعة
    echo "عدد النتائج المسترجعة: " . count($results) . "<br>";

    if (!empty($results)) {
        foreach ($results as $result) {
            echo "نتيجة: " . implode(", ", $result) . "<br>";
        }
    } else {
        echo "لا توجد نتائج";
    }

    $conn->close();
} else {
    echo "لم يتم استلام أي بيانات.";
}
?>
