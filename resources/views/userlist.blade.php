<!DOCTYPE html>
<html>

<head>
    <title>userslist</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12">
            <div>
        <div class="mx-auto pull-right">
            <div class="">
               
            </div>
        </div>
    </div>
            </div>
           
        </div>

        <table class="table table-striped table-bordered  table-hover data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>mobile</th>
                    <th>gender</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody class="alldata" >

           
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->gender }}</td>

                    <!-- <td><button type="button" class="btn btn-primary">Delete</button> -->
                    <td>
                        <div class="delete-modal btn  btn-sm" data-id='{{$user->id}}' id="deletecategory1" name='.$user->name.'><i class="fa fa-trash" aria-hidden="true"></i> </div><a href="{{url('edituser/'. $user->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> </a><button type="button" class="btn btn-primary">view detail</button>
                    </td>

                    </td>
                </tr>
                <!---- delete model -------------->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ url('/delete') }}">
                                    <input type="hidden" name="userid" id="user_id" value="">
                                    @csrf
                                    <p>Are you Sure you want Delete this user?.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" value="" class="btn btn-info ">Confirm</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="3">There are no users.</td>
                </tr>
                @endforelse
            </tbody>
            <tbody id="Content" class="searchdata"></tbody>

        </table>

        <!-- 
        You can use Tailwind CSS Pagination as like here:
        {!! $users->withQueryString()->links() !!}        
    -->

        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>

    <script type="text/javascript">
        $(document).on("click", ".delete-modal", function(e) {
            var delete_id = $(this).data('id');
            $('#user_id').val(delete_id);
            $('#myModal').modal('show');
        });
    </script>


   
<script>
$(document).on( "", function(e) {
          
        });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>