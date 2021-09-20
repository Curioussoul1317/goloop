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
                        <i class="fas fa-list"></i>Admin Accounts
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-md-12" style="margin-top:20px;">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="row">
                                            <table class="table">

                                                @if(isset($editadmins))
                                                <form action="{{route('Partner.update')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Profile Pic</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Edit</th>
                                                        </tr>
                                                    </thead>
                                                </form>
                                                @else
                                                <form action="{{route('Admins.store')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">
                                                                <div class="form-group">
                                                                    <style>
                                                                        .image-upload>input {
                                                                            display: none;
                                                                        }
                                                                    </style>
                                                                    <div class="image-upload">
                                                                        <label for="file-input">
                                                                            <img src="{{ asset('defaultimg/upload.png') }}" id="output" width="100" , height="100" />
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
                                                            </th>
                                                            <th scope="col"> <input type="text" name="name" placeholder="Full Name" required class="form-control" style="width: 100%;">
                                                                <br>
                                                                <input type="text" name="password" placeholder="PassWord" required class="form-control" style="width: 100%;">
                                                            </th>
                                                            </th>
                                                            <th scope="col"> <input type="email" name="email" placeholder="Email" required class="form-control" style="width: 100%;">
                                                                <br>
                                                                <input type="text" name="passwordtwo" placeholder="PassWord" required class="form-control" style="width: 100%;">
                                                            </th>
                                                            <th scope="col">
                                                                <br> <button type="submit" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-dot-circle-o"></i> Add
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </form>
                                                @endif
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Profile Pic</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if(count($admins)>0)
                                                    @foreach($admins as $admin)
                                                    <tr>
                                                        <th scope="row"><img src="{{ asset('/storage/ProfilePics/'.$admin->profile_pic) }}" alt="" width="100" , height="100"></th>
                                                        <td>{{$admin->full_name}}</td>
                                                        <td>{{$admin->email}}</td>
                                                        <td>Edit</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>


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
