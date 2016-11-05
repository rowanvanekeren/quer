@extends('layouts.app')

@section('title', 'Contractenoverzicht')

@section('content')


    <div class="variable_content">

        @include('layouts.dashboard_menu')

        <h1>Contractenoverzicht</h1>


        @if (session('msg'))
            <div class="msg_info">
                {{ session('msg') }}
            </div>
        @endif

        @if($quer_contracts)
        <div class="contracts_quer">
            <h2>Als Que'r</h2>

            <div>
                @foreach($quer_contracts as $q_contract)
                    <div>
                        <a href="{{url('/contract_details/'.$q_contract->contract->id)}}"><span
                                    class="left">{{ $q_contract->event->name }}</span> <span
                                    class="right">{{ $q_contract->contract->phases->phase_description }}</span></a>
                    </div>
                @endforeach

            </div>
        </div>
        @endif

        @if($applicant_contracts)
        <div class="contracts_applicant">
            <h2>Als Apply'r</h2>

            <div>
                @foreach($applicant_contracts as $a_contract)
                    <div>
                        <a href="{{url('/contract_details/'.$a_contract->contract->id)}}"><span
                                    class="left">{{ $a_contract->event->name }}</span> <span
                                    class="right">{{ $a_contract->contract->phases->phase_description }}</span></a>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>



@endsection