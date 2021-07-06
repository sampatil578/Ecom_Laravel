<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">OLX@IITISM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      @if(@session()->has('user'))
        <li class=""><a href="/">Products</a></li>
        <li><a href="/addproduct">Upload Product</a></li>
        <li><a href="#">Cart(0)</a></li>
        <li><a href="#">My Profile</a></li>
        <li><a href="/logout">logout</a></li>
      @else
        <li class=""><a href="/">Products</a></li>
        <li><a href="/login">login</a></li>
        <li><a href="/signup">signup</a></li>
      @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>