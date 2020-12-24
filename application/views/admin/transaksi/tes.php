<!doctype html>
<html>
    <head>
        <title>datepicker</title>
    </head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="datepicker/datepicker3.css"/>
    <style>
        body{padding: 20px}
    </style>
    <body>
        <form action="action">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" name="tanggal" class="tanggal" />
            </div>
        </form>
        <script src="js/jquery.min.2.0.2.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
    </body>
</html>