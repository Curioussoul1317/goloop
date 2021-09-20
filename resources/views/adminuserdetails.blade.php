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
                        <i class="fas fa-user"></i>
                        @if(isset($User))
                        {{$User->full_name}} Details
                        @else
                        @endif
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-lg-12">
                                @if(isset($User))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border border-secondary" style="margin-top: 15px;">
                                            <div class="card-header">
                                                <div class="btn-group float-right mt-1" role="group" aria-label="Basic example">
                                                    <a class="btn btn-primary btn-sm" href="{{route('Adminteamanduser.index', ['type'=>1])}}"> <i class="fa fa-undo"></i></a>
                                                 </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="card border border-primary">
                                                            <div class="card-header">
                                                                <strong class="card-title">User Info</strong>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-header">
                                                                    <strong class="card-title">
                                                                        Full Name: </strong>{{$User->full_name}}
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                   
                                                                <li class="list-group-item">
                                                                        <strong class="card-title"> NIC/Passport : </strong> {{$User->nic}} 
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> Gender : </strong> {{$User->gender}} 
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> D.O.B : </strong> {{$User->dob}} 
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> Phone:</strong>{{$User->phone}}
                                                                        <strong class="card-title"> Email : </strong>{{$User->email}}
                                                                    </li>
                                                                </ul>
                                                                <div class="card-header">
                                                                    <strong class="card-title">Address </strong>
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                        <strong class="card-title"> Country : </strong> {{$User->country}} 
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> City : </strong> {{$User->city}} 
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> Address : </strong>  {{$User->address}}
                                                                    </li> 
                                                                    <li class="list-group-item">
                                                                        Joined On :<span class="badge badge-success badge-pill">{{$User->created_at}}
                                                                        </span>
                                                                        Status :<span class="badge badge-success badge-pill">{{$User->status}}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card border border-success">
                                                            <div class="card-header">
                                                                <strong class="card-title">User Events Info</strong>
                                                            </div>
                                                            <div class="card-body">
                                                            @if(count($UserEvents)>0) @foreach($UserEvents as $UserEvent) 
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                        <strong class="card-title"> </strong> {{$UserEvent->cat_event->name}} 
                                                                    </li> 
                                                                    </ul> 
                                                            @endforeach @endif 
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                    <div class="col-md-3">
                                                        <div class="card border border-success">
                                                            <div class="card-header"><strong class="card-title"> </strong>Team Info</div>
                                                            <div class="codecontainer" id="widget"> jj
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                               
                                @if(isset($TeamInfo))
                                    <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Full name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Joined On</th>
                                            <th scope="col" class=""></th>
                                        </tr>
                                    </thead>
                                    <tbody>@if(count($teammembers)>0) @foreach($teammembers as $members) <tr>
                                            <th scope="row"> {{ $members->member->full_name}}
                                            </th>
                                            <td>
                                            {{$members->member->email}}
                                            </td>
                                            <td>
                                            {{$members->member->phone}}  
                                            </td>
                                            <td>
                                            {{$members->member->gender}}
                                            </td>
                                            <td> 
                                            {{ $members->created_at}} 
                                            </td>
                                            <td>
                                                <div class="btn-group pull-right" role="group">
       <a class="btn btn-primary btn-sm " href="{{route('Adminteamanduser.show', ['id'=>$members->id, 'type'=>1])}}"><i class="fa fa-eye"></i></a>
                                                </div>

                                            </td>
                                        </tr>@endforeach @endif </tbody>
                                </table>
                            </div>
                                @endif 
                            </div>


                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@section('script') @endsection @endsection
