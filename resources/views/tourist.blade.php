<html>
<head>
	<title>This is Employee Form</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>  
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="{{ asset('js/bootstrap-datetimepicker.min.js') }}" rel="stylesheet">
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
<style type="text/css">
.error{
 color: red;
} 
</style>
</head>
<div class="container">
  <!-- {{$errors}} -->
<form name="emp" id="emp" method="post" action="touristpost" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
    	<label for="exampleInputEmail1">Enter Name</label>
    	<input type="text" name="emp_name" id="emp_name" placeholder="Enter Name" value="{{old('emp_name')}}" class="form-control">
      <span class="error">@error('emp_name'){{$message}}@enderror</span>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Enter Address/Email</label>
         <input type="text" name="emp_address" id="emp_address" placeholder="Address" value="{{old('emp_address')}}" class="form-control">
         <span class="error">@error('emp_address'){{$message}}@enderror</span>
  </div>
   
   <div class="form-group">
		<label for="exampleInputEmail1">Enter Date</label>         
         <input class="datepicker  form-control" name="join_date" value="{{old('join_date')}}" data-date-format="dd-mm-yyyy" placeholder="Select Date">
         <span class="error">@error('join_date'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Reliving Date</label>         
         <input class="datepicker  form-control" name="end_date" value="{{old('end_date')}}" data-date-format="dd-mm-yyyy" placeholder="Select Date">
         <span class="error">@error('end_date'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
		<label for="exampleInputEmail1">Enter File</label>
         <input type="file" name="emp_photo" id="emp_photo" placeholder="emp_photo" class="form-control">
         <span class="error">@error('emp_photo'){{$message}}@enderror</span>
  </div>

   <button type="submit" class="btn btn-primary">Submit</buttton>
</form>
</div>  
<script type="text/javascript">	
	$('.datepicker').datepicker();
</script>
</html>