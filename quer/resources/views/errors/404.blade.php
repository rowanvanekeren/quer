@extends('layouts.app')

@section('content')
<div class="variable_content not_found">
    <h2>404: deze webpagina is niet gevonden</h2>
    
    <div>
        Sorry de pagina die je zoekt bestaat helaas niet meer...
    </div>
    <div>
        Ga terug naar <a href="{{ url('/')}}">home</a>
    </div>
</div>
@endsection