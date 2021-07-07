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
                    <th>Product Name</th>
                    <th>{{$info['product']}}</th>
                </tr>
            </table><br><br>
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Quantity Purchased</th>
                </tr>
                <tr>
                    <td>Admin</td>
                    <td>1</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<x-footer/>