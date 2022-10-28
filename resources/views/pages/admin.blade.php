@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="admin-header">Willkommen im Administrationsbereich</h1>
                    <h2 class="admin-para">Bitte wähle den Zeitraum der zu exportierenden Daten aus</h2>
                        <form class="form-inline" method="POST" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <label for="datefrom">von</label>
                        <input type="date" class="form-control input-group mb-2 mr-sm-2" id="datefrom" name="datefrom" required value="{{$contacts['datefrom']}}">
                                <label for="dateto">bis</label>
                                    <input type="date" class="form-control input-group mb-2 mr-sm-2" id="dateto" name="dateto" required value="{{$contacts['dateto']}}">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button class="btn btn-success mb-2" type="submit" name="display"> {{ __('Display Users') }} </button>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button class="btn btn-primary mb-2" type="submit" > {{ __('Export XLS') }} </button>
                                    </div>
                        </form>
                        @if(Session::has('message'))
                            <div class="alert alert-warning">
                                {{ Session::get('message') }}
                            </div>
                        @endif
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <td>Filmtitel</td>
                <td>Filmemacher/in</td>
                <td>Vorname</td>
                <td>Nachname</td>
                <td>E-mail</td>
                <td>Telefon</td>
            </tr>
            @foreach($contacts['contacts'] as $contact)
            <tr>
                <td>{{ $contact->filmtitle }}</td>
                <td>{{ $contact->filmmaker }}</td>
                <td>{{ $contact->firstname }}</td>
                <td>{{ $contact->lastname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->telefon }}</td>
            </tr> 
            @endforeach
        </table>
    </div>
@endsection