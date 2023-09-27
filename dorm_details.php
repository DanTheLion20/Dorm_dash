<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- CART LIST -->
    <div class="container py-4 my-4">
          <div class="row">
              <div class="col-md-8 col-12">
                  <div id="cartlist">

                  </div>
              </div>
              <div class="col-md-4 col-12 ordersum">
                  <div class="card h-100"> 
                      <div class="card-body">
                          <h5 class="card-title py-4">Order Summary | <span id="itemcount"></span> items</h5>
                          <dl class="card-text">
                              <dt>Item(s) Subtotal:</dt> <br>
                              <dd class="text-end" id="subtotal"></dd><br>
                              <dt>Order Total:</dt><br>
                              <dd class="text-end" id="total"></dd><br>
                          </dl>
                      </div>
                      <div class="card-footer text-center">
                          Confirmed Orders CANNOT be modified <i class="fa-solid fa-circle-info px-3 info text-end" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Your items will not be reserved in your cart. Your items will be reserved for the next 30 minutes after the Checkout button has been pressed"></i>
                          <button class="btn w-100 checkout py-2 my-3">CHECKOUT</button>
                          <a href="index.html" class="btn w-100">Continue Shopping</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <!-- /CART LIST -->
</body>
</html>