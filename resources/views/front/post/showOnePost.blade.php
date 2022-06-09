@extends('layouts.app')

@section('content')
<div class="alert alert-success" id="success_msg" style="display: none;">
        Operation Done successfully
    </div>
    <div class="alert alert-danger" id="failure_msg" style="display: none;">
        Operation have not done unfortionatly , try again
    </div>
<div class="card mb-4 postRow{{$post[0]->id}}">
  <div class="card-body">
    
    <h5 class="card-title">{{$post[0]->title}}</h5>
    <p class="card-text">{{$post[0]->content}}</p>
    <div>
    @foreach($post[0]->tags as $tag)
    <a href=""><span class="badge bg-secondary">#{{$tag->name}}</span></a>
    @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-left">
            <a href="{{route('post.edit',$post[0]->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i> edit</button></a>
            <a href="" post_id="{{$post[0]->id}}" class="deletePost" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> delete</button></a>
        </div>
    </div>
    <div class="card-text mt-4 row">
      <div class="input-group">
        <h5 class="input-group-text mx-4 b-0" for="">Comments  </h5>
        <form action="{{ route('comment.create',$post[0]->id)}}" method="POST">
        @csrf
        {{ method_field('POST') }}
        <button type="submit" class="input-group-btn btn-blue"><i class="fa fa-plus py-2"></i></button>
        </form>
      </div>
        @foreach($comments as $comment)
        <div class="alert alert-light">
          <p class="card-text">{{$comment->content}}</p>
            <span>created at : {{$comment->created_at}}</span>
            <div>
                <a href="{{route('comment.edit',$comment->id)}}"><span class="badge bg-warning ml-2"><i class="fas fa-edit"></i> edit</span></a>
                <a comment_id="{{$comment->id}}" class="deleteComment" onclick="return confirm('Are you sure?')">
                  <button type="button" class="badge bg-danger"><i class="fas fa-trash"></i> delete</button>
                </a>
                
            </div>
        </div>
        @endforeach
</div>
    <div>
    <p class="card-text"><small class="text-muted">created at  : {{$post[0]->created_at}}</small></p>
    <p class="card-text"><small class="text-muted">updated at : {{$post[0]->updated_at}}</small></p>
    </div>
  </div>
  <div>
    <span>written by : </span>
    <a href=""><button type="button" class="btn btn-primary">{{Auth::user()->name}}</button></a>
  </div>
  <!-- <div class="col-md-12 bg-light text-left">
    <span class="badge bg-warning ml-2">edit</span></a>
  </div> -->
  
</div>

@endsection

@section('scripts')

<script>
    $(document).on('click','.deletePost',function(e){
        e.preventDefault();
        
        var post_id = $(this).attr('post_id');
        $.ajax({
            type : 'post',
            url : ("{{ route('ajax.delete')}}"),
            data :
                {
                '_token' : "{{csrf_token()}}" ,
                'id'     : post_id,
                },
            
            success : function(data){
                if(data.status == true){
                    $('#success_msg').show();

                }else{
                    $('#failure_msg').show();
                }
                $('.postRow'+data.id).remove();
            },error : function(reject){

            }
        });
    });
</script>

@endsection

@section('scripts')

<script>
    $(document).on('click','.deleteComment',function(e){
        e.preventDefault();
        
        var comment_id = $(this).attr('comment_id');
        $.ajax({
            type : 'post',
            url : ("{{ route('comment.delete')}}"),
            data :
                {
                '_token' : "{{csrf_token()}}" ,
                'id'     : comment_id,
                },
            
            success : function(data){
                if(data.status == true){
                    $('#success_msg').show();

                }else{
                    $('#failure_msg').show();
                }
                $('.postRow'+data.id).remove();
            },error : function(reject){

            }
        });
    });
</script>

@endsection