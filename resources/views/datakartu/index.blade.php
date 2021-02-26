@extends('layouts.header')
@section('content')



{{-- CARDS BUTTON --}}
<div class="row mb-5">
    <div class="col-md-4 col-sm-6">
        <div class="card-box bg-green">
            <div class="inner">
                <h3> {{ $cards }}</h3>
                <p> Cards </p>
            </div>
            <div class="icon">
                <i class="fa fa-id-card" aria-hidden="true"></i>
            </div>
            <a href="/cardsdata" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="card-box bg-orange">
            <div class="inner">
                <h3> {{ $newcards }} </h3>
                <p> New Cards </p>
            </div>
            <div class="icon">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <a href="/newcards" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="card-box bg-red">
            <div class="inner">
                <h3> {{ $blocked }} </h3>
                <p> Blocked </p>
            </div>
            <div class="icon">
                <i class="fa fa-ban" aria-hidden="true"></i>
            </div>
            <a href="/blockedcards" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
{{-- CARDS BUTTON --}}


@if (session('status') == "new-del")

    <div class="alert alert-danger mb-5 alert-dismissible fade show" role="alert">
        {{ "New card activation request has been deleted!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
@if (session('status') == "new-upd")

    <div class="alert alert-success mb-5 alert-dismissible fade show" role="alert">
        {{ "New card has been completed!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
@if (session('status') == "crd-upd")

    <div class="alert alert-success mb-5 alert-dismissible fade show" role="alert">
        {{ "A card data has been updated!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
@if (session('status') == "crd-del")

    <div class="alert alert-danger mb-5 alert-dismissible fade show" role="alert">
        {{ "A card data has been deleted!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
@if (session('status') == "blk-add")

    <div class="alert alert-success mb-5 alert-dismissible fade show" role="alert">
        {{ "A card data has been blocked!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
@if (session('status') == "blk-rcv")

    <div class="alert alert-success mb-5 alert-dismissible fade show" role="alert">
        {{ "A blocked card has been recovery!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

@if (session('status') == "blk-del")

    <div class="alert alert-danger mb-5 alert-dismissible fade show" role="alert">
        {{ "A blocked card has been deleted!" }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif


<h4 class="mb-4">{{ $cat }} Cards</h4>
    <table class="table">
        <tr>
            <th>NO</th>
            <th>UID</th>
            <th>Owner</th>
            <th>No. HP</th>
            <th>Card Status</th>
            <th>Action</th>
        </tr>
        <?php $x = 0; ?>
        @foreach ($cardsdata as $item)
        <?php $x++; ?>
            <tr>
                <td>{{ $x }}</td>
                <td>{{ $item->uid }}</td>
                <td>@if ($item->owner == "0")
                    {{ "-" }}
                @else
                    {{ $item->owner }}
                @endif</td>
                <td>@if ($item->nohp == "0")
                    {{ "-" }}
                @else
                    {{ $item->nohp }}
                @endif</td>

                <td>@if ($item->status == 1)
                    <i class="fa fa-circle text-success" aria-hidden="true"></i> Active
                @else
                    <i class="fa fa-circle text-danger" aria-hidden="true"></i> Not Active
                @endif</td>
                <td>
                <div class="row">
                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#example{{$item->id}}">
                        View
                      </button>
                      @if ($url == "blockedcards")
                        <form action="blockedcards/{{ $item->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="cat" value="recover">
                            <button type="submit" class="btn btn-success btn-sm mr-2">Recover</button>
                        </form>
                      @else
                          <a href="{{ $url }}/{{ $item->id }}/edit" class="btn btn-success btn-sm mr-2">Edit</a>
                      @endif


                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleDELETE{{$item->id}}">
                        Delete
                      </button>
                </div>

                {{-- MODEL VIEW--}}
                <div class="modal fade" id="example{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Detail Card </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <table class="table">

                            <tr>
                                <td colspan="3" class="text-center">
                                    <img src="{{ asset('image/'.$item->foto) }}" alt="foto {{ $item->owner }}" class="imageownermodel">
                                </td>
                            </tr>
                            <tr>
                                <th>UID</th>
                                <td>:</td>
                                <td>{{ $item->uid }}</td>
                            </tr>
                            <tr>
                                <th>Owner</th>
                                <td>:</td>
                                <td>{{ $item->owner }}</td>
                            </tr>
                            <tr>
                                <th>No. HP</th>
                                <td>:</td>
                                <td>{{ $item->nohp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>


                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

                        </div>
                      </div>
                    </div>
                  </div>


                {{-- MODEL DELETE --}}
                <div class="modal fade" id="exampleDELETE{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Will you delete this card ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                         @if ($url == "blockedcards")

                         @else
                            <form action="blockedcards/{{ $item->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="cat" value="block">
                                <button type="submit" class="btn btn-warning btn-sm">Block</button>
                            </form>
                         @endif
                          <form action="{{ $url }}/{{ $item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>
            </tr>
        @endforeach

    </table>

    {{ $cardsdata->links() }}
@endsection
