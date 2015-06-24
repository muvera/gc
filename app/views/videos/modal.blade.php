
<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
  Embeded Videos
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Videos</h4>
      </div>
      <div class="modal-body">

<?php
$videos = Video::get();
?>

<h1>Show All Videos</h1>


      
@foreach($videos as $video)


<h3>#{{$video->id}} <a href="{{route('videos.show', $video->id)}}">{{$video->name}}</a> <small>{{$video->vidcategories()->first()->name}}</small></h3>
  
  <br>
  
  {{$video->video}}
  <br>
  {{$video->description}}
  <br>
  <input type="text" value='{{$video->video}}'class="form-control">
  
@endforeach
<hr>
<a href="{{route('videos.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->