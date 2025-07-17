<?php
$developers = ["VS Code", "Git", "GitHub", "Figma", "Postman"];
echo " <br> Total Counts : " . count($developers);
if (in_array("Git", $developers)) {
    echo " <br> Git in the list. <br>";
}
echo "All Tools : ";
print_r(array_values($developers));