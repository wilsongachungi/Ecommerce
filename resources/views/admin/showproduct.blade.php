
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
  </head>
  <body>
        @include('admin.sidebar');
      <!-- partial -->

        @include('admin.navbar');

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            @if (session()->has('message'))

            <div class="alert alert-success">

            <button type="buttun" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

            </div>

            @endif


            <div class="container" align="center">

                <table>
                    <tr>
                        <td style="padding:20px;">Title</td>
                        <td style="padding:20px;">Description</td>
                        <td style="padding:20px;">Quantity</td>
                        <td style="padding:20px;">Price</td>
                        <td style="padding:20px;">Image</td>
                        <td style="padding:20px;">Update</td>
                        <td style="padding:20px;">Delete</td>
                    </tr>

                    

                    @foreach($data as $product)

                    <tr style="background-color:black; align-items:center">
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description}}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img height="100" width="100"src="/productimage/{{ $product->image }}" alt="">
                        </td>

                        <td>
                            <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a>
                        </td>

                        <td>
                            <a class="btn btn-danger" href="{{ url('deleteproduct',$product->id) }}">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </table>

             </div>

        </div>
          <!-- partial -->
          @include('admin.script');

</html>

