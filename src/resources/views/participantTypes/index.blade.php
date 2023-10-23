<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rally participants type</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
 
<div class="container mt-2">
 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Participant types overview</h2>
            </div>
            <div class="row d-xlex justify-content-between">
                <div class="pull-right mb-2 mr-2">
                    <a class="btn btn-success" href="{{ route('participantTypes.create') }}">Add participant type</a>
                </div>
                <div class="row d-xlex justify-content-end">
                    <div class="pull-right mb-2 mr-2">
                        <a class="btn btn-info" href="{{ route('teams.index') }}">Teams</a>
                    </div>
                    <div class="pull-right mb-2 mr-2">
                        <a class="btn btn-info" href="{{ route('participants.index') }}" enctype="multipart/form-data">Participants</a>
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
            <th>Participant type name</th>
            <th>Minimum members in team</th>
            <th>Maximum members in team</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($participantTypes as $participantType)
        <tr>
            <td>{{ $participantType->name }}</td>
            <td>{{ $participantType->min }}</td>
            <td>{{ $participantType->max }}</td>
            <td>
                <form action="{{ route('participantTypes.destroy',$participantType->id) }}" method="Post">
     
                    <a class="btn btn-primary" href="{{ route('participantTypes.edit',$participantType->id) }}">Edit</a>
    
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