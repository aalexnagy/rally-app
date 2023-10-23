<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Participant Form</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
 
<div class="container mt-2">
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="row d-xlex justify-content-between">
                <div class="pull-left">
                    <h2>Edit participant</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('participants.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>
    </div>
    
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
    <form action="{{ route('participants.update',$participant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Participant Name:</strong>
                    <input type="text" name="name" value="{{ $participant->name }}" class="form-control" placeholder="Participant name">
                    @error('name')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Participant Surname:</strong>
                     <input type="text" name="surname" class="form-control" placeholder="Participant Email" value="{{ $participant->surname }}">
                    @error('surname')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Participant Types:</strong>
                    <!-- <input type="text" name="id_type" value="{{ $participant->id_type }}" class="form-control" placeholder="Participant Type"> -->
                    
                    <select name="id_type" class="form-control" placeholder="Select participant type">
                        @foreach ($participantTypes as $participantType)
                            @if($participant->id_type === $participantType->id)
                                <option selected value="{{ $participantType->id }}">{{ $participantType->name }}</option>
                            @else
                                <option value="{{ $participantType->id }}">{{ $participantType->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('id_type')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
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