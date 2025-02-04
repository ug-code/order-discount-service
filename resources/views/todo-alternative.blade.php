<x-layout>
    <div class="row">
        <div class="col-12">
            <h3 class="mt-2">To do planing</h3>
            <p class="lead">Total estimated duration : {{$totalEstimatedDuration}}</p>

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                @foreach ($tasks as $task)
                    <th scope="col"> -</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task['periodName']}}</th>
                    @foreach ($task['developers'][$task['period']] as $key =>$developer)
                        <td>
                            <div class="card col-md-12 my-2 p-1 border-warning text-muted">
                                <h5 class="card-header p-0 m-0"> {{$key }}</h5>
                                <div class="card-body p-0">
                                    <div>
                                        <span class="col-12">total Task:{{ @$developer['info']['totalTask'] }} </span>
                                        <span class="col-12">total Hour:{{ @$developer['info']['totalHour'] }} </span>
                                    </div>
                                </div>
                            </div>
                            @foreach (@$developer['planning'] as $plan)

                                <div class="card border-info col-md-12 my-2 p-1 text-muted">
                                    <h5 class="card-header p-0 m-0"> {{ $plan['name'] }}</h5>
                                    <div class="card-body p-0">
                                        <div>
                                            <span class="col-12">Level: {{ $plan['level'] }}x</span>
                                            <span class="col-12">Duration: {{ $plan['estimated_duration'] }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
