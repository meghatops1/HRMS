
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
  <h2>Employee Table</h2>
            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($empData as $key)
        <tr>
            <td>{{$key->empName}}</td>
            <td>{{$key->email}}</td>
            <td><a href="{{route('salaryadd',$key->empId)}}" class="btn btn-primary">Salary Add</a></td>
            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btn_{{$key->empId}}">View Salary</button>

            </td>
          </tr>
        @endforeach
     
      
    </tbody>
  </table>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employee Salary Details</h4>
        </div>
        <div class="modal-body" id="center">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <script>
      $("button").click(function(){
        $.ajax({
          url:"{{route('getsalary')}}",
          method:"GET",
          data:{id:this.id},
          success:function(data){
            salary=JSON.parse(data);
            str=`<p>Salary = ${salary.salary}</p>
            <p>Salary = ${salary.description}</p>
            `;
            document.getElementById('center').innerHTML=str;
          }
        })
      })
  </script>
</body>
</html>
