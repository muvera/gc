

<style>
  .navbar-default {
    background-color:#fff6ff;

}
</style>

<nav class="navbar navbar">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="padding-top: 1px;" href="/"><img src="/assets/gogocake-logo-icon.png" alt="Gogo Cake Logo" width="50"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
           <ul class="nav navbar-nav">
            <li ><a href="/categories/1"> BIRTHDAY<span class="sr-only">(current)</span></a></li>

          </ul>

@if(Session::get('items'))

            <ul class="nav navbar-nav navbar-right">
            <li><a href="/checkout" class="btn btn-primary"> <span class="glyphicon glyphicon-shopping-cart"></span> Checkout</a></li>
          </ul>
@endif

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>









