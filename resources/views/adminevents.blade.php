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
                        <i class="fa fa-calendar"></i>Events
                    </h3>
                    <button class="au-btn-plus" type="button" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="false" aria-controls="collapseEvent">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-md-12" style="margin-top:20px;">
                                <div class="collapse" id="collapseEvent">
                                    <div class="card card-body">
                                        <form action="{{route('AdminEvents.store')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group" style="margin-right:10px;">
                                                        <label for="name" class="pr-1  form-control-label">Event Name</label>
                                                        <input type="text" name="name" placeholder="Event Name" required class="form-control">
                                                    </div>
                                                    <div class="form-group" style="margin-right:10px;">
                                                        <label for="start" class="px-1  form-control-label">Start date</label>
                                                        <input type="date" name="start" placeholder="start_date" required class="form-control">
                                                    </div>
                                                    <div class="form-group" style="margin-right:10px;">
                                                        <label for="end" class="px-1  form-control-label">End date</label>
                                                        <input type="date" name="end" placeholder="end_date" required class="form-control">
                                                    </div>
                                                    <div class="col-12 col-md-12" style="margin-top:10px; margin-bottom:10px;">
                                                        <textarea name="description" rows="2" placeholder="Description" class="form-control" style="width:100%"></textarea>
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
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <h5 class="modal-title" id="EventModalLabel"> <strong>Event Image</strong> </h5>
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
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Img</th>
                                                <th>name</th>
                                                <th>start_date</th>
                                                <th>end_date</th>
                                                <th>Event_state</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($events))
                                            @if(count($events)>0)
                                            @foreach($events as $event)
                                            <tr>
                                                <td>
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar avatar--small">
                                                            <img src="{{ asset('/storage/Event/'.$event->event_img)}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <th>{{$event->name}}</th>
                                                <td>{{$event->start_date}}</td>
                                                <td>{{$event->end_date}}</td>
                                                <td class="process">{{$event->event_state}}</td>
                                                <td><button type="button" data-toggle="modal" class="btn btn-danger" data-target="#editeventmodal" data-id="{{$event->id}}" data-name="{{$event->name}}" data-start="{{$event->start_date}}" data-end="{{$event->end_date}}" data-description="{{$event->description}}" data-img="{{$event->event_img}}" data-status="{{$event->event_state}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style=" text-align: left; background-color:#ecebeb;">{{$event->description}}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            @endif
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- modal large -->
<div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog" aria-labelledby="EventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EventModalLabel"> <strong>Edit</strong> Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{route('AdminEvents.update')}}" method="POST" enctype="multipart/form-data" class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" id="img" name="img">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group" style="margin-right:10px;">
                                        <label for="name" class="pr-1  form-control-label">Event Name</label>
                                        <input type="text" id="name" name="name" placeholder="Event Name" required class="form-control">
                                    </div>
                                    <div class="form-group" style="margin-right:10px;">
                                        <label for="start" class="px-1  form-control-label">Start date</label>
                                        <input type="date" id="start_date" name="start" placeholder="start_date" required class="form-control">
                                    </div>
                                    <div class="form-group" style="margin-right:10px;">
                                        <label for="end" class="px-1  form-control-label">End date</label>
                                        <input type="date" id="end_date" name="end" placeholder="end_date" required class="form-control">
                                    </div>
                                    <div class="form-group" style="margin-right:10px;">
                                        <select name="status" id="status" class="form-control">
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-12" style="margin-top:10px; margin-bottom:10px;">
                                        <textarea name="description" id="description" rows="2" rows="2" placeholder="Description" class="form-control" style="width:100%"></textarea>
                                    </div>
                                    <div class="card-footer" style="width:100%">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="modal-title"> <strong>Event Image</strong> </h5>
                                        <style>
                                            .image-uploadtwo>input {
                                                display: none;
                                            }
                                        </style>
                                        <div class="image-uploadtwo">
                                            <label for="file-inputtwo">
                                                <img src="{{ asset('defaultimg/upload.png') }}" id="outputtwo" />
                                            </label>
                                            <input id="file-inputtwo" type="file" onchange="loadFiletwo(event)" name="UploadedFile" />
                                        </div>
                                        <script>
                                            var loadFiletwo = function(event) {
                                                var output = document.getElementById('outputtwo');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal large -->
@section('script')
$('#editeventmodal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
var id = button.data('id')
var name = button.data('name')
var start = button.data('start')
var end = button.data('end')
var description = button.data('description')
var img = button.data('img')
var status = button.data('status')
var modal = $(this)
modal.find('.modal-body #id').val(id)
modal.find('.modal-body #name').val(name)
modal.find('.modal-body #start_date').val(start)
modal.find('.modal-body #end_date').val(end)
modal.find('.modal-body #description').val(description)
modal.find('.modal-body #img').val(img)
$("#status").append('<option value="'+status+'">'+status+'</option>'+
'<option value="Active">Active</option>');
})
@endsection
@endsection
