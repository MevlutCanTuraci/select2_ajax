<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Select2 AJAX Using</title>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-12 py-5">

                <h2>Select 2 menu - Ajax</h2>

            </div>

            <div class="col-md">

                <div class="form-group">
                    <select id="menu" class="select2 col-12"></select>
                </div>

            </div>

        </div>

        <div class="col-md py-5">

            <div>All Brands</div>

            <ul class="list-group">
                <?php

                $result = $conn->query("select brandName from brands")->fetchAll(PDO::FETCH_ASSOC);

                $count = 1;
                foreach ($result as $key) {

                    echo "<li class='list-group-item'> $count : " . $key["brandName"] . "</li>";
                    $count++;
                }

                ?>
            </ul>

        </div>


    </div>


</body>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        $(".select2").select2({
            ajax: {
                url: "ajax.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });


    });
</script>

</html>