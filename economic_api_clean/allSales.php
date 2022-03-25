<!DOCTYPE html>
<html>
    <head>
        <title>All sales on products</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>All sales on products:</p>
        <pre id="output"></pre>
        <script>
            $( document ).ready(function() {
                function getInvoiceNumbers() {
                    var globalI = 0;
                    for (var skipPagesVal = 0; skipPagesVal < 550; skipPagesVal++) {
                        $.ajax({
                            url: "https://restapi.e-conomic.com/invoices/booked/?skipPages=" + skipPagesVal,
                            dataType: "json",
                            headers: {
                                'X-AppSecretToken': "",
                                'X-AgreementGrantToken': "",
                                accept: "application/json"
                            },
                            type: "GET"
                        })

                        .always(function (data) {
                            for (var i = 0; i < 20; i++) {
                                globalI++;
                                var invoiceNumber = data.collection[i].bookedInvoiceNumber;
                                document.getElementById("output").innerHTML += "<div id='" + invoiceNumber + "'>#:" + globalI + "| InvoiceNum: " + data.collection[i].bookedInvoiceNumber + " | CustomerNum: " + data.collection[i].customer.customerNumber + " | Date: " + data.collection[i].date + " | Gross: " + data.collection[i].grossAmount + "<br><br></div>";
                                
                                getInvoiceLines(invoiceNumber);
                            };
                        });
                        document.getElementById("output").innerHTML += "</pre>";
                    };
                };
                getInvoiceNumbers();
                
                function getInvoiceLines(invoiceNumber) {
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
                                document.getElementById(invoiceNumber).innerHTML += "<br><hr><br>";
                                break;
                            } else {
                                document.getElementById(invoiceNumber).innerHTML += "  *" + resultData.product.productNumber + " | " + resultData.description + " | " + resultData.unitNetPrice + " | " + resultData.quantity + "<br>";
                            }
                        };
                    });
                }
            });
        </script>
    </body>
</html>