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
                        <i class="fas fa-users"></i>Sliders 
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-lg-12">                           
           

<form action="{{route('Slider.store')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <div class="form-group">
                                                        <h5 class="modal-title" id="EventModalLabel"> <strong>New Slide Image</strong> </h5>
                                                        <style>
                                                            .image-upload>input {
                                                                display: none;
                                                            }
                                                        </style>
                                                        <div class="image-upload">
                                                            <label for="file-input">
                                                                <img src="{{ asset('defaultimg/upload.png') }}" id="output" />
                                                            </label>
                                                            <input id="file-input" type="file" onchange="loadFile(event)" name="UploadedFile" required />
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
                                                    <div class="card-footer" style="width:100%">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>

</div>
</div>
</form>

<style>
     /* The heart of the matter */
.testimonial-group > .row {
  display: block;
  overflow-x: auto;
  white-space: nowrap;
}
.testimonial-group > .row > .col-4 {
  display: inline-block;
}
.deletebtn{
    color: red;
  background-color: transparent; 
  text-decoration: none;
    position:absolute;
    font-size: 20px;
    top:-5px;right:10px;margin:0;z-index :1;
}

.deletebtn:hover {
  color: grey;
  background-color: transparent;
  text-decoration: underline;
}
    </style>
                                <div class="row">
                                <div class="container">
 
 <div class="container testimonial-group">
 @if(isset($Slides))
   <div class="row text-center">
   @if(count($Slides)>0) @foreach($Slides as $image)
     <div class="col-4">
     <a href="{{route('Slider.show', ['id'=>$image->id])}}" class="deletebtn">
     <i class="fa fa-trash"  aria-hidden="true"></i>
    </a>
 
         <img  src="{{ asset('/storage/Slides/'.$image->img) }}" >
        </div>
  
     @endforeach
     @endif
   </div>
                                @endif
 </div>                               
                              
                                        
                                </div>
                            </div>

 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@section('script') @endsection @endsection
