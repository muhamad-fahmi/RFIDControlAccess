@extends('layouts.header')
@section('content')
    <div class="card">
        <div class="card-header">
            Schedules
        </div>
        <div class="card-body">
            <a href="/settings" class="btn btn-sm btn-primary mt-3 mb-4"><i class="fa fa-sliders mr-3 " aria-hidden="true"></i>
                Manage Schedules</a>
            @if (session('status'))

                <div class="alert alert-success mb-5 alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Day</th>
                    <th>ID Activity</th>
                    <th>Activity</th>
                    <th>Entry Time</th>
                    <th>Late Time</th>
                    <th>Time Out</th>
                </tr>
                @php
                    $x =0;
                @endphp
                @foreach ($jadwalsun as $jadwal1)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td  style="background-color: rgb(223, 247, 255)"><b>{{ $jadwal1->day }}</b></td>
                        <td>{{ $jadwal1->idactivity }}</td>
                        <td>{{ $jadwal1->activity }}</td>
                        <td>{{ $jadwal1->entrytime }}</td>
                        <td>{{ $jadwal1->latetime }}</td>
                        <td>{{ $jadwal1->timeout }}</td>
                    </tr>
                @endforeach
                @php
                $x =0;
                @endphp
                @foreach ($jadwalmon as $jadwal2)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td  style="background-color: rgb(223, 255, 242)"><b>{{ $jadwal2->day }}</b></td>
                        <td>{{ $jadwal2->idactivity }}</td>
                        <td>{{ $jadwal2->activity }}</td>
                        <td>{{ $jadwal2->entrytime }}</td>
                        <td>{{ $jadwal2->latetime }}</td>
                        <td>{{ $jadwal2->timeout }}</td>
                    </tr>
                @endforeach
                @php
                $x =0;
                @endphp
                @foreach ($jadwaltue as $jadwal3)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td  style="background-color: rgb(254, 255, 223)"><b>{{ $jadwal3->day }}</b></td>
                        <td>{{ $jadwal3->idactivity }}</td>
                        <td>{{ $jadwal3->activity }}</td>
                        <td>{{ $jadwal3->entrytime }}</td>
                        <td>{{ $jadwal3->latetime }}</td>
                        <td>{{ $jadwal3->timeout }}</td>
                    </tr>
                @endforeach
                @php
                $x =0;
                @endphp
                @foreach ($jadwalwed as $jadwal4)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td  style="background-color: rgb(255, 223, 251)"><b>{{ $jadwal4->day }}</b></td>
                        <td>{{ $jadwal4->idactivity }}</td>
                        <td>{{ $jadwal4->activity }}</td>
                        <td>{{ $jadwal4->entrytime }}</td>
                        <td>{{ $jadwal4->latetime }}</td>
                        <td>{{ $jadwal4->timeout }}</td>
                    </tr>
                @endforeach
                @php
                $x =0;
                @endphp
                @foreach ($jadwalthu as $jadwal5)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td  style="background-color: rgb(255, 241, 223)"><b>{{ $jadwal5->day }}</b></td>
                        <td>{{ $jadwal5->idactivity }}</td>
                        <td>{{ $jadwal5->activity }}</td>
                        <td>{{ $jadwal5->entrytime }}</td>
                        <td>{{ $jadwal5->latetime }}</td>
                        <td>{{ $jadwal5->timeout }}</td>
                    </tr>
                @endforeach
                @php
                $x =0;
                @endphp
                @foreach ($jadwalfri as $jadwal6)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td  style="background-color: rgb(223, 253, 255)"><b>{{ $jadwal6->day }}</b></td>
                        <td>{{ $jadwal6->idactivity }}</td>
                        <td>{{ $jadwal6->activity }}</td>
                        <td>{{ $jadwal6->entrytime }}</td>
                        <td>{{ $jadwal6->latetime }}</td>
                        <td>{{ $jadwal6->timeout }}</td>
                    </tr>
                @endforeach
                @php
                $x =0;
                @endphp
                @foreach ($jadwalsat as $jadwal7)
                @php
                    $x++;
                @endphp
                    <tr >
                        <td>{{ $x }}</td>
                        <td style="background-color: rgb(238, 238, 238)"><b>{{ $jadwal7->day }}</b></td>
                        <td>{{ $jadwal7->idactivity }}</td>
                        <td>{{ $jadwal7->activity }}</td>
                        <td>{{ $jadwal7->entrytime }}</td>
                        <td>{{ $jadwal7->latetime }}</td>
                        <td>{{ $jadwal7->timeout }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
