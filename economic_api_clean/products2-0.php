<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>Products:</p>
        <pre id="output"></pre>
        <script>
            $( document ).ready(function() {
                
                function getProductCount() {
                    $.ajax({ 
                        url: "https://restapi.e-conomic.com/",
                        dataType: "json",
                        headers: {
                            'X-AppSecretToken': "",
                            'X-AgreementGrantToken': "",
                            accept: "application/json"
                        },
                        type: "GET" 
                    })

                    .always(function (data) {
                        return data.results;
                    });
                };
            });
        </script>
    </body>
</html>