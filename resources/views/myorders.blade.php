<x-master/>
<x-header/>
<div class="container myorders">
    <div class="row">
        <div class="col-sm-12">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Owner Name</th>
                    <th>Quantity Purchased</th>
                    <th>Total Price</th>
                </tr>
                @foreach ($product as $item)
                    <tr>
                        <td>{{$item->product}}</td>
                        <td><a href="../profile/{{$item->id}}">{{$item->name}}</a></td>
                        <td>{{$item->quantity_purchased}} </td>
                        <td>{{$item->quantity_purchased*$item->price}} </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<x-footer/>