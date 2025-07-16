<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark pt-5">
    <h2 class="d-flex justify-content-center text-success mb-5">Student Registration Form</h2>
    <div class="container ">
        <div class="d-flex justify-content-center">
            <form class="row was-validated text-light w-50">
                <div class="col-md-6">
                    <label for="validationServer01" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="validationServer01" required>
                    <div class="invalid-feedback">
                        Please enter the name

                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Email</label>
                    <input type="email" class="form-control" id="validationServer03"
                        aria-describedby="validationServer03Feedback" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        enter correct Email
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationServerUsername" class="form-label mt-3">Age</label>

                    <input type="Number" class="form-control" id="validationServerUsername"
                        aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        enter the age correctly
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label mt-3">Gender</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>

                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <div class="invalid-feedback">
                        choose gender
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom05" class="form-label mt-3">Grade</label>

                    <input type="Number" min="0" max="100" class="form-control " id="validationCustom05" required>
                    <div class="invalid-feedback">
                        enter the grade from 0 to 100
                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="validationTextarea" class="form-label mt-3">Notes</label>
                    <textarea class="form-control" rows="3" id="validationTextarea" required></textarea>
                    <div class="invalid-feedback">
                        Write your opinion here
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success mx-3 px-5" type="submit ">Submit</button>
                    <button type="button" class="btn btn-primary px-5 " data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        View Students</button>

                </div>
            </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Students List</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped mt-3 ">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-dark text-light ">Name</th>
                                    <th scope="col" class="bg-dark text-light">Grade</th>
                                    <th scope="col" class="bg-dark text-light">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Reda Shalabi</td>
                                    <td><?php echo $grade = 90 ?></td>
                                    <td><?php if ($grade >= 85) echo "Excelllent";
                                        else if ($grade >= 75) echo "Very Good";
                                        else  if ($grade >= 60) echo "Good";
                                        else if ($grade >= 50) echo "weak";
                                        else  if ($grade < 50) echo "failed"
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ahmed AbuBakr</td>
                                    <td><?php echo $grade = 80 ?></td>
                                    <td><?php if ($grade >= 85) echo "Excelllent";
                                        else if ($grade >= 75) echo "Very Good";
                                        else  if ($grade >= 60) echo "Good";
                                        else if ($grade >= 50) echo "weak";
                                        else  if ($grade < 50) echo "failed"
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>mostafa zain</td>
                                    <td><?php echo $grade = 65 ?></td>
                                    <td><?php if ($grade >= 85) echo "Excelllent";
                                        else if ($grade >= 75) echo "Very Good";
                                        else  if ($grade >= 60) echo "Good";
                                        else if ($grade >= 50) echo "weak";
                                        else  if ($grade < 50) echo "failed"
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>kareim shalabi</td>
                                    <td><?php echo $grade = 50 ?></td>
                                    <td><?php if ($grade >= 85) echo "Excelllent";
                                        else if ($grade >= 75) echo "Very Good";
                                        else  if ($grade >= 60) echo "Good";
                                        else if ($grade >= 50) echo "weak";
                                        else  if ($grade < 50) echo "failed"
                                        ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php

                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>