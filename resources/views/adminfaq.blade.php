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
                                               



                                                @if(count($faqs)>0)
                                                @foreach($faqs as $faq)
                                                <form action="{{route('AdminFaq.update')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$faq->id}}">
                                                    <div class="row"> 
                                                    <div class="col col-12"> 
                                                    <h5>{{$faq->questions}} </h5>
                                                        </div>
                                                        <div class="col col-12"> 
                                                        <textarea name="answers" rows="15" placeholder="Answer" class="form-control" style="width:100%"> {{$faq->answers}}</textarea>
                                                        </div>  
                                                       
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Update
                                                </button>
                                                </form>
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