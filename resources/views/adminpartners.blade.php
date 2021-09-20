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
                        <i class="fas fa-list"></i>Partners
                    </h3> 
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-md-12" style="margin-top:20px;">
                                <div class="card">
                                    <div class="card-body card-block"> 
                                        <div class="row">
                                            @if(isset($editpartner))
                                            <form action="{{route('Partner.update')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="card bg-light mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">
                                                        <input type="text" name="name" placeholder="Name" required class="form-control" value="{{$editpartner->name}}" style="width: 100%;">
                                                    
                                                        <input type="hidden" name="imgname" value="{{$editpartner->img}}">
                                                        <input type="hidden" name="id" value="{{$editpartner->id}}">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <style>
                                                                .image-upload>input {
                                                                    display: none;
                                                                }
                                                            </style>
                                                            <div class="image-upload">
                                                                <label for="file-input">
                                                                <img src="{{ asset('/storage/Partners/'.$editpartner->img)}}"  id="output"/> 
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
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> Update
                                                    </button>
                                                    <a href="{{route('Partner.index')}}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i>Cancel</a>
</div>
                                                    
                                                </div>
                                            </form>
                                            @else
                                             <form action="{{route('Partner.store')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="card bg-light mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">
                                                        <input type="text" name="name" placeholder="Name" required class="form-control" style="width: 100%;">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
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
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> Add
                                                    </button>
                                                </div>
                                            </form>
                                       @endif


                                            @if(count($partners)>0)
                                            @foreach($partners as $partner)
 
                                                <div class="card bg-light mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">
                                                        <h5>{{$partner->name}} </h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <div class="form-group"> 
                                                    <img src="{{ asset('/storage/Partners/'.$partner->img)}}" /> 
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-primary btn-sm" href="{{route('Partner.show', ['id'=>$partner->id])}}">
                                                    <i class="fa fa-dot-circle-o"></i>Edit</a>  
                                                </div> 
                                            @endforeach
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
    </div>
</section>

 
@section('script')
 
@endsection
@endsection