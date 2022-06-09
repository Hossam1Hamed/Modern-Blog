@extends('layouts.app')

@section('content')

<h1>Edit Post </h1>
<div class="alert alert-success" id="success_msg" style="display: none;">
        Operation Done successfully
    </div>
    <div class="alert alert-danger" id="failure_msg" style="display: none;">
        Operation have not done unfortionatly , try again
    </div>
<form method="post" id="edit" action="{{ route('ajax.update')}}">
    @csrf
    {{ method_field('put') }}
    <input type="hidden" name="id" value="{{$post[0]->id}}">
  <div class="mb-3">
    <label class="form-label">Post Title</label>
    <input type="text" class="form-control" name="title" value="{{$post[0]->title}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Post Content</label>
    <textarea type="text" class="form-control" name="content" value="">{{$post[0]->content}}</textarea>
  </div>

  <div class="mb-3">
  <label for="">Choose Your Post Category</label>
  <select class="form-select" name="cat_id">
            @foreach($cats as $cat)
                <option name="cat_id" value="{{$cat->id}}" {{ ($post[0]->cat_id == $cat->id)? 'selected' : ''}}>{{$cat->name}}</option>
            @endforeach
    </select>
  </div>

  <div class="mb-3">
  <label for="">Choose Your Tags</label>
  <select class="form-select" name="tags_id[]" multiple data-mdb-placeholder="Example placeholder" multiple>
            @foreach($post[0]->tags as $tag)
                <option name="tag_id" value="{{$tag->id}}" selected>{{$tag->name}}</option>
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
        var formData=new FormData($('#edit')[0]);
        $.ajax({
            type : 'post',
            url : ("{{ route('ajax.update')}}"),
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