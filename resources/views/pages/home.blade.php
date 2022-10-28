@extends('layouts.app')
@section('content')
<div class="card card-user">
<div class="card-header">
    <h1 class="card-title text-center text-upper">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. At, in.
    </h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci cumque eius laboriosam labore vero,
         distinctio doloremque odio dolorum omnis iusto ipsum beatae nisi reprehenderit aliquam perferendis
        asperiores in suscipit, molestias, cum officia temporibus harum dolores id. Veniam maiores ea
         reiciendis corrupti voluptatem ut, inventore neque, perferendis commodi voluptatum similique aliquid!
    </p>

</div>
<div class="card-body">

    @if(Session::has('success'))
    <div class="alert alert-success">
    {{ Session::get('success') }}
    </div>
    @endif
<form method="POST" action="home" enctype="multipart/form-data">
{{csrf_field()}}
<div class="form-group row">
    <label for="filmtitle" class="col-sm-4 col-form-label">Filmtitel</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('filmtitle') is-invalid @enderror" placeholder="Filmtitel" id="filmtitle" name="filmtitle">
        @error('filmtitle')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="filmmaker" class="col-sm-4 col-form-label">Filmemacher_innen</label>
    <div class="col-sm-8">
        <textarea type="text" class="form-control @error('filmmaker') is-invalid @enderror" placeholder="Filmemacher_innen" id="filmmaker" name="filmmaker"></textarea>
            @error('filmmaker')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="yourage" class="col-sm-4 col-form-label">Alter der Filmemacher_innen </label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('yourage') is-invalid @enderror" placeholder="Alter der Filmemacher_innen" id="yourage" name="yourage">
        @error('yourage')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="firstname" class="col-sm-4 col-form-label">Kontaktperson </label>
    <div class="col-sm-4">
        <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Vorname" id="firstname" name="firstname">
        @error('firstname')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-sm-4">
        <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Nachname" id="lastname" name="lastname">
        @error('lastname')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-sm-4 col-form-label">Adresse </label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Straße und Hausnummer" id="address" name="address">
        @error('address')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-sm-4 col-form-label"> </label>
    <div class="col-sm-4">
        <input type="text" class="form-control @error('plz') is-invalid @enderror" placeholder="PLZ" id="plz" name="plz">
        @error('plz')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-sm-4">
        <input type="text" class="form-control @error('ort') is-invalid @enderror" placeholder="Ort" id="ort" name="ort">
        @error('ort')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-sm-4 col-form-label"> </label>
<div class="col-sm-8">
    <input type="text" class="form-control @error('land') is-invalid @enderror" placeholder="Land" id="land" name="land">
    @error('land')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>

<div class="form-group row">
    <label for="telefon" class="col-sm-4 col-form-label">Telefon</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('telefon') is-invalid @enderror" placeholder="Telefon" id="telefon" name="telefon">
        @error('telefon')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">E-mail Adresse</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail Adresse" id="email" name="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="filmlength" class="col-sm-4 col-form-label">Filmlänge</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('filmlength') is-invalid @enderror" placeholder="Filmlänge" id="filmlength" name="filmlength">
        @error('filmlength')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="productindate" class="col-sm-4 col-form-label">Produktionszeitrum (von - bis)</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('productindate') is-invalid @enderror" placeholder="Produktionszeitrum (von - bis)" id="productindate" name="productindate">
        @error('productindate')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="filmexplaining" class="col-sm-4 col-form-label">Kurzinhaltsangabe (für das Programmheft, max. 200 Zeichen)</label>
    <div class="col-sm-8">
        <textarea type="text" class="form-control @error('filmexplaining') is-invalid @enderror" placeholder="Kurzinhaltsangabe (für das Programmheft, max. 200 Zeichen)" id="filmexplaining" name="filmexplaining"></textarea>
            @error('filmexplaining')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="whoareyou" class="col-sm-4 col-form-label">Zu deiner/eurer Person: Wer bist du/seid ihr, wie habt ihr euch gefunden</label>
    <div class="col-sm-8">
        <textarea class="form-control @error('whoareyou') is-invalid @enderror" placeholder="Zu deiner/eurer Person: Wer bist du/seid ihr, wie habt ihr euch gefunden" id="whoareyou" name="whoareyou"></textarea>
            @error('whoareyou')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="didyougethelp" class="col-sm-4 col-form-label">Hat dir/euch jemand bei der Umsetzung geholfen? Wer und in welcher Form?</label>
    <div class="col-sm-8">
        <textarea  class="form-control @error('didyougethelp') is-invalid @enderror" placeholder="Hat dir/euch jemand bei der Umsetzung geholfen? Wer und in welcher Form?" id="didyougethelp" name="didyougethelp"></textarea>
            @error('didyougethelp')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="nextproject" class="col-sm-4 col-form-label">Planst du/plant ihr weitere Projekte? Wenn ja, welche?</label>
    <div class="col-sm-8">
        <textarea class="form-control @error('nextproject') is-invalid @enderror" placeholder="Planst du/plant ihr weitere Projekte? Wenn ja, welche?" id="nextproject" name="nextproject"></textarea>
            @error('nextproject')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="anymoreinfo" class="col-sm-4 col-form-label">E-Mail Adresse/Webadresse als Kontakt im Programmheft?</label>
    <div class="col-sm-8">
        <textarea class="form-control @error('anymoreinfo') is-invalid @enderror" placeholder="E-Mail Adresse/Webadresse fürs Programmheft angeben" id="anymoreinfo" name="anymoreinfo"></textarea>
            @error('anymoreinfo')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- Start The Upload Video -->
