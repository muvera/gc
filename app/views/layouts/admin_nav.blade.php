
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600">

<style>
  .navbar-default {
    background-color:#fff6ff;

}
</style>

<nav class="navbar navbar-default">
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
            <li @if($active == 1) class="active" @endif><a href="/admin">Orders <span class="sr-only">(current)</span></a></li>
            <li @if($active == 2) class="active" @endif><a href="/admin_categories">Categories</a></li>
            <li @if($active == 3) class="active" @endif><a href="/admin_products">Products</a></li>
            <li @if($active == 4) class="active" @endif><a href="/admin_styles">Styles</a></li>
            <li @if($active == 5) class="active" @endif><a href="/admin_sizes">Sizes</a></li>
          </ul>



            <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div><!--/.navbar-collapse -->


        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>









