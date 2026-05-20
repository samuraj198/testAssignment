@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <form style="display: flex; align-items: center; gap: 20px" action="{{ route('logout') }}" method="POST">
        @method('DELETE')
        @csrf
        <h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
        <button type="submit">Выйти</button>
    </form>
    <div>
        <canvas id="visits"></canvas>
    </div>
    <div>
        <canvas id="cities"></canvas>
    </div>

    <script>
        const ctx1 = document.getElementById('visits');
        const ctx2 = document.getElementById('cities');

        const times = {!! json_encode($times) !!};
        const counts = {!! json_encode($counts) !!};
        const cities =  {!! json_encode($cities) !!};
        const cityCounts =  {!! json_encode($cityCounts) !!};


        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: times,
                datasets: [{
                    label: 'Уникальные посещения за час',
                    data: counts,
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        type: 'linear',
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Количество уникальных посещений"
                        },
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    },
                    y: {
                        type: 'linear',
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Время (часы)"
                        }
                    }
                }
            }
        });

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: cities,
                datasets: [{
                    label: 'Города по количеству визитов',
                    data: cityCounts,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
