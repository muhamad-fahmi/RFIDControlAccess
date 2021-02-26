@extends('layouts.header')

@section('content')
    <div class="card">
        <div class="card-header">
           <div class="row">
               <div class="col-10">
                    <h5><i class="fa fa-sliders mr-3" aria-hidden="true"></i>
                        <strong>Setting Device Mode</strong></h5>
               </div>
               <div class="col-2">

               </div>
           </div>
        </div>
       <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                    <table class="table table-borderless table-sm w-50">
                        <tr>
                            <td>Scan Mode</td>
                            <td>
                                @if ($settings->scanmode == 0)
                                     <i class="fa fa-dot-circle-o text-danger" aria-hidden="true"></i> OFF
                                @else
                                     <i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i> ON
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td>Add Mode</td>
                            <td>
                                @if ($settings->addmode == 0)
                                     <i class="fa fa-dot-circle-o text-danger" aria-hidden="true"></i> OFFF
                                @else
                                     <i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i> ON
                                @endif

                            </td>
                        </tr>
                    </table>

            </div>
            <div class="col-md-2">
                <div class="row">
                    @if ($settings->addmode == 0)
                        <form action="setting/1/edit" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="cat" value="addmode">
                            <button type="submit" class="btn btn-light btn-sm mr-2">ADD</button>
                        </form>
                    @else
                        <button  class="btn btn-success btn-sm mr-2">ADD</button>
                    @endif

                    @if ($settings->scanmode == 0)
                        <form action="setting/1/edit" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="cat" value="scanmode">
                            <button type="submit" class="btn btn-light btn-sm">SCAN</button>
                        </form>
                    @else
                        <button  class="btn btn-success btn-sm mr-2">SCAN</button>
                    @endif

                </div>
            </div>
        </div>
       </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h5><i class="fa fa-calendar-check-o mr-3" aria-hidden="true"></i>
                 <strong>Schedule Management</strong></h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mt-2 mb-4" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-square mr-2" aria-hidden="true"></i>
                Add Activity
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-square mr-2" aria-hidden="true"></i> Add New Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                     <form action="/schedules" method="post">
                         @csrf
                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Day</label>
                            <select class="form-control" name="day" id="exampleFormControlSelect1">
                              <option>Sunday</option>
                              <option>Monday</option>
                              <option>Tuesday</option>
                              <option>Wednesday</option>
                              <option>Thursday</option>
                              <option>Friday</option>
                              <option>Saturday</option>
                            </select>
                          </div>
                         <div class="form-group">
                            <label for="example-time-k" >Activity Name</label>
                            <x-input type="text" field="activity"/>
                         </div>
                         <div class="form-group">
                            <label for="example-time-input">Entry Time</label>
                            <input class="form-control" name="entrytime" type="time"  id="example-time-input">
                         </div>
                         <div class="form-group">
                            <label for="example-time-input">Late Time Limit</label>
                            <input class="form-control" name="latetime" type="time"  id="example-time-input">
                         </div>
                         <div class="form-group">
                            <label for="example-time-input">Time Out</label>
                            <input class="form-control" name="timeout" type="time"  id="example-time-input">
                         </div>
                         <br>
                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>NO</th>
                    <th>ID Activity</th>
                    <th>Day</th>
                    <th>Activity</th>
                    <th>Entry Time</th>
                    <th>Late Time</th>
                    <th>Time Out</th>
                    <th>Options</th>
                </tr>
                @php
                $x =0;
                @endphp
                @foreach ($jadwalsun as $jadwa1)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $jadwa1->day }}</td>
                        <td>{{ $jadwa1->idactivity }}</td>
                        <td>{{ $jadwa1->activity }}</td>
                        <td>{{ $jadwa1->entrytime }}</td>
                        <td>{{ $jadwa1->latetime }}</td>
                        <td>{{ $jadwa1->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwa1->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwa1->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwa1->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwa1->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwa1->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwa1->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwa1->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwa1->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwa1->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwa1->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
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
                        <td>{{ $jadwal2->day }}</td>
                        <td>{{ $jadwal2->idactivity }}</td>
                        <td>{{ $jadwal2->activity }}</td>
                        <td>{{ $jadwal2->entrytime }}</td>
                        <td>{{ $jadwal2->latetime }}</td>
                        <td>{{ $jadwal2->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwal2->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwal2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwal2->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwal2->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwal2->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwal2->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwal2->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwal2->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwal2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwal2->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
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
                        <td>{{ $jadwal3->day }}</td>
                        <td>{{ $jadwal3->idactivity }}</td>
                        <td>{{ $jadwal3->activity }}</td>
                        <td>{{ $jadwal3->entrytime }}</td>
                        <td>{{ $jadwal3->latetime }}</td>
                        <td>{{ $jadwal3->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwal3->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwal3->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwal3->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwal3->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwal3->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwal3->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwal3->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwal3->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwal3->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwal3->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
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
                        <td>{{ $jadwal4->day }}</td>
                        <td>{{ $jadwal4->idactivity }}</td>
                        <td>{{ $jadwal4->activity }}</td>
                        <td>{{ $jadwal4->entrytime }}</td>
                        <td>{{ $jadwal4->latetime }}</td>
                        <td>{{ $jadwal4->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwal4->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwal4->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwal4->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwal4->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwal4->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwal4->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwal4->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwal4->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwal4->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwal4->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
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
                        <td>{{ $jadwal5->day }}</td>
                        <td>{{ $jadwal5->idactivity }}</td>
                        <td>{{ $jadwal5->activity }}</td>
                        <td>{{ $jadwal5->entrytime }}</td>
                        <td>{{ $jadwal5->latetime }}</td>
                        <td>{{ $jadwal5->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwal5->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwal5->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwal5->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwal5->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwal5->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwal5->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwal5->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwal5->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwal5->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwal5->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
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
                        <td>{{ $jadwal6->day }}</td>
                        <td>{{ $jadwal6->idactivity }}</td>
                        <td>{{ $jadwal6->activity }}</td>
                        <td>{{ $jadwal6->entrytime }}</td>
                        <td>{{ $jadwal6->latetime }}</td>
                        <td>{{ $jadwal6->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwal6->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwal6->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwal6->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwal6->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwal6->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwal6->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwal6->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwal6->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwal6->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwal6->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach


                @php
                $x =0;
                @endphp
                @foreach ($jadwalsat as $jadwal7)
                @php
                    $x++;
                @endphp
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $jadwal7->day }}</td>
                        <td>{{ $jadwal7->idactivity }}</td>
                        <td>{{ $jadwal7->activity }}</td>
                        <td>{{ $jadwal7->entrytime }}</td>
                        <td>{{ $jadwal7->latetime }}</td>
                        <td>{{ $jadwal7->timeout }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleedit{{ $jadwal7->id }}">
                                Edit
                            </button>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleedit{{ $jadwal7->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="/schedules/{{ $jadwal7->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="example-time-k" >Day</label>
                                                        <input type="text" name="day" class="form-control" value="{{ $jadwal7->day }}" readonly >
                                                     </div>
                                                    <div class="form-group">
                                                       <label for="example-time-k" >Activity Name</label>
                                                       <x-input type="text" field="activity" value="{{ $jadwal7->activity }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Entry Time</label>
                                                       <input class="form-control" name="entrytime" type="time" value="{{ $jadwal7->entrytime }}"  id="example-time-input">
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="example-time-input">Time Out</label>
                                                       <input class="form-control" name="timeout" type="time" value="{{ $jadwal7->timeout }}"  id="example-time-input">
                                                    </div>
                                                    <br>
                                                    @if ($errors->any())
                                                       <div class="alert alert-danger">
                                                           <ul>
                                                               @foreach ($errors->all() as $error)
                                                                   <li>{{ $error }}</li>
                                                               @endforeach
                                                           </ul>
                                                       </div>
                                                   @endif
                                               </div>
                                               <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary">Save</button>
                                               </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example{{ $jadwal7->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="example{{ $jadwal7->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                            <div class="modal-body">
                                            Will you delete this schedule data ?
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <form action="/schedules/{{ $jadwal7->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
