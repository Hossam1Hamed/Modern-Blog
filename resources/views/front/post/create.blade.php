@extends('layouts.app')

@section('content')

<h1>Add New Post </h1>
<div class="alert alert-success" id="success_msg" style="display: none;">
        Operation Done successfully
    </div>
    <div class="alert alert-danger" id="failure_msg" style="display: none;">
        Operation have not done unfortionatly , try again
    </div>
    
<form method="post" id="create" action="">
    @csrf
    <input type="hidden" name="user_id" value="{{$user}}">
  <div class="mb-3">
    <label class="form-label">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="mb-3">
    <label class="form-label">Post Content</label>
    <textarea type="text" class="form-control" name="content"></textarea>
  </div>

  <div class="mb-3">
  <label for="">Choose Your Post Category</label>
  <select class="form-select" name="cat_id">
        <option selected>....</option>
            @foreach($cats as $cat)
                <option name="cat_id" value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
    </select>
  </div>

  <div class="mb-3">
  <label for="">Choose Your Tags</label>
  <select class="form-select" name="tags_id[]" multiple data-mdb-placeholder="Example placeholder" multiple>
        <option selected>....</option>
            @foreach($tags as $tag)
                <option name="tag_id" value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
    </select>
  </div>
  <button id="save" class="btn btn-primary">Submit</button>
</form>

@endsection

@section('scripts')

<script>
    $(document).on('click','#save',function(e){
        e.preventDefault();
        $('#title_error').text('');
        $('#content_error').text('');
        $('#cat_id_error').text('');
        var formData=new FormData($('#create')[0]);
        $.ajax({
            type : 'post',
            url : ("{{ route('post.store')}}"),
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