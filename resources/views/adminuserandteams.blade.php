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
                        <i class="fas fa-users"></i>
                        @if(isset($Users))
                        Users
                        @else 
                        teams
                        @endif
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title"> 
                                @if(isset($Users))
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
                                    <tbody>@if(count($Users)>0) @foreach($Users as $User) <tr>
                                            <th scope="row"> {{ $User->full_name}}
                                            </th>
                                            <td>
                                            {{$User->email}}
                                            </td>
                                            <td>
                                            {{$User->phone}}  
                                            </td>
                                            <td>
                                            {{$User->gender}}
                                            </td>
                                            <td> 
                                            {{ $User->created_at}} 
                                            </td>
                                            <td>
                                                <div class="btn-group pull-right" role="group">
       <a class="btn btn-primary btn-sm " href="{{route('Adminteamanduser.show', ['id'=>$User->id, 'type'=>1])}}"><i class="fa fa-eye"></i></a>
                                                </div>

                                            </td>
                                        </tr>@endforeach @endif </tbody>
                                </table>
                            </div>
                                 @elseif(isset($Teams))
                                <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Team</th>
                                            <th scope="col">Owner</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Created On</th> 
                                            <th scope="col" class=""></th>
                                        </tr>
                                    </thead>
                                    <tbody>@if(count($Teams)>0) @foreach($Teams as $team) <tr>
                                            <th scope="row"> {{$team->name}}
                                            </th>
                                            <td>
                                            {{$team->user->full_name}}
                                            </td>
                                            <td>
                                            {{$team->status}}
                                            </td> 
                                            <td> 
                                            {{ $team->created_at}} 
                                            </td>
                                            <td>
                                                <div class="btn-group pull-right" role="group">
       <a class="btn btn-primary btn-sm " href="{{route('Adminteamanduser.show', ['id'=>$team->id, 'type'=>2])}}"><i class="fa fa-eye"></i></a>
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
</section>@section('script') @endsection @endsection
