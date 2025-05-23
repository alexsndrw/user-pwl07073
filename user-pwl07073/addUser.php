<!DOCTYPE html>
<html>

<head>
    <title>SELAMAT DATANG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap lokal -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        .error {
            color: red;
            font-size: 0.9em;
            display: none;
        }
        #ajaxResponse {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <?php require "head.html"; ?>
    <div class="utama">
        <br><br><br>
        <h3>TAMBAH DATA USER</h3>
        <form id="userForm" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input class="form-control" type="text" name="status" id="status" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        <div id="ajaxResponse"></div>
    </div>

    <script>
    $(document).ready(function() {
        $("#userForm").on("submit", function(event) {
            event.preventDefault();
            var formData = {
                username: $("#username").val(),
                password: $("#password").val(),
                status: $("#status").val()
            };

            $.ajax({
                url: 'sv_addUser.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $("#ajaxResponse").html(response);
                },
                error: function() {
                    $("#ajaxResponse").html("Terjadi kesalahan saat mengirim data.");
                }
            });
        });
    });
    </script>
</body>
</html>