@extends('layouts.user')

@section('content')
<div class="main-ws-sec">
    <div class="post-topbar">
        <div>
            <input type="text" name="searchown" id="searchown" placeholder="Search for members" class="form-control">
        </div>
    </div>

    @if(count($members)>0) <div class="add-billing-method">
        <h3>Add Memebers to the {{$ownteam->name}}</h3>
        <div class="payment_methods">
            <table class="table table-hover">
                @foreach($members as $member)
                <tr>
                    <th scope="col">{{$member->member->full_name}}</th>
                    <th scope="col">{{$member->member->email}}</th>
                    <th scope="col"> <a href="{{route('Userwall.index', ['id'=>$member->member->id])}}">
                            View
                        </a></th>
                </tr>
                @endforeach

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('AddTeamMembers.store') }}" enctype="multipart/form-data" id="addform">
        @csrf
        <input type="hidden" name="teamid" id="teamid" value="{{$ownteam->id}}">
        <input type="hidden" name="memberid" id="memberid">
        <input type="hidden" name="name" id="name">
    </form>





</div>
<!--main-ws-sec end-->






@section('script')
$(document).ready(function(){

$(document).on('keyup', '#searchown', function(){
var query = $(this).val();
if(query==""){
$("tbody").empty();
}else{
fetch_owntask_data(query);
}
});

function fetch_owntask_data(query = '')
{
$.ajax({
url:"{{ route('OwnSearch.action') }}",
method:'GET',
data:{query:query},
dataType:'json',
success:function(data)
{
console.log(data);
$('tbody').html(data.table_data);
}
})
}


$(document).on("click", ".Mmember", function (evt) {
evt.preventDefault();
$("#name").val($(this).data("name"));
$("#memberid").val($(this).data("memberid"));
$("#addform").submit();
});



});




@endsection
@endsection
