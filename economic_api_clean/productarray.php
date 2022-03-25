<!DOCTYPE html>
<html>
    <head>
        <title>Customer Array API</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>Customers:</p>
        <pre id="output"></pre>
        <script>
            var AppSecretToken = "";
            var AgreementGrantToken = "";
            
            function getProducts() {
                var i = 0;
                var maxPages = 30;
                for (; i < maxPages;) {
                    var print = "";
                    var products = "https://restapi.e-conomic.com/products/100pet/invoices/booked";
                    print += "<p>Development info: " + i + " | " + products + "</p>";
                    document.getElementById("output").innerHTML += print;
                    
                    $.ajax({
                        url: products,
                        dataType: "json",
                        headers: {
                            'X-AppSecretToken': AppSecretToken,
                            'X-AgreementGrantToken': AgreementGrantToken,
                            accept: "application/json"
                        },
                        type: "GET"
                    })
                    .always(function (data) {
                        var count = 0;
                        for (; count < 20;) {
                            var print = "";
                            print += data.collection[count].productNumber + "<br>";
                            print += data.collection[count].productNumber + "<br>";
                            document.getElementById("output").innerHTML += print;
                            count++;
                        }
                    });
                i++;
                };
            };
            getProducts();
        </script>
    </body>
</html>