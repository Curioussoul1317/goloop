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
                        <i class="fas fa-list-ol"></i>Event categories
                    </h3>
                    <button class="au-btn-plus" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="au-chat-info">
                                @if(isset($eventscategory))
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">Edit {{$eventscategory->name}} Event categories</div>
                                        <div class="card-body">
                                            <form action="{{route('AdminEventCategory.update')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="catog_img" value="{{$eventscategory->catog_event_img}}">
                                                <input type="hidden" name="medal_img" value="{{$eventscategory->medal_img}}">
                                                <input type="hidden" name="bib_img" value="{{$eventscategory->bib_img}}">
                                                <input type="hidden" id="id" name="id" value="{{$eventscategory->id}}">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="cc-exp" class="control-label mb-1">Name</label>
                                                                    <input type="text" name="name" placeholder="Name" value="{{$eventscategory->name}}" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="x_card_code" class="control-label mb-1">Events</label>
                                                                <div class="input-group">
                                                                    <select name="events" id="events" class="form-control">
                                                                        @if(isset($events))
                                                                        @if(count($events)>0)
                                                                        @foreach($events as $event)
                                                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                                                        @endforeach
                                                                        @else
                                                                        @endif
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="x_card_code" class="control-label mb-1">Status</label>
                                                                <div class="input-group">
                                                                    <select name="status" id="status" class="form-control">
                                                                        @if($eventscategory->catog_event_state =="OnHold")
                                                                        <option value="OnHold">On Hold</option>
                                                                        <option value="Active">Active</option>
                                                                        @else
                                                                        <option value="Active">Active</option>
                                                                        <option value="OnHold">On Hold</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="cc-exp" class="control-label mb-1">Start</label>
                                                                    <input type="date" id="start_date" name="start" placeholder="start_date" value="{{$eventscategory->start_date}}" required class=" form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="x_card_code" class="control-label mb-1">End</label>
                                                                <div class="input-group">
                                                                    <input type="date" id="end_date" name="end" placeholder="end_date" required value="{{$eventscategory->end_date}}" class=" form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="x_card_code" class="control-label mb-1">Apply Before</label>
                                                                <div class="input-group">
                                                                    <input type="date" id="applybefore" name="applybefore" placeholder="Apply Before" value="{{$eventscategory->apply_before}}" required class=" form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="cc-exp" class="control-label mb-1">Price</label>
                                                                    <input type="number" id="price" name="price" placeholder="price" value="{{$eventscategory->price}}" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="cc-exp" class="control-label mb-1">Category</label>
                                                                <select name="category" id="category" class="form-control">
                                                                    @if($eventscategory->category =="Individual")
                                                                    <option value="Individual">Individual</option>
                                                                    <option value="Team">Team</option>
                                                                    @else
                                                                    <option value="Team">Team</option>
                                                                    <option value="Individual">Individual</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="x_card_code" class="control-label mb-1">Km</label>
                                                                <div class="input-group">
                                                                    <input type="number" id="km" name="km" placeholder="km" value="{{$eventscategory->km}}" required class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <h5 class="modal-title"> <strong>category Image</strong> </h5>
                                                                    <style>
                                                                        #file-input {
                                                                            display: none;
                                                                        }
                                                                    </style>
                                                                    <div class="image-uploadcategory">
                                                                        <label for="file-input">
                                                                            <img src="{{ asset('/storage/EventCat/'.$eventscategory->catog_event_img)}}" id="categoryoutput" />
                                                                        </label>
                                                                        <input id="file-input" type="file" onchange="categoryloadFile(event)" name="categoryUploadedFile" />
                                                                    </div>
                                                                    <script>
                                                                        var categoryloadFile = function(event) {
                                                                            var categoryoutput = document.getElementById('categoryoutput');
                                                                            categoryoutput.src = URL.createObjectURL(event.target.files[0]);
                                                                            categoryoutput.onload = function() {
                                                                                URL.revokeObjectURL(categoryoutput.src) // free memory
                                                                            }
                                                                        };
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <h5 class="modal-title"> <strong>Medal Image</strong> </h5>
                                                                    <style>
                                                                        #medalfile-input {
                                                                            display: none;
                                                                        }
                                                                    </style>
                                                                    <div class="image-uploadmedal">
                                                                        <label for="medalfile-input">
                                                                            <img src="{{ asset('/storage/Medal/'.$eventscategory->medal_img)}}" id="medaloutput" />
                                                                        </label>
                                                                        <input id="medalfile-input" type="file" onchange="medalloadFile(event)" name="medalUploadedFile" />
                                                                    </div>
                                                                    <script>
                                                                        var medalloadFile = function(event) {
                                                                            var medaloutput = document.getElementById('medaloutput');
                                                                            medaloutput.src = URL.createObjectURL(event.target.files[0]);
                                                                            medaloutput.onload = function() {
                                                                                URL.revokeObjectURL(medaloutput.src) // free memory
                                                                            }
                                                                        };
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <h5 class="modal-title"> <strong>Bib Image</strong> </h5>
                                                                    <style>
                                                                        #bibfile-input {
                                                                            display: none;
                                                                        }
                                                                    </style>
                                                                    <div class="image-uploadbib">
                                                                        <label for="bibfile-input">
                                                                            <img src="{{ asset('/storage/BibImage/'.$eventscategory->bib_img)}}" id="biboutput" />
                                                                        </label>
                                                                        <input id="bibfile-input" type="file" onchange="bibloadFile(event)" name="bibUploadedFile" />
                                                                    </div>
                                                                    <script>
                                                                        var bibloadFile = function(event) {
                                                                            var biboutput = document.getElementById('biboutput');
                                                                            biboutput.src = URL.createObjectURL(event.target.files[0]);
                                                                            biboutput.onload = function() {
                                                                                URL.revokeObjectURL(biboutput.src) // free memory
                                                                            }
                                                                        };
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">Update</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="collapse col-lg-12" id="collapseExample">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">New Event categories</div>
                                            <div class="card-body">
                                                <form action="{{route('AdminEventCategory.store')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="cc-exp" class="control-label mb-1">Name</label>
                                                                        <input type="text" name="name" placeholder="Name" required class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="x_card_code" class="control-label mb-1">Events</label>
                                                                    <div class="input-group">
                                                                        <select name="events" id="events" class="form-control">
                                                                            @if(isset($events))
                                                                            @if(count($events)>0)
                                                                            @foreach($events as $event)
                                                                            <option value="{{$event->id}}">{{$event->name}}</option>
                                                                            @endforeach
                                                                            @else
                                                                            @endif
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="x_card_code" class="control-label mb-1">Status</label>
                                                                    <div class="input-group">
                                                                        <select name="status" id="status" class="form-control">
                                                                            <option value="OnHold">On Hold</option>
                                                                            <option value="Active">Active</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="cc-exp" class="control-label mb-1">Start</label>
                                                                        <input type="date" id="start_date" name="start" placeholder="start_date" required class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="x_card_code" class="control-label mb-1">End</label>
                                                                    <div class="input-group">
                                                                        <input type="date" id="end_date" name="end" placeholder="end_date" required class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="x_card_code" class="control-label mb-1">Apply Before</label>
                                                                    <div class="input-group">
                                                                        <input type="date" id="applybefore" name="applybefore" placeholder="Apply Before" required class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="cc-exp" class="control-label mb-1">Price</label>
                                                                        <input type="number" id="price" name="price" placeholder="price" required class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="cc-exp" class="control-label mb-1">Category</label>
                                                                    <select name="category" id="category" class="form-control">
                                                                        <option value="Individual">Individual</option>
                                                                        <option value="Team">Team</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="x_card_code" class="control-label mb-1">Km</label>
                                                                    <div class="input-group">
                                                                        <input type="number" id="km" name="km" placeholder="km" required class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <h5 class="modal-title"> <strong>category Image</strong> </h5>
                                                                        <style>
                                                                            #file-input {
                                                                                display: none;
                                                                            }
                                                                        </style>
                                                                        <div class="image-uploadcategory">
                                                                            <label for="file-input">
                                                                                <img src="{{ asset('defaultimg/upload.png') }}" id="categoryoutput" />
                                                                            </label>
                                                                            <input id="file-input" type="file" onchange="categoryloadFile(event)" name="categoryUploadedFile" required />
                                                                        </div>
                                                                        <script>
                                                                            var categoryloadFile = function(event) {
                                                                                var categoryoutput = document.getElementById('categoryoutput');
                                                                                categoryoutput.src = URL.createObjectURL(event.target.files[0]);
                                                                                categoryoutput.onload = function() {
                                                                                    URL.revokeObjectURL(categoryoutput.src) // free memory
                                                                                }
                                                                            };
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <h5 class="modal-title"> <strong>Medal Image</strong> </h5>
                                                                        <style>
                                                                            #medalfile-input {
                                                                                display: none;
                                                                            }
                                                                        </style>
                                                                        <div class="image-uploadmedal">
                                                                            <label for="medalfile-input">
                                                                                <img src="{{ asset('defaultimg/upload.png') }}" id="medaloutput" />
                                                                            </label>
                                                                            <input id="medalfile-input" type="file" onchange="medalloadFile(event)" name="medalUploadedFile" required />
                                                                        </div>
                                                                        <script>
                                                                            var medalloadFile = function(event) {
                                                                                var medaloutput = document.getElementById('medaloutput');
                                                                                medaloutput.src = URL.createObjectURL(event.target.files[0]);
                                                                                medaloutput.onload = function() {
                                                                                    URL.revokeObjectURL(medaloutput.src) // free memory
                                                                                }
                                                                            };
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <h5 class="modal-title"> <strong>Bib Image</strong> </h5>
                                                                        <style>
                                                                            #bibfile-input {
                                                                                display: none;
                                                                            }
                                                                        </style>
                                                                        <div class="image-uploadbib">
                                                                            <label for="bibfile-input">
                                                                                <img src="{{ asset('defaultimg/upload.png') }}" id="biboutput" />
                                                                            </label>
                                                                            <input id="bibfile-input" type="file" onchange="bibloadFile(event)" name="bibUploadedFile" required />
                                                                        </div>
                                                                        <script>
                                                                            var bibloadFile = function(event) {
                                                                                var biboutput = document.getElementById('biboutput');
                                                                                biboutput.src = URL.createObjectURL(event.target.files[0]);
                                                                                biboutput.onload = function() {
                                                                                    URL.revokeObjectURL(biboutput.src) // free memory
                                                                                }
                                                                            };
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                            <span id="payment-button-amount">Create</span>
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>
                            <div class="col-md-12" style="margin-top:20px;">
                                <div class="row">
                                    @if(isset($eventscategories))
                                    @if(count($eventscategories)>0)
                                    @foreach($eventscategories as $eventscategory)
                                    <div class="card col-md-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$eventscategory->name}}</h5>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img class="card-img-top" src="{{ asset('/storage/EventCat/'.$eventscategory->catog_event_img)}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img class="card-img-top" src="{{ asset('/storage/Medal/'.$eventscategory->medal_img)}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img class="card-img-top" src="{{ asset('/storage/BibImage/'.$eventscategory->bib_img)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Event of</th>
                                                        <td>{{$eventscategory->event->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Category</th>
                                                        <td>{{$eventscategory->category}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Starting on </th>
                                                        <td>{{$eventscategory->start_date}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Ends on </th>
                                                        <td>{{$eventscategory->end_date}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Apply before </th>
                                                        <td>{{$eventscategory->apply_before}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">State </th>
                                                        <td class="process">{{$eventscategory->catog_event_state}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Fee </th>
                                                        <td>{{$eventscategory->price}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Km</th>
                                                        <td scope="row">{{$eventscategory->km}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a class="btn btn-danger" href="{{route('AdminEventCategory.show', ['id'=>$eventscategory->id])}}" style="width:100%">
                                                <i class="fa fa-edit"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @endif
                                    @endif

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
