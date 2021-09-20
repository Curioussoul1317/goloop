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
                        <i class="fas fa-users"></i>private_policy 
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-lg-12">                           
                            <form action="{{route('TermsandCondition.update')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                            {{ csrf_field() }} 
                                            
  <div class="row">
      <div class="col">
      <div class="card border-primary " >
  <div class="card-header">Header</div> 
  <div class="card-body text-primary">
  <div class="form-group">
    <textarea name="tandc" rows="15" placeholder="Policy" class="form-control" style="width:100%"> {{$terms_and_conditions->tandc}}</textarea>
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
