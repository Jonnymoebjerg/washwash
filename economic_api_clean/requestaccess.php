<?php
$userid = $_GET['userIdInMySystem'];
$agreementgranttoken = $_GET['token'];

echo "Userid: " . $userid;
echo "<br>";
echo "AgreementGrantToken: " . $agreementgranttoken;
echo "<br>";
echo "Link: https://secure.e-conomic.com/secure/api1/requestaccess.aspx?appId=&redirectUrl=https%3A%2F%2Fwww.fruren.dk/development/api/requestaccess.php?userIdInMySystem=1";
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <pre id="output"></pre>
        <script>
            $.ajax({
                url: "https://restapi.e-conomic.com/customer-groups/2/customers",
                dataType: "json",
                headers: {
                    'X-AppSecretToken': "",
                    'X-AgreementGrantToken': "",
                    accept: "application/json"
                },
                type: "GET"
            })
                    .always(function (data) {
                        $("#output").text(JSON.stringify(data, null, 4));
                    });
        </script>
    </body>
</html>