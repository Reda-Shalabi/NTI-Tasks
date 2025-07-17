<?php
$Students = [
    ["Name" => "Ahmed", "Course" => "PHP", "Grade" => "75%", "Status" => "Passed"],
    ["Name" => "Salma", "Course" => "JS", "Grade" => "95%", "Status" => "Passed"],
    ["Name" => "Youssef", "Course" => "MYSQL", "Grade" => "58%", "Status" => "Failed"],
    ["Name" => "Laila", "Course" => "HTML", "Grade" => "88%", "Status" => "Passed"]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5 bg-dark text-white">
    <div class="container">
        <h2 class="mb-4 text-center">Students Info</h2>
        <table class="table table-bordered border-dark-subtle bg-white">
            <thead>
                <tr>
                    <th class="bg-dark text-white text-center">Name</th>
                    <th class="bg-dark text-white text-center">Course</th>
                    <th class="bg-dark text-white text-center">Grade</th>
                    <th class="bg-dark text-white text-center">Status</th>
                    <th class="bg-dark text-white text-center">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Students as $k => $student): ?>
                    <?php
                    $rowClass = $student["Grade"] >= 60 ? "bg-success-subtle" : "bg-danger-subtle";
                    ?>
                    <tr>
                        <td class="<?= $rowClass ?> text-center"><?= $student["Name"] ?></td>
                        <td class="<?= $rowClass ?> text-center"><?= $student["Course"] ?></td>
                        <td class="<?= $rowClass ?> text-center"><?= $student["Grade"] ?></td>
                        <td class="<?= $rowClass ?> text-center">
                            <?php if ($student["Status"] === "Failed"): ?>
                                <span class="badge bg-warning-subtle text-dark  p-2"><?= $student["Status"] ?></span>
                            <?php else: ?>
                                <?= $student["Status"] ?>
                            <?php endif; ?>
                        </td>
                        <td class="<?= $rowClass ?>  text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal<?= $k ?>">
                                View
                            </button>
                        </td>
                    </tr>
<!-- Modal -->
                    <div class="modal fade" id="studentModal<?= $k ?>" tabindex="-1" aria-labelledby="studentModalLabel<?= $k ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title text-dark" id="studentModalLabel<?= $k ?>">Student Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <ul class="list-group ">
                                        <?php foreach ($student as $key => $val): ?>
                                            <li class="list-group-item">
                                                <strong><?= $key ?>:</strong> <?= $val ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>