<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add participant type form</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
 
<div class="container mt-2">
   
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add participant type</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('participantTypes.index') }}"> Back</a>
        </div>
    </div>
</div>
    
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
    
<form action="{{ route('participantTypes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Participant type name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Participant type name">
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Minimum members in team:</strong>
                 <input type="number" name="min" class="form-control" placeholder="Min. ( >= 0 )">
                @error('min')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Maximum members in team:</strong>
                 <input type="number" name="max" class="form-control" placeholder="Max. ( >= 0 )">
                @error('max')
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
 
</body>
</html>