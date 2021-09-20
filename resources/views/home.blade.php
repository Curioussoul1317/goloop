@extends('layouts.user')

@section('content')
<div class="main-ws-sec">
    <!--post-topbar end-->
    <div class="posts-section">
        @if(count($products)>0)
        <div class="top-profiles">
            <div class="post-topbar">
                <h3>Top Products</h3>
            </div>
            <div class="profiles-slider">
                @foreach($products as $product)
                <div class="user-profy">
                    <img src="{{ asset('/storage/Products/'.$product->img) }}" width="57" height="57">
                    <h3>{{$product->name}}</h3>
                    <span>{{$product->gender}} </span>
                    <a href="{{route('Product.show', ['id'=>$product->id])}}" title="">View Product</a>
                </div>
                <!--user-profy end-->
                @endforeach
            </div>
            <!--profiles-slider end-->
        </div>
        <!--top-profiles end-->
        @else
        @endif



        @if(count($posts)>0)
        @foreach($posts as $post)
        <!-- events   -->
        @if ($post->event_id !="")
        <div class="posty">
            <div class="post-bar no-margin">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                        <div class="usy-name">
                            <h3>Go Loop Events</h3>
                            <span><img src="{{ asset('defaultimg/clock.png') }}" alt="">on {{$post->created_at}}</span>
                        </div>
                    </div>
                </div>
                <div class="job_descp">
                    <h3>{{$post->event->name}}</h3>
                    <ul class="job-dt">
                        <li><a href="#" title="">Starting on</a><span>{{$post->event->start_date}}</span></li>
                        <li><a href="#" title="">Ends on</a><span> {{$post->event->end_date}}</span></li>
                    </ul>
                    <p> {{$post->event->description}}</p>
                    <img src="{{ asset('/storage/Event/'.$post->event->event_img) }}" class="img-fluid" width="100%">
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <form method="POST" action="{{ route('UserLikes.store') }}">
                                @csrf
                                <input type="hidden" name="postid" value="{{$post->id}}">
                                @if(isset($post->like))
                                @if(count($post->like)>0)
                                <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: red;"></i></button> {{count($post->like)}}
                                @else
                                <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: #b2b2b2;"></i></button>
                                @endif
                                @endif
                            </form>
                        </li>
                    </ul>
                    <a data-toggle="collapse" href="#{{$post->id}}" role="button" aria-expanded="false" aria-controls="collapseComment">
                        View
                    </a>

                </div>
            </div>
        </div>
        <!-- Products  -->
        @elseif ($post->products_id !="")
        <div class="posty">
            <div class="post-bar no-margin">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                        <div class="usy-name">
                            <h3>Go Loop Products</h3>
                            <span><img src="{{ asset('defaultimg/clock.png') }}" alt="">on {{$post->created_at}}</span>
                        </div>
                    </div>
                </div>
                <div class="job_descp">
                    <h3>{{$post->product->name}}</h3>
                    <p> {{$post->product->description}}</p>
                    <img src="{{ asset('/storage/Products/'.$post->product->img) }}" class="img-fluid" width="100%">
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <form method="POST" action="{{ route('UserLikes.store') }}">
                                @csrf
                                <input type="hidden" name="postid" value="{{$post->id}}">
                                @if(isset($post->like))
                                @if(count($post->like)>0)
                                <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: red;"></i></button> {{count($post->like)}}
                                @else
                                <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: #b2b2b2;"></i></button>
                                @endif
                                @endif
                            </form>
                        </li>
                    </ul>
                    <a data-toggle="collapse" href="#{{$post->id}}" role="button" aria-expanded="false" aria-controls="collapseComment">
                        Comment
                    </a>

                </div>
            </div>
        </div>
        <!-- cat events  -->
        @else
        <div class="posty">
            <div class="post-bar no-margin">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                        <div class="usy-name">
                            <h3>Go Loop Products</h3>
                            <span><img src="{{ asset('defaultimg/clock.png') }}" alt="">on {{$post->created_at}}</span>
                        </div>
                    </div>
                </div>
                <div class="job_descp">
                    <ul class="job-dt">
                        <li><a href="#" title="">Starting on</a><span>{{$post->cat_event->start_date}}</span></li>
                        <li><a href="#" title="">Ends on</a><span> {{$post->cat_event->end_date}}</span></li>
                        <li><a href="#" title="">Apply before</a><span> {{$post->cat_event->apply_before}}</span></li>
                    </ul>
                    <div class="epi-sec">
                        <ul class="descp">
                            #<li><span>{{$post->cat_event->category}}</span></li>
                        </ul>
                    </div>
                    <h3>{{$post->cat_event->name}}</h3>
                    <p> {{$post->cat_event->description}}</p>
                    <img src="{{ asset('/storage/EventCat/'.$post->cat_event->catog_event_img) }}" class="img-fluid" width="100%">
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <form method="POST" action="{{ route('UserLikes.store') }}">
                                @csrf
                                <input type="hidden" name="postid" value="{{$post->id}}">
                                @if(isset($post->like))
                                @if(count($post->like)>0)
                                <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: red;"></i></button> {{count($post->like)}}
                                @else
                                <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: #b2b2b2;"></i></button>
                                @endif
                                @endif
                            </form>
                        </li>
                    </ul>
                    <a data-toggle="collapse" href="#{{$post->id}}" role="button" aria-expanded="false" aria-controls="collapseComment">
                        Comment
                    </a>

                </div>
            </div>
        </div>
        @endif

        @endforeach
        @else
        @endif


        <!--
        <nav aria-label="Page navigation example" class="full-pagi">

            <ul class="pagination">

                <li class="page-item"><a class="page-link pvr" href="#">Previous</a></li>
												<li class="page-item"><a class="page-link active" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item"><a class="page-link" href="#">3</a></li>
												<li class="page-item"><a class="page-link" href="#">4</a></li>
												<li class="page-item"><a class="page-link" href="#">5</a></li>
												<li class="page-item"><a class="page-link" href="#">6</a></li>
												<li class="page-item"><a class="page-link pvr" href="#">Next</a></li>
            </ul>
        </nav> -->


    </div>
    <!--posts-section end-->

</div>
<!--main-ws-sec end-->




<!-- modal delete Comment-->
<div class="modal fade" id="Commentdeletemodal" tabindex="-1" role="dialog" aria-labelledby="CommentdeletemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="CommentdeletemodalLabel">Confirm deletion</h4>
                <form action="{{route('UserComment.destroy')}}" method="POST" id="Commentdeleteform" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end modal delete Comment -->
<!-- modal delete Post-->
<div class="modal fade" id="Postdeletemodal" tabindex="-1" role="dialog" aria-labelledby="PostdeletemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="PostdeletemodalLabel">Confirm deletion</h4>
                <form action="{{route('UserPost.destroy')}}" method="POST" id="Postdeleteform" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end modal delete Post -->

@section('script')
$('#Commentdeletemodal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
var val1 = button.data('id')
console.log(val1);
var modal = $(this)
modal.find('.modal-body #id').val(val1)
})

$('#Postdeletemodal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
var val1 = button.data('id')
console.log(val1);
var modal = $(this)
modal.find('.modal-body #id').val(val1)
})
@endsection

@endsection
