

<html>
    <head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
<body>
<form action="{{route('storeuser')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        @if($errors->has('name'))
                        <div class="error" style="color: red;">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Enter name">
                        @if($errors->has('mobile'))
                        <div class="error" style="color: red;">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                                <label><strong>Hobbies :</strong></label><br>
                                <label><input type="checkbox" name="hobbies[]" value="swiming" >swiming</label>
                                <label><input type="checkbox" name="hobbies[]"  value="reading books"> Readings books</label>
                                <label><input type="checkbox" name="hobbies[]"  value="horroe movies">horror movies </label>
                            </div>  
                            <div class="form-group">
                                <label><strong>gender :</strong></label><br>
                                <label><input type="radio" name="gender" value="male">male</label>
                                <label><input type="radio" name="gender" value="female"> female</label>
                               
                            </div>  
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">status</label>
                        <input type="text" name="status" class="form-control" placeholder="Enter name">
                      
                    </div>
                   
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter name">
                      
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">image</label>
                        <input type="file" id="myFile" name="image">

                      
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        @if($errors->has('email'))
                        <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                 
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @if($errors->has('password'))
                        <div class="error" style="color: red;">{{ $errors->first('password') }}</div>
                        @endif
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
</body>
</html>