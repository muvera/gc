
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_{{$product->id}}">
  Upload
</button>

<!-- Modal -->
<div class="modal fade " id="modal_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Designs</h4>
      </div>
      <div class="modal-body">

<div class="row">

  <div class="col-md-5 well">
    <h4>Nes Design</h4>
 {{Form::open(['route'=>'product_style_upload', 'files'=> true])}}
{{Form::hidden('product_id', $product->id)}}


    <!-- name -->
<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class'=>'form-control']) }}
</div>

    <!-- $style -->
<div class="form-group">
{{ Form::label('style', 'Style') }}
<select name="style_id" class="form-control">
  @foreach($styles as $style)
  <option value="{{$style->id}}">{{$style->name}}</option>
    @endforeach
</select>
</div>


    <!-- Thumbnail -->
<div class="form-group">

    {{ Form::file('img') }}
</div>
          <button class="btn btn-primary" type="submit">Upload</button>
        {{Form::close()}}

  </div>
  <div class="col-md-6 well">

@if($product->designs()->first())
  @foreach($product->designs()->get() as $design)
  <strong>Name: </strong>{{$design->name}}
  <br>

  <img src="/uploads/products/{{$product->id}}/{{$design->styles()->first()->id}}/{{$design->img}}" width="100">

  <br>
   <strong>Style: </strong>{{$design->styles()->first()->name}}
 
  {{Form::open(['method'=>'DELETE', 'route'=>['designs.destroy',$design->id]])}}
  {{Form::hidden('id', $design->id)}}
      <a href="{{route('designs.edit', $design->id)}}" class="btn btn-default">Edit</a>
  <button type="submit" class="btn btn-default">Delete</button>
  {{Form::close()}}
  <hr>
  @endforeach

@endif


  </div>

</div>











      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->