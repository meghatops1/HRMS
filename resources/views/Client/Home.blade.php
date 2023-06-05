<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
</style>
<script>
   
</script>
</head>
<body>

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="" target="__blank">Profile</a>
            <a class="nav-link" href="#account" target="#account">Billing</a>
            <a class="nav-link" href="#account" target="__blank">Security</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row" id="profile" >
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <form action="{{route('Emp.update',$emp->empId)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        {{$imagename=$image->imgname ?? ""}}
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('/empimages/'.$imagename )}}" alt="">
                        <!-- Profile picture help block-->
                        
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" name="img">
                    </div>
                </form>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Personal Details</div>
                    <div class="card-body">
                       
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{$emp->empName}}" name="empname">
                            </div>
                         
                         
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{$emp->email}}" name="empemail">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Username" value="{{$emp->username}}" name="username">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="password"  placeholder="" value="{{$emp->password}}" name="pass">
                                </div>
                            </div>
                            <input type="hidden" name="empid" value="{{$emp->empId}}">
                            <input type="hidden" name="imghidden" value="{{$image->imgname ?? ""}}">
                            <!-- Save changes button-->
                            <input type="submit" value="Update" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="account" >
          
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header"><h1>Account Details</h1></div>
                    <form method="POST" action="{{route('clientaccount')}}">
                        @csrf
                    <div class="card-body">
                        
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Account No</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="" value="" name="accno">
                            </div>
                         
                         
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">IFSC Code</label>
                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="" value="" name="ifsccode">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Branch Name</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="" value="" name="branchname">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Account Name</label>
                                    <input class="form-control" id="inputBirthday" type="text"  placeholder="" value="" name="aname">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Account Type</label>
                                    <input class="form-control" id="inputBirthday" type="text"  placeholder="" value="" name="atype">
                                </div>
                            </div>
                            <input type="hidden" name="empid" value="{{$emp->empId}}">
                           
                            <!-- Save changes button-->
                            <input type="submit" value="Update" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
