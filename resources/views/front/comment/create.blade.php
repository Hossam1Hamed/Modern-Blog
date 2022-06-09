@extends('layouts.app')

@section('content')

<h1>Add New Post </h1>

  <div class="alert alert-success" id="success_msg" style="display: none;">
        Operation Done successfully
    </div>
    <div class="alert alert-danger" id="failure_msg" style="display: none;">
        Operation have not done unfortionatly , try again
  </div>

<form method="post" action="" id="create">
    @csrf
  
  <div class="mb-3">
    <label class="form-label">Comment Content</label>
    <textarea type="text" class="form-control" name="content"></textarea>
  </div>

  <input type="hidden" name="post_id" value="{{$post[0]->id}}">
  <button id="save" class="btn btn-primary">Save Comment</button>
</form>

@endsection
@section('scripts')

<script>
    $(document).on('click','#save',function(e){
        e.preventDefault();
        $('#content_error').text('');
        var formData=new FormData($('#create')[0]);
        $.ajax({
            type : 'post',
            url : ("{{ route('comment.store')}}"),
            data : formData,
            processData : false,
            contentType : false,
            cache : false,
            success : function(data){
                if(data.status == true){
                    $('#success_msg').show();
                }
            },error : function(reject){
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors,function(key,val){
                    $("#"+key).text(val[0]);
                    
                });
            },
        });
    });
</script>

@endsection