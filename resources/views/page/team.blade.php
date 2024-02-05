@extends('layouts.main')

@section('content')
<div class="container mt-5">

    <div class="row mb-5">
        <div class="col">
            <h1>{{ $team_name }}</h1>

        </div>
    </div>

    <div class="row">
        <!-- member column -->

        @foreach($team as $member)

        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-body">

                <h2>{{ $member['name'] }}</h2>
                <h4>{{ $member['position'] }}</h4>

                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas officiis porro tempore doloremque autem est, accusantium non natus exercitationem voluptatum rerum! Ipsum architecto laudantium harum incidunt exercitationem dolore sed ratione.</p>

                </div>
            </div>
        </div>

        @endforeach

        <!-- /end of member column -->

    </div>

</div>
@endsection