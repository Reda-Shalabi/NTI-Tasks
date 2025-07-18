    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
        $name = $_FILES['image']['name'];

        $allowed = ["png", "jpg"];
        $ext = (explode('.', $name)[count(explode('.', $name)) - 1]);
        $typ = (explode('/', $_FILES['image']["type"])[0]);
        $temp = $_FILES['image']['tmp_name'];

        if (in_array($ext, $allowed) && $typ == "image" && $_FILES["image"]["size"] < 3 * 1024 * 1024 * 102) {
            move_uploaded_file($temp, "$name");
            echo "<img src='img/$name' class='img-thumbnail m-3' width='200' >";
        } else {
            echo "<div class='alert alert-danger'> Extension is not alllowed </div> ";
        }
    }
    ?>

    <body class="bg-success ">


        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-6 col-xs-12 mt-5">
                    <form class="bg-light p-5 " enctype="multipart/form-data" method="post">
                        <h3 class="d-flex justify-content-center mb-4">User Information</h3>


                        <div class="form-group ">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email">

                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <input class="form-control mt-3 " type="file" id="formFile" name='image'>

                        <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </body>