<x-master/>
<x-header/>
<div class="container custom-signup">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="product_form" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="product" class="form-control"  placeholder="Enter Name" value="">
            </div>
            <div class="form-group">
                <input type="hidden" name="email" class="form-control"  placeholder="Enter email" value="{{session('user')}}">
            </div>
            <div class="form-group">
                <label for="name">Price per Item</label>
                <input type="number" name="price" class="form-control"  placeholder="Enter Price" value="">
            </div>
            <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" list="category" class="form-control" placeholder="Choose Category">
            <datalist id="category">
            <option value="Stationary">
            <option value="Electronics">
            <option value="Books">
            <option value="Fashion">
            <option value="Other">
            </datalist>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control"  placeholder="Enter Quantity" value="">
            </div>
            <div class="form-group">
                <label for="gallery">Product image link</label>
                <input type="text" name="gallery" class="form-control"  placeholder="Enter Product image link" value="">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        </div>
    </div>
</div>
<x-footer/>