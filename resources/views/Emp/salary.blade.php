<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Employee Salary</h2>
  <h3>Assign salary to :{{$emp->empName}}</h3>
  <form action="{{route('salarystore')}}" method="post">
   
    <div class="form-group">
      <label for="">Salary:</label>
      @csrf
      <input type="text" class="form-control" id="" placeholder="Enter salary" name="salary">
    </div>
    <div class="form-group">
        <label for="">Description:</label>
        <input type="text" class="form-control" id="" placeholder="Enter salary" name="description">
        <input type="hidden" value="{{$emp->empId}}" name="empid">
      </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
