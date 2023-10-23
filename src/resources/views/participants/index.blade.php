<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rally participants</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
 
<div class="container mt-2">
 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Participants</h2>
            </div>
            <div class="row d-xlex justify-content-between">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('participants.create') }}"> Create Participant</a>
                </div>
                <div class="row d-xlex justify-content-end">
                    <div class="pull-right mb-2 mr-2">
                        <a class="btn btn-info" href="{{ route('teams.index') }}" enctype="multipart/form-data">Teams</a>
                    </div>
                    <div class="pull-right mb-2 mr-2">
                        <a class="btn btn-info" href="{{ route('participantTypes.index') }}"> Participant types</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <!-- <th>S.No</th> -->
            <th>Participant Name</th>
            <th>Participant Surname</th>
            <th>Participant Id_type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($participants as $participant)
        <tr>
            <!-- <td>{{ $participant->id }}</td> -->
            <td>{{ $participant->name }}</td>
            <td>{{ $participant->surname }}</td>
            <td>
                @foreach ($participantTypes as $participantType)
                    @if($participant->id_type === $participantType->id)
                        {{ $participantType->name }}
                    @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('participants.destroy',$participant->id) }}" method="Post">
     
                    <a class="btn btn-primary" href="{{ route('participants.edit',$participant->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
       
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
 
</body>
</html>