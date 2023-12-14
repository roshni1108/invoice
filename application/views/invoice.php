<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .container{
                padding-top:20px;
            }
            .finaltotal{
                text-align: -webkit-right;
                /* padding-right: 166px; */
                border-spacing: 4px;
            }
            .bill{
                text-align: -webkit-right;
            }
            .from{
                text-align: -webkit-left;
            }
        </style>
        <script>
            function GetPrint(){
                window.print()
            }

            function btnadd(){
                var add = $("#Trow").clone().appendTo("#Tbody");
                $(add).find("input").val('');
                $(add).removeClass("done");
            }

            function btndel(add){
                $(add).parent().parent().remove();
            }

            function Calc(add){
                var index= $(add).parent().parent().index();

                var qty = document.getElementsByName("qty")[index].value;
                var price = document.getElementsByName("price")[index].value;

                var amt = qty * price;
                // alert(price);
                document.getElementsByName("amt")[index].value = amt;

                gettotal();
            }

            function gettotal(){
                var sum = 0;
                var amts = document.getElementsByName("amt");

                for (let index = 0; index< amts.length; index++){
                    var amt = amts[index].value;
                    sum = sum + amt;
                }
                document.getElementsByName("FTotal")[index].value = FTotal;
                var gst = document.getElementsByName("gst");
                var descount = document.getElementsByName("descount");
                var net = sum + gst - descount;
                document.getElementsByName("FTotal")[index].value = sum;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <form action="<?= base_url() ?>Invoice/savedata" method="post">
                    <div class="row">
                        <div class="col-lg-6 ">
                        <h3>From</h3>

                            <div>
                                <lable>Name</lable>
                                <input type="text" name="name">
                            </div>
                            <div>
                                <lable>Email</lable>
                                <input type="email" name="email">
                            </div>
                            <div>
                                <lable>Address</lable>
                                <input type="text" name="address">
                            </div>
                            <div>
                                <lable>Phone</lable> 
                                <input type="text" name="phone">
                            </div>
                            <div>
                                <lable>GST</lable>
                                <input type="text" name="gst">
                            </div>    
                        </div>
                        <div class="col-lg-6 ">
                            <h3>Bill To </h3>
                            <div>
                                <lable>Name</lable>  
                                <input type="text" name="cname">
                            </div>
                            <div>
                                <lable>Email</lable>   
                                <input type="email" name="cemail">
                            </div>
                            <div>
                                <lable>Address</lable>  
                                <input type="text" name="caddress">
                            </div>
                            <div>
                                <lable>Phone</lable>  
                                <input type="text" name="cphone">
                            </div>
                            <div>
                                <lable>Mobile</lable>
                                <input type="text" name="cmobile">
                            </div>    
                            <div>
                                <lable>Fax</lable>   
                                <input type="text" name="cfax">
                            </div>
                        </div>
                        <br><br>
                        <h3>Items</h3>
                        <table>
                            <thead>
                                <th>Name</th>
                                <th>Description</th>
                                <th>QTY</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th><button type="button" onclick="btnadd()">+</button></th>
                            </thead>
                            <tbody id="Tbody" class="done">
                                <tr id="Trow">
                                    <td><input type="text" class="form-control" name="productname"></td>
                                    <td><input type="text" class="form-control" name="producetdescription"></td>
                                    <td><input type="number" class="form-control" name="qty" onchange="Calc(this);"></td>
                                    <td><input type="number" class="form-control" name="price" onchange="Calc(this);"></td>
                                    <td><input type="number" class="form-control" name="amt" ></td>
                                    <td><button type="button" onclick="btndel()">-</button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="container ">
                        <div class="card finaltotal">
                            <div class="input-group">
                                <lable> Sub Total</lable>
                                <input type="number" name="FTotal" id="FTotal" >
                            </div>
                            <div class="input-group">
                                <lable> GST</lable>
                                <input type="number" name="Fgst" id="Fgst">
                            </div>
                            <div class="input-group">
                                <lable> Discount</lable>
                                <input type="number" name="Fdiscount" id="Fdiscount">
                            </div>
                            <div class="input-group">
                                <lable> Total</lable>
                                <input type="number" name="Famount" id="Famount">
                            </div>
                            <button type="button" onclick="GetPrint()"> Print</button>
                            <button type="submit" > Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>