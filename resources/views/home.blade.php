@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">

                    <h3>Anda yakin ingin logout ?</h3>
                    <table>

                        <td style="width: 20px;">
                            {{-- <a type="button" class="btn btn-primary" href="{{ route('logout') }}" >Ya</a> --}}
                            <a  class="btn btn-danger" type="button" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Ya</a>
                            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button class="btn btn-primary" type="submit">ya</button>
                            </form> --}}
                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="window.history.go(-1); return false;" href="">TIdak</a>
                        </td>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