<div id="container">
	<h1>Please Be Patient</h1>
	<div id="body">
		<h4 class="alert alert-danger">Please Wait Untel The Video Upload Is 100% Then Send The Form </h4>
		<div id="filelist">Your browser doesn't have Flashs, Silverlight or HTML5 support.</div>
		<div id="container">
			<div class="form-group">
				<a id="uploadFile" name="uploadFile" href="javascript:;" class="btn btn-warning">Select file</a>
			</div>
			<div class="form-group">
				<a id="upload" href="javascript:;" class="btn btn-danger">Upload files</a>
			</div>
		</div>
		<input type="hidden" id="file_ext" name="file_ext" value="<?=substr( md5( rand(10,100) ) , 0 ,10 )?>">
		<div id="console"></div>
	</div>
    <h5 class="alert alert-success">This page took {{ (microtime(true) - LARAVEL_START) }} seconds to render</h5>
</div>
<script>
    BASE_URL    =  "{{ url('uploadtoserver') }}";
    PUBLIC_URL  = "{{ public_path('js/plupload/js/Moxie.swf') }}";
    PRIVATE_URL = "{{ public_path('js/plupload/js/Moxie.xap') }}";
</script>
<script src="{{ asset('js/plupload/js/plupload.full.min.js') }}"></script>
<script src="{{ asset('js/application.js')}}"></script>
<!-- End The Upload Video -->

<div class="form-group row">
    <label for="signature" class="col-sm-4 col-form-label">Unterschrift (Foto deiner Unterschrift) hier uploaden (max. 1024 KB)</label>
    <div class="col-sm-8">
        <input type="file" class="form-control @error('signature') is-invalid @enderror" placeholder="Unterschrift (Foto deiner Unterschrift) hier uploaden (max. 512 KB)" id="signature" name="signature">
        @error('signature')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="newsletter" class="col-sm-4 col-form-label">Newsletter</label>
    <div class="col-sm-8 checkbox">
        <label>
            <input type="checkbox" class="@error('newsletter') is-invalid @enderror" name="newsletter" id="newsletter" value="1" >
            @error('newsletter')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <small>
                Ich stimme bis auf Widerruf der Zusendung des Newsletters mit festivalbezogenen Daten zu,
                sowie der Zusendung von Festivalinformationen per Post  und Mail. Diese Zustimmung kann jederzeit widerrufen werden.
            </small>
        </label>
    </div>
  </div>
  <div class="form-group row">
    <label for="termsandconditions" class="col-sm-4 col-form-label">Teilnahmebedingungen</label>
    <div class="col-sm-8 checkbox">
        <label>
            <input type="checkbox" class="@error('termsandconditions') is-invalid @enderror" name="termsandconditions" id="termsandconditions" value="1">
            @error('termsandconditions')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <small>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo suscipit iste ea dolores temporibus corporis
                 qui provident dignissimos molestias, id consequatur. Eos id autem debitis fuga
                 facilis velit! Sapiente obcaecati debitis cum magnam, voluptatum accusantium quis, sit eaque fuga delectus
                  tempora non et ex commodi. Quas assumenda quisquam ipsam veniam rem molestiae ea pariatur libero?
            </small>
        </label>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12 text-center">
         <button type="submit" class="btn btn-primary">Absenden</button>
         <input type="reset" class="btn btn-danger" value="zurücksetzen">
    </div>
  </div>
</form>
</div>
</div>
</div>
@endsection
