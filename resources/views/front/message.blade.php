@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-4">
          <div class="card blur shadow-blur max-height-vh-70 overflow-auto overflow-x-hidden mb-5 mb-lg-0">
            <div class="card-header p-3">
              <h6>Friends</h6>
              <input type="email" class="form-control" placeholder="Search Contact" aria-label="Email">
            </div>
            <div class="card-body p-2">
              <a href="javascript:;" class="d-block p-2 border-radius-lg bg-gradient-primary">
                <div class="d-flex p-2">
                  <!-- <img alt="Image" src="../../assets/img/team-2.jpg" class="avatar shadow"> -->
                  <div class="ms-3">
                    <div class="justify-content-between align-items-center">
                      <h6 class="text-white mb-0">{{Auth::user()->name}}
                        <span class="badge badge-success"></span>
                      </h6>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card blur shadow-blur max-height-vh-70">
            <div class="card-header shadow-lg">
              <div class="row">
                <div class="col-md-10">
                  <div class="d-flex align-items-center">
                    <!-- <img alt="Image" src="../../assets/img/team-2.jpg" class="avatar"> -->
                    <div class="ms-3">
                      <h6 class="mb-0 d-block">{{Auth::user()->name}}</h6>
                      <span class="text-sm text-dark opacity-8">last seen today at 1:53am</span>
                    </div>
                  </div>
                </div>
                <div class="col-1 my-auto pe-0">
                  <button class="btn btn-icon-only shadow-none text-dark mb-0 me-3 me-sm-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Video call">
                    <i class="fa fa-camera-compact"></i>
                  </button>
                </div>
                <div class="col-1 my-auto ps-0">
                  <div class="dropdown">
                    <button class="btn btn-icon-only shadow-none text-dark mb-0" type="button" data-bs-toggle="dropdown">
                      <i class="fa fa-settings"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end me-sm-n2 p-2" aria-labelledby="chatmsg">
                      <li>
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          Profile
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          Mute conversation
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          Block
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          Clear chat
                        </a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li>
                        <a class="dropdown-item border-radius-md text-danger" href="javascript:;">
                          Delete chat
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body overflow-auto overflow-x-hidden">
              <div class="row justify-content-start mb-4">
                <div class="col-auto">
                  <div class="card ">
                    <div class="card-body py-2 px-3">
                      <p  id="messages" class="mb-1">
                      </p>
                      <div class="d-flex align-items-center text-sm opacity-6">
                        <i class="fa fa-check-bold text-sm me-1"></i>
                        <p class="mb-1">
                        hossam is comming
                        </p>
                        <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                        <i class="fa fa-check-bold text-sm me-1"></i>
                        <small>3:33pm</small>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end text-right mb-4">
                <div class="col-auto">
                  <div class="card bg-gray-200">
                    <div class="card-body py-2 px-3">
                      <p class="mb-1">
                        Can it generate daily design links that include essays and data visualizations ?<br>
                      </p>
                      <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                        <i class="fa fa-check-bold text-sm me-1"></i>
                        <small>4:42pm</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-block" id="messages">

              <form class="align-items-center" id="messageform" method="post" action="">
                @csrf
                <div class="d-flex">
                  <input type="hidden" name="username" id="username" value="{{Auth::user()->name}}">
                  <div class="input-group">
                    <input type="text" name="message" id="messageinput" data-url="{{route('messages.store')}}" class="form-control" placeholder="Type here" aria-label="Message example input">
                  </div>
                  <button type="submit" class="btn bg-gradient-primary mb-0 ms-2">
                    <i class="fa fa-send"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
<script src="../js/app.js"></script>
<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script>
  $('messageinput').keypress(function(e){
    console.log(e.which);
});
</script>
@endsection
