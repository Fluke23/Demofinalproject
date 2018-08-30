@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <h2 >Question Manager</h2>
        </div>
            <div class="col-md-6">    
                <div class="btn-group float-right">
                 <button type="button" class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Add Question
                 </button>
            <div class="dropdown-menu">
                <a class="dropdown-item"  
                        href="{{ URL::to('/question/blankQuestion/{id?}')}}">BlankQuestion</a>
                <a class="dropdown-item"  
                        href="{{ URL::to('/question/shortAnswer/{id?}')}}">shortAnswer</a>
                <a class="dropdown-item" 
                        href="{{ URL::to('/question/UploadQuestion/{id?}')}}">UploadQuestion</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">TrueFalse</a>
            </div>
      </div>           
  </div>


<div class="row">
        <table class="table table-bordered">
            <tr>
                <th style="font-size: 1em;">Question</th>
                <!-- <th>Description</th> -->
                <!-- <th>Date</th> -->
                <th style="width:50px;">Score</th>
                <th style="width:50px;">Tester</th>
                <th style="width:50px;">min</th>
                <th style="width:50px;">max</th>
                <th style="width:50px;">Avg</th>
                <th></th>
                

            </tr>

            <tbody>
                    @foreach($question as $que)
                <tr>
                        <td style="font-size: 0.8em;">{{$que->question}}</td>
                        <td style="font-size: 0.8em;">{{$que->Score}}</td>
                        <td style="font-size: 0.8em;">{{$que->quiz_date}}</td>
                        <td style="font-size: 0.8em;">{{$que->subject_id}}</td>
                        {{-- name is from group_name --}}
                        <td style="font-size: 0.8em;">{{$que->group_name}}</td>
                        <td style="font-size: 0.8em;">{{$que->type_name}}</td>  
                        <td style="font-size: 0.8em;">{{$que->status_name}}</td>
                        
                    

                        <td >
                            <a href="{{URL::to('/question/'.$que->questions_id)}}" class="btn btn-info ">View</a>
                            <a href="{{ URL::to('question/editQuestion/'.$que->questions_id) }}" class="btn btn-warning ">Edit</a>
                            <!-- <a href="{{ URL::to('question/deleteQuiz/'.$que->quizs_id.'/'.$q->subject_id)}}" class="btn btn-danger">Delete</a> -->
                        </td>
                </tr>
                     @endforeach
            </tbody>
 
        </table>
        
         
         <hr>
    </div>
               
    </div>
    
<!-- modal blank Question 
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <a href="{{ URL::to('multipleChoice/addMultipleChoice')}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>
-->

</div>

@endsection
