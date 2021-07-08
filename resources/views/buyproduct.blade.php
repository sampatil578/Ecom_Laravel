<x-master/>
<x-header/>
<div class="container custom-product">
    <div class="row">
        <div class="col-sm-4 info-image">
            <img src="{{$info->gallery}}">
        </div>
        <div class="col-sm-8">
            <table>
                <tr>
                    <td>Product Name</td>
                    <td>{{$info['product']}}</td>
                </tr>
                <tr>
                    <td>Owner name </td>
                    <td>{{$owner['name']}} (<a href="../profile/{{$owner['id']}}">Profile</a>)</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{$owner['contact']}}</td>
                </tr>
                <tr>
                    <td>Owner's Hostel</td>
                    <td>{{$owner['hostel']}}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{$info['price']}}</td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>{{$info['quantity']}}</td>
                </tr>
                <tr>
                    <td>Product Description</td>
                    <td>{{$info['description']}}</td>
                </tr>
            </table><br><br>
            <form action="../buy" method="POST">
            @csrf
                <div class="form-group col-sm-4">
                    <input type="number" name="quantity" class="form-control"  placeholder="Enter Required Quantity">
                    <input type="hidden" name="id" class="form-control"  placeholder="Enter Required Quantity" value="{{$info['id']}}">
                    <input type="hidden" name="q" class="form-control" value="{{$info['quantity']}}">
                </div>
                <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
        </div>
    </div>
</div>
<x-footer/>