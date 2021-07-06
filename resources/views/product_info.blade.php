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
                    <td>{{$owner['name']}}</td>
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
            <button class="btn btn-primary">Add To Cart</button>&nbsp
            <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
<x-footer/>