@extends('layouts.app')


@section('content')
    <div class="container">
        @if(session('success'))
            <div class="text-success p-3 text-center w-100">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <th>jour</th>
                <th>horaire</th>
                <th>action</th>
            </thead>
            <tbody>
            @php
                $allHasProfId = true;
            @endphp
                @foreach($desponibilities as $dispo)
                    @if(!$dispo->t8_10 && !$dispo->t10_12 && !$dispo->t14_16 && !$dispo->t16_18 )
                        @continue
                    @endif
                    @if( $dispo->professeur_id === null)
                        @php
                            $allHasProfId = false;
                        @endphp
                    @endif
                    <tr>
                        <td>{{ $dispo->jour }}</td>
                        <td>
                            {{ $dispo->t8_10?  '8-10':'' }}
                            {{ $dispo->t10_12? ' | 10-12':'' }}
                            {{ $dispo->t14_16? ' 14-16':'' }}
                            {{ $dispo->t16_18? ' | 16-18':'' }}
                        </td>

                        <td>
                            <form action="{{route('update.classe')}}" method="POST">
                                @csrf
                                <label>
                                    <input type="hidden" value="{{$dispo->id}}" name="dispo">
                                    <select name="classe" >
                                        <option value="null">sélectionnez votre classe</option>
                                        @foreach( $professeur as $prof )
                                            <option
                                                value="{{ $prof->id }}"
                                                @if($dispo->professeur_id == $prof->id)
                                                    {{'Selected'}}
                                                @endif
                                            >
                                                {{ $prof->fillier .' | '. $prof->semestre.' | ' . $prof->module }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                <button>
                                    valider
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($allHasProfId)
            <a href="{{ route('emploi.generate', $user->id ) }}">
                <button>Generate Emploi</button>
            </a>
        @endif

    </div>
@endsection
