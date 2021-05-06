<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<h1>Employee List</h1>
<a href="employees">Add Employee</a>
<table border="1">
	<tr>
       <td>ID</td><td>Employee Name</td><td>Avtar</td><td>Employee Address</td><td>Company Name</td><td>Exp</td><td>Action</td>
	</tr>
	@foreach($emplist as $emplist)
	   <tr>
	   	<td>{{$emplist->id}}</td>
	   	<td>{{$emplist->name}}</td>
        <td><img src="{{ asset('storage/app/public/uploads/'.$emplist->file_name)}}" width="50px" height="50px;"></td>
        <td>{{$emplist->address}}</td>
        <td>{{$emplist->CompanyName}}</td>
        <td><?php
        	$date1= $emplist->join_date;
        	$date2= $emplist->end_date;
            $origin = new DateTime($date1);
            $target = new DateTime($date2);
            $interval = $origin->diff($target);
            echo $interval->format('%y Years, %m Months');
        	?></td>
        <td><a href="editdata/{{$emplist->id}}">Edit </a> | <a class="delete" data-id="{{ $emplist->id }}" id="d_{{$emplist->id}}"  href="javascript:void(0);">Delete</a></td>
	   </tr>
	@endforeach
</table>
<script type="text/javascript">
	$(document).ready(function(){
         $(".delete").click(function(){
         	 var answer = confirm('Are you sure you want to delete this?');
            if(answer==true){
              var id = $(this).data("id");
              //alert(id);return false;
             // var token = $("meta[name='csrf-token']").attr("content");

              $.ajax({
        				url: "deletedata/"+id,
        				type: 'get',
        				data: {
            				"id": id,
            				//"_token": token,
        				},
        				success: function (){
            				location.reload();
        				}
    			});
            }              
         });		
	});
</script>