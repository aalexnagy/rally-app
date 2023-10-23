<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rally teams</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Teams overview</h2>
                </div>
                <div class="row d-xlex justify-content-between">
                    <div class="pull-right mb-2 mr-2">
                        <a class="btn btn-success" href="{{ route('teams.create') }}">Add new team</a>
                    </div>
                    <div class="row d-xlex justify-content-end">
                        <div class="pull-right mb-2 mr-2">
                            <a class="btn btn-info" href="{{ route('participants.index') }}">Participants</a>
                        </div>
                        <div class="pull-right mb-2 mr-2">
                            <a class="btn btn-info" href="{{ route('participantTypes.index') }}">Participant types</a>
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
                <th>Team name</th>
                @foreach ($participantTypes as $participantType)
                    <th>{{ $participantType->name }}</th>
                @endforeach
                <th width="280px">Action</th>
            </tr>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>

                    @foreach ($participantTypes as $participantType)
                        <td>
                            @php
                                $decodedPayload = json_decode($team->payload, true);
                                $participantName = $participantType->name;

                                if (isset($decodedPayload[$participantName])) {
                                    $participantIds = $decodedPayload[$participantName];
                                    $participantsData = $participants->whereIn('id', $participantIds);

                                    // Display names and surnames on new lines
                                    foreach ($participantsData as $participant) {
                                        echo $participant->name . ' ' . $participant->surname . '<br>';
                                    }
                                }
                            @endphp
                        </td>
                    @endforeach

                    <td>
                        <form action="{{ route('participantTypes.destroy', $participantType->id) }}" method="Post">
                            <a class="btn btn-primary"
                                href="{{ route('participantTypes.edit', $participantType->id) }}">Edit</a>
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
