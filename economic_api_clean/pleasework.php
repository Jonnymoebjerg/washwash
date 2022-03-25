<!DOCTYPE html>
<html>
    <head>
        <title>API FTW</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>Invoice Lines:</p>
        <pre id="outputData"></pre>
        <hr>
        <pre id="outputLines"></pre>
        <script>
            function getCustomers() {
                var invoiceNumber = "283";
                var apiUrl = "https://restapi.e-conomic.com/invoices/booked/" + invoiceNumber;
                var i = 0;
                var iMax = 50;

                $.ajax({
                    url: apiUrl,
                    dataType: "json",
                    headers: { 
                        'X-AppSecretToken': "",
                        'X-AgreementGrantToken': "",
                        accept: "application/json"
                    },
                    type: "GET"
                })

                .always(function (data) {
                    for (; i < iMax;i++) {
                        var resultData = data.lines[i];
                        if (!resultData) {
                            break;
                        } else {
                            console.log(resultData);
                            
                            console.log(resultData.product.productNumber);
                            console.log(resultData.description);
                            console.log(resultData.unitNetPrice);
                            console.log(resultData.quantity);
                        }
                    };
                });
            };
            
            getCustomers();
        </script>
    </body>
</html>