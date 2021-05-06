<form name="emp" id="emp" method="post" action="/update">
	<input type="hidden" name="id" id="emp_id"  value="{{$emplist->id}}">
	@csrf
   <input type="text" name="emp_name" id="emp_name" value="{{$emplist->name}}"><br><br>
   <input type="text" name="emp_address" id="emp_address"  value="{{$emplist->address}}"><br><br>
   <button type="submit">Submit</buttton>
</form>