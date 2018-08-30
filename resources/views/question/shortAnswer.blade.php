@extends('Layouts.app')



@section('content')
<body>
    
         <h1> ShortAnswerQuestion</h1>
   
    <div class="container">
        <div class="row">
        <br>
            <form action="{{route('shortAnswer.file')}}" method = "post"class="form-horizontal" enctype="multipart/form-data"> 
                {{csrf_field()}}
            
                <input type="file" name ="fileName[]" multiple>
                
                <div class="form-group">
            {{Form::label('Type', 'Type')}}
            {{Form::text('Type', 'Shortanswer')}}
            </div>  
                <div class="form-group">
            {{Form::label('number', 'number')}}
            {{Form::text('number', '',['class'=>'form-control','placeholder'=> 'Enter Number Question'])}}
            </div>   
                <div class="form-group">
            {{Form::label('name', 'solution')}}
            {{Form::text('name', '',['class'=>'form-control','placeholder'=> 'enter solution'])}}
        </div>
        <div class="form-group">
            {{Form::label('question', 'question')}}
            {{Form::textarea('question', '',['class'=>'form-control','placeholder'=> 'Enter Question'])}}
        </div>
        <div class="form-group">
            {{Form::label('score', 'score')}}
            {{Form::text('score', '',['placeholder'=> 'enter Score'])}}
        </div>
        <input type="submit" class = "btn btn-info">
        </form>
        </div>
           
    </div>
</body>
@endsection
</html>



   
