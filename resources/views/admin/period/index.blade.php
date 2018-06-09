
@extends('admin.layout.admin')

@section('title', 'All Periods')

@section('pageTitle', 'All Periods')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Periods</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-hover">

                  <tr>
                    <th>Period</th>
                    <th>Detail</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                  </tr>

                  @foreach($periods as $period)
                    <tr>
                        <td>{{ $period->name }}</td>
                        <td>{{ str_limit($period->detail,100) }}</td>
                        <td>{{ $period->startDate }}</td>
                        <td>{{ $period->endDate }}</td>
                        <td>
                          <a href="{{ route('period.show',$period->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-info-circle"></i></a>
                            
                          <a href="{{ route('period.edit',$period->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
    
                            {!! Form::open(['method' => 'DELETE', 
                                            'route' => ['period.destroy', $period->id] ,
                                            'style' => 'display:inline',
                                            'onsubmit' => "return confirm('Are you Sure?')" ]) !!}

                              {{ Form::button('<i class="fa fa-trash-alt"></i>', 
                                                ['type' => 'submit', 
                                                'class' => 'btn btn-outline-danger btn-sm'] )  }}

                            {!! Form::close() !!}

                        </td>
                    </tr>
                  @endforeach

                </table>
              </div>

            </div>

          <div class="pagination justify-content-center">
            <?php echo $periods->render(); ?>
          </div>

        </div>
    </div>

</section>

@endsection


