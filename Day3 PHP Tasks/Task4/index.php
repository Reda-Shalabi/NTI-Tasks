<?php
// لو هيشنا ال grade هيطبع ادخل الدرجة
$grade = 40;
if (!isset($grade))
    echo "أدخل الدرجة";
else if ($grade >= 50)
    echo "ناجح";
else
    echo "راسب";
?>