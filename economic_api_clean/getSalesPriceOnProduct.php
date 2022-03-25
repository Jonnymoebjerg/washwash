<!DOCTYPE html>
<html>
    <head>
        <title>1337</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>Invoices:</p>
        <pre id="number"></pre>
        <pre id="output"></pre>
        <script>
            $( document ).ready(function() {
                function getInvoiceNumbers() {
                    for (var skipPagesVal = 0; skipPagesVal < 2; skipPagesVal++) {
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
                            for (var i = 0; i < 5276; i++) {
                                document.getElementById("output").innerHTML += "#:" + i + "| InvoiceNum: " + data.collection[i].bookedInvoiceNumber + " | CustomerNum: " + data.collection[i].customer.customerNumber + " | Date: " + data.collection[i].date + " | Gross: " + data.collection[i].grossAmount + "<br>";
                                document.getElementById("number").innerHTML = i + " of " + data.pagination.results;
                                document.getElementById("output").innerHTML += JSON.stringify(data.collection[i], null, 4) + "<br><hr>";
                                /*
                                $.ajax({
                                    url: "https://restapi.e-conomic.com/invoices/booked/" + data.collection[i].bookedInvoiceNumber + "/",
                                    dataType: "json",
                                    headers: {
                                        'X-AppSecretToken': "",
                                        'X-AgreementGrantToken': "",
                                        accept: "application/json"
                                    },
                                    type: "GET" 
                                })
                                    
                                .always(function (data) {
                                    var index;
                                    for (index = 0; index < arrayLines.length; ++index) {
                                        document.getElementById("output").innerHTML += "* " + arrayLines[index].lineNumber;
                                    };
                                });
                                */
                               
                                /*
                                $.ajax({
                                    type: "POST",
                                    url: "php/setSale.php",
                                    datatype: "text",
                                    data: {invoiceNumber:data.collection[i].bookedInvoiceNumber,date:data.collection[i].date,customerNumber:data.collection[i].customer.customerNumber,grossAmount:data.collection[i].grossAmount},
                                    success: function (result) {
                                        console.log("Sale inserted, Jonny rules all the code!");
                                    }
                                });
                                */
                            };
                        });
                        document.getElementById("output").innerHTML += "</pre>";
                    };
                };
                getInvoiceNumbers();
            });
        </script>
    </body>
</html>