
@extends('admin.layout.admin')

@section('title', 'All Users')

@section('pageTitle', 'All Users')

@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" id="search" name="table_search" class="form-control float-right" placeholder="Search" onkeyup="up()">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-hover">

                  <tr>
                    <th>Photo</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Rights</th>
                    <th>Birth Date</th>
                    <th>Actions</th>
                  </tr>

                  @foreach($users as $user)
                    <tr>
                        <td><img src="{{ asset($user->photo['path']) }}" alt="{{ $user->photo['name'] }}" width="70" height="70"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->isAdmin  ? 'Admin' : 'Editor'}}</td>
                        <td>{{ $user->birthDate }}</td>
                        <td>
                          
                          <a href="{{ route('users.show',$user->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-info-circle"></i></a>
                            
                          @if(Auth::user()->isAdmin)

                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
    
                            {!! Form::open(['method' => 'DELETE', 
                                            'route' => ['users.destroy', $user->id] ,
                                            'style' => 'display:inline',
                                            'onsubmit' => "return confirm('Are you Sure?')" ]) !!}

                              {{ Form::button('<i class="fa fa-trash-alt"></i>', 
                                                ['type' => 'submit', 
                                                'class' => 'btn btn-outline-danger btn-sm'] )  }}

                            {!! Form::close() !!}
                            
                            @endif
                        </td>
                    </tr>
                  @endforeach

                </table>
              </div>

            </div>

          <div class="pagination justify-content-center">
            <?php echo $users->render(); ?>
          </div>

        </div>
    </div>

</section>


@endsection


