<?php
    $cust_name = empty($_GET['cust_name'])?"<em>No data received</em>":$_GET['cust_name'];
    $cust_email = empty($_GET['cust_email'])?"<em>No data received</em>":$_GET['cust_email'];
    $cust_addr = empty($_GET['cust_addr'])?"<em>No data received</em>":$_GET['cust_addr'];
    $cust_order = empty($_GET['cust_order'])?"":$_GET['cust_order'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Checkout Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php 
            echo '<script>var co = \''.$cust_order.'\';</script>';
        ?>
    </head>
    <body>
        <div class="p-5 mb-3 bg-light">
            <div class="container">
                <h1 class="display-4">Checkout Page</h1>
                <p>Due to limitations from the free hosting provider, this page only receives GET requests from submitting student sites. Use method="GET".</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="my-3">Delivery Details</h4>
                    <h6><?php echo $cust_name; ?><br>
                    <small class="text-muted">Name</small></h6>
                    <h6><?php echo $cust_email; ?><br>
                    <small class="text-muted">Email</small></h6>
                    <h6><?php echo $cust_addr; ?><br>
                    <small class="text-muted">Address</small></h6>
                </div>
                <div class="col-sm-6">
                    <h4 class="my-3">Online Cart</h4>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <script>
                                var f = new Intl.NumberFormat('en-US', {style:'currency',currency: 'PHP'});
                                var totalcost = 0.0;
                                if(co!="") {
                                    try {
                                        var cust_order = JSON.parse(co);
                                        for(co of cust_order) {
                                            document.write('<li class="list-group-item"><h6>' + co.prod_name + '</h6><p>' + f.format(co.prod_price) + '</p></li>');
                                            totalcost += co.prod_price;
                                        }
                                    } catch (e) {
                                        document.write('<li class="list-group-item">JSON is improperly formatted. '+ e + '</li>')
                                    }
                                } else {
                                    document.write('<li class="list-group-item">Cart is empty or no data received</li>');
                                }
                            </script>
                        </ul>
                        <div class="card-footer"><span id="totalcost"><script>document.write(f.format(totalcost));</script></span></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>