@extends(('layouts.app'))

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(count($dispo) < 6)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>disponibilte is empty !</strong> .plese set a disponibility for this prof
        </div>
    @else

    <form method="POST" action="{{ route('desponibilites.store', $prof->prof_id) }}">
        @csrf
        <table class="table">

            <thead>
            <tr>
                <th class="col">les jours</th>
                <th class="col">Temps a choisir</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Lundi</td>
                <td>
                    <input type="checkbox" name="Lundi[]" {{ $dispo[0]->t8_10 ? 'checked':'' }} value="8-10" id="t">08:00-10:00
                    <input type="checkbox" name="Lundi[]" {{ $dispo[0]->t10_12 ? 'checked':'' }} value="10-12" id="l">10:00-12:00
                    <input type="checkbox" name="Lundi[]" {{ $dispo[0]->t14_16 ? 'checked':'' }} value="14-16" id="j">14:00-16:00
                    <input type="checkbox" name="Lundi[]" {{ $dispo[0]->t16_18 ? 'checked':'' }} value="16-18" id="r">16:00-18:00
                </td>
            </tr>
            <tr>
                <td>Mardi</td>
                <td>
                    <input type="checkbox" name="Mardi[]" {{ $dispo[1]->t8_10 ? 'checked':'' }} value="8-10" id="t">08:00-10:00
                    <input type="checkbox" name="Mardi[]" {{ $dispo[1]->t10_12 ? 'checked':'' }} value="10-12" id="l">10:00-12:00
                    <input type="checkbox" name="Mardi[]" {{ $dispo[1]->t14_16 ? 'checked':'' }} value="14-16" id="j">14:00-16:00
                    <input type="checkbox" name="Mardi[]" {{ $dispo[1]->t16_18 ? 'checked':'' }} value="16-18" id="r">16:00-18:00
                </td>
            </tr>
            <tr>
                <td>Mercredi</td>
                <td>
                    <input type="checkbox" name="Mercredi[]" {{ $dispo[2]->t8_10 ? 'checked':'' }} value="8-10" id="t">08:00-10:00
                    <input type="checkbox" name="Mercredi[]" {{ $dispo[2]->t10_12 ? 'checked':'' }} value="10-12" id="l">10:00-12:00
                    <input type="checkbox" name="Mercredi[]" {{ $dispo[2]->t14_16 ? 'checked':'' }} value="14-16" id="j">14:00-16:00
                    <input type="checkbox" name="Mercredi[]" {{ $dispo[2]->t16_18 ? 'checked':'' }} value="16-18" id="r">16:00-18:00
                </td>
            </tr>
            <tr>
                <td>Jeudi</td>
                <td>
                    <input type="checkbox" name="Jeudi[]" {{ $dispo[3]->t8_10 ? 'checked':'' }} value="8-10" id="t">08:00-10:00
                    <input type="checkbox" name="Jeudi[]" {{ $dispo[3]->t10_12 ? 'checked':'' }} value="10-12" id="l">10:00-12:00
                    <input type="checkbox" name="Jeudi[]" {{ $dispo[3]->t14_16 ? 'checked':'' }} value="14-16" id="j">14:00-16:00
                    <input type="checkbox" name="Jeudi[]" {{ $dispo[3]->t16_18 ? 'checked':'' }} value="16-18" id="r">16:00-18:00
                </td>
            </tr>
            <tr>
                <td>Vendredi</td>
                <td>
                    <input type="checkbox" name="Vendredi[]" {{ $dispo[4]->t8_10 ? 'checked':'' }} value="8-10" id="t">08:00-10:00
                    <input type="checkbox" name="Vendredi[]" {{ $dispo[4]->t10_12 ? 'checked':'' }} value="10-12" id="l">10:00-12:00
                    <input type="checkbox" name="Vendredi[]" {{ $dispo[4]->t14_16 ? 'checked':'' }} value="14-16" id="j">14:00-16:00
                    <input type="checkbox" name="Vendredi[]" {{ $dispo[4]->t16_18 ? 'checked':'' }} value="16-18" id="r">16:00-18:00
                </td>
            </tr>
            <tr>
                <td>Samudi</td>
                <td>
                    <input type="checkbox" name="Samudi[]" {{ $dispo[5]->t8_10 ? 'checked':'' }} value="8-10" id="t">08:00-10:00
                    <input type="checkbox" name="Samudi[]" {{ $dispo[5]->t10_12 ? 'checked':'' }} value="10-12" id="l">10:00-12:00
                    <input type="checkbox" name="Samudi[]" {{ $dispo[5]->t14_16 ? 'checked':'' }} value="14-16" id="j">14:00-16:00
                    <input type="checkbox" name="Samudi[]" {{ $dispo[5]->t16_18 ? 'checked':'' }} value="16-18" id="r">16:00-18:00
                </td>
            </tr>
            </tbody>

        </table>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>

    @endif
@endsection
