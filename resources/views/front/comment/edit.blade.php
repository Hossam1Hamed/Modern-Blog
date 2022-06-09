@extends('layouts.app')

@section('content')

<h1>Add New Post </h1>

<div class="alert alert-success" id="success_msg" style="display: none;">
      Operation Done successfully
  </div>
  <div class="alert alert-danger" id="failure_msg" style="display: none;">
      Operation have not done unfortionatly , try again
</div>

<form method="post" action="" id="edit">
    @csrf  
    {{ method_field('put') }}
    <input type="hidden" name="id" value="{{$comment->id}}">
  
  <div class="mb-3">
    <label class="form-label">Comment Content</label>
    <textarea type="text" class="form-control" name="content">{{$comment->content}}</textarea>
  </div>

  <input type="hidden" name="post_id" value="{{$comment->post_id}}"">
  <button id="save" class="btn btn-primary">Update Comment</button>
</form>

@endsection
@section('scripts')

<script>
    $(document).on('click','#save',function(e){
        e.preventDefault();
        var formData=new FormData($('#edit')[0]);
        $.ajax({
            type : 'post',
            url : ("{{ route('comment.update')}}"),
            data : formData,
                
            processData : false,
            contentType : false,
            cache : false,
            success : function(data){
                if(data.status == true){
                    $('#success_msg').show();
                }else{
                    $('#failure_msg').show();
                }
            },error : function(reject){

            }
        });
    });
</script>

@endsection