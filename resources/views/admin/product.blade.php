<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css');
    <style type="text/css">
    .title
    {
      color:white;
      padding-top: 25px;
      font-size: 25px;
    }

    label
    {
      display: inline-block;
      width: 200px;
    }
    </style>
  </head>
  <body>
        @include('admin.sidebar');


        @include('admin.navbar');

        <div class="container-fluid page-body-wrapper">


          <div class="container" align="center">

            <h1 class="title">This is Product Page</h1>

            <form action="">

              <div style="padding:15px;">
                <label for="">Product title</label>
                <input type="text" name="title" placeholder="Give a product title" required="">
              </div>

              <div style="padding:15px;">
                <label for="">Price</label>
                <input type="number" name="price" placeholder="Give a price" required="">
              </div>

              <div style="padding:15px;">
                <label for="">Description</label>
                <input type="text" name="desc" placeholder="Give a description" required="">
              </div>

              <div style="padding:15px;">
                <label for="">Quantity</label>
                <input type="text" name="quantity" placeholder="Product quantity" required="">
              </div>

              <div style="padding:15px;">
              <input type="file" name="file">
              </div>

              <div style="padding:15px;">
                <input type="submit">
              </div>

            </form>

          </div>

      </div>

          @include('admin.script');

</html>
