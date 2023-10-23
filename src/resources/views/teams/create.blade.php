<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Team Form</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
 
<div class="container mt-2">
   
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="row d-xlex justify-content-between">
            <div class="pull-left">
                <h2>Add team</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('teams.index') }}"> Back</a>
            </div>
        </div>
    </div>
</div>
    
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
    
<form id="formAddTeam" action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Team Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Participant Name">
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        @foreach ($participantTypes as $participantType)
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{$participantType->name}}:</strong>
                        <select name="{{$participantType->name}}" class="form-control" multiple="multiple" min="{{$participantType->min}}" max="{{ $participantType->max}}">
                                @foreach ($participants as $participant)
                                    @if($participant->id_type === $participantType->id)
                                            <option selected value="{{ $participant->id }}">{{ $participant->name }} {{ $participant->surname }}</option>
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
                <!-- <button type="submit" class="btn btn-success ml-3">Submit</button> -->
                <button type="button" class="btn btn-success ml-3" onClick="submitForm()">Submit</button>
            </div>
        </div>
				
    </div>
    
</form>
 
</body>



<script>
  function submitForm() {
      const form = document.getElementById('formAddTeam');
      let formData = new FormData(form);
      let processedData = {};

      for (let i = 0; i < form.elements.length; i++) {
          let element = form.elements[i];
          let key = element.name;

          if (element.tagName === 'SELECT') {
              processedData[key] = Array.from(element.selectedOptions).map(option => option.value);
          } else {
              processedData[key] = element.value;
          }
      }

      formData.append('payload', JSON.stringify(processedData));
      console.log(formData);
      let xhr = new XMLHttpRequest();
      xhr.open('POST', '{{ route('teams.store') }}', true);
      xhr.onload = function() {
          if (xhr.status >= 200 && xhr.status < 300) {
              // console.log(xhr.responseText);
              // Redirect to teams.index after successful addition
            //   window.location.href = '{{ route('teams.index') }}';
          } else {
              console.error(xhr.statusText);
          }
      };
      xhr.onerror = function() {
          console.error('Network error');
      };
      xhr.send(formData);
  }
</script>
</html>