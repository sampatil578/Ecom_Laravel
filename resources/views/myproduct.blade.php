<x-master/>
<x-header/>
<div class="container custom-product">
    <div class="row product-container">
        @foreach ($products as $item)
        <div class="col-sm-3 product-card">
            <div>
                <img src="{{$item['gallery']}}" alt="{{$item['product']}}"><br>
            </div>
            <h2>{{$item['product']}}</h3>
            <h3> Quantity : {{$item['quantity']}}</h3>
            <h2>Price: {{$item['price']}}/-</h3><br>
            <form action="product_hist/{{$item['id']}}">
                <button class="btn btn-primary" type="submit">Show Product History</button>
            </form>&nbsp
        </div>
        @endforeach
    </div>
</div>
<x-footer/>