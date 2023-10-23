<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Team</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
 
<div class="container mt-2">
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Team</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teams.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
    <form action="{{ route('teams.update',$team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Team Name:</strong>
                    <input type="text" name="name" value="{{ $team->name }}" class="form-control" placeholder="Participant name">
                    @error('name')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @foreach ($participantTypes as $participantType)
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{$participantType->name}}:</strong>
                            <select name="{{$participantType->name}}" class="form-control" multiple>
                                    @foreach ($participants as $participant)
                                        @if($participant->id_type === $participantType->id)
                                                <option selected value="{{ $participant->id }}">{{ $participant->name }}</option>
                                        @endif
                                    @endforeach
                            </select>
                            @error('id_type')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
            @endforeach
            <div class="col-lg-12">
                <div class="row d-xlex justify-content-end">
                    <button type="submit" class="btn btn-success ml-3">Submit</button>
                </div>
            </div>
           
        </div>
    
    </form>
</div>
 
</body>
</html>