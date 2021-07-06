<x-master/>
<x-header/>
<div class="container custom-signup">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="signup_form" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter email" value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" value="">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" placeholder="Re-enter Password" value="">
            </div>
            <div class="form-group">
                <label for="contact">Contact No.</label>
                <input type="tel" pattern="[0-9]{10}" name="contact" class="form-control"  placeholder="Enter Contact No." value="">
            </div>
            <div class="form-group">
            <label for="hostel">Hostel</label>
            <input type="text" name="hostel" list="hostel" class="form-control" placeholder="Choose Hostel">
            <datalist id="hostel">
            <option value="Jasper">
            <option value="Amber">
            <option value="Sapphire">
            <option value="Diamond">
            <option value="Emerald">
            <option value="Ruby">
            <option value="Rosaline">
            <option value="Opal">
            </datalist>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        </div>
    </div>
</div>
<x-footer/>