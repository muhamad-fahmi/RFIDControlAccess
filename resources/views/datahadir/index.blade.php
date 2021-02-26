@extends('layouts.header')
@section('content')
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th>No</th>
            <th>UID</th>
            <th>Owner</th>
            <th>Tapping Time</th>
            <th>Category</th>
            <th>Options</th>
        </tr>
        @php
            $x=0;
        @endphp
        @foreach ($absens as $absen)
        @php
            $x++;
        @endphp
            <tr>
                <td>{{ $x }}</td>
                <td>{{ $absen->uid }}</td>
                <td>{{ $absen->owner }}</td>
                <td>{{ $absen->timetap }}</td>
                <td>{{ $absen->category }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#example{{ $absen->id }}">
                        Detail
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="example{{ $absen->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <table class="table">
                                <tr>
                                    <th>UID</th>
                                    <td>{{ $absen->uid }}</td>
                                </tr>
                                <tr>
                                    <th>Owner</th>
                                    <td>{{ $absen->owner }}</td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td>{{ $absen->nohp }}</td>
                                </tr>
                                <tr>
                                    <th>Tapping Time</th>
                                    <td>{{ $absen->timetap }}</td>
                                </tr>
                                <tr>
                                    <th>ID Activity</th>
                                    <td>{{ $absen->idactivity }}</td>
                                </tr>
                                <tr>
                                    <th>Activity</th>
                                    <td>{{ $absen->activity }}</td>
                                </tr>
                                <tr>
                                    <th>Entry Time</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Late Time</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Time Out</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Day</th>
                                    <td>{{ $absen->day }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $absen->date }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $absen->category }}</td>
                                </tr>

                            </table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
  </div>
@endsection
