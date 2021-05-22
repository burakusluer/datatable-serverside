<?php
/**
 * Created by PhpStorm.
 * User: Burak
 * Date: 22.05.2021
 * Time: 10:57
 */
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatables | Server-Side Rendering</title>
    <!--<editor-fold desc="css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!--</editor-fold>-->
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="display datatable" style="width: 100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>company</th>
                    <th>last_name</th>
                    <th>first_name</th>
                    <th>email_address</th>
                    <th>job_title</th>
                    <th>business_phone</th>
                    <th>home_phone</th>
                    <th>mobile_phone</th>
                    <th>fax_number</th>
                    <th>address</th>
                    <th>city</th>
                    <th>state_province</th>
                    <th>zip_postal_code</th>
                    <th>country_region</th>
                    <th>web_page</th>
                    <th>notes</th>
                    <th>atachments</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>id</th>
                    <th>company</th>
                    <th>last_name</th>
                    <th>first_name</th>
                    <th>email_address</th>
                    <th>job_title</th>
                    <th>business_phone</th>
                    <th>home_phone</th>
                    <th>mobile_phone</th>
                    <th>fax_number</th>
                    <th>address</th>
                    <th>city</th>
                    <th>state_province</th>
                    <th>zip_postal_code</th>
                    <th>country_region</th>
                    <th>web_page</th>
                    <th>notes</th>
                    <th>atachments</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>



<script type="text/javascript">
    window.addEventListener("DOMContentLoaded", function (e) {
        $("#datatable").DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': "ajax/server-side.php"
        });
    });
</script>
<!--<editor-fold desc="js">-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<!--</editor-fold>-->
</body>
</html>
