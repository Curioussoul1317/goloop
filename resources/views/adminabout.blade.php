@extends('layouts.admin')

@section('content')

<!-- STATISTIC-->


<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                <div class="au-card-title">
                    <div class="bg-overlay bg-overlay--blue"></div>
                    <h3>
                        <i class="fas fa-users"></i>Aboutu Goloop 
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-lg-12">                           
                            <form action="{{route('About.update')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                            {{ csrf_field() }} 
                                            <div class="row">
    <div class="col">
    <div class="card border-success " >
  <div class="card-header">Header</div>
  <div class="card-body text-success">
  <div class="form-group">
                                                        <style>
                                                            .image-upload>input {
                                                                display: none;
                                                            }
                                                        </style>
                                                        <div class="image-upload">
                                                            <label for="file-input">
                                                                @if($about->goloop_pic == "goloop")
                                                                <img src="{{ asset('defaultimg/upload.png') }}" id="output" />
                                                                @else
                                                                <img  src="{{ asset('/storage/Aboutus/'.$about->goloop_pic) }}" id="output" >
                                                                @endif                                                          
                                                                <input type="hidden" name="currentimg" value="{{$about->goloop_pic}}" >
                                                            </label>
                                                            <input id="file-input" type="file" onchange="loadFile(event)" name="UploadedFile"  />
                                                        </div>
                                                        <script>
                                                            var loadFile = function(event) {
                                                                var output = document.getElementById('output');
                                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                                output.onload = function() {
                                                                    URL.revokeObjectURL(output.src) // free memory
                                                                }
                                                            };
                                                        </script>
                                                    </div>
</div>
</div>
    </div>
    <div class="col">
    <div class="card border-secondary " >
  <div class="card-header">Header</div>
  <div class="card-body text-secondary">
  <div class="form-group">
                                        <input type="text" name="phone" placeholder="Phone" required class="form-control" value="{{$about->phone}}" style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" required class="form-control" value="{{$about->email}}" style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" placeholder="Address" required class="form-control" value="{{$about->address}}" style="width: 100%;">
                                    </div>
</div>
</div>
    </div>
  </div>
  <div class="row">
      <div class="col">
      <div class="card border-primary " >
  <div class="card-header">Header</div>
  <div class="card-body text-primary">
  <div class="form-group">
    <textarea name="aboutus" rows="15" placeholder="About Us" class="form-control" style="width:100%"> {{$about->aboutus}}</textarea>
                                                        </div>    
</div>
</div>
    </div>
  </div>
                                                   <div class="card-footer" style="width:100%">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
</form>
  

 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@section('script') @endsection @endsection
