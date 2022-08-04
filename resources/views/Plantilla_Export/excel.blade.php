<table>
    <!-- <td><img src="{{ asset('img/Logo_TecNM.png') }}"></td> -->
    <td></td>
    <td colspan="8"><h1>Instituto Tecnológico De México (Tuxtla Gutiérrez)</h1></td>
    <!-- <td><img src="{{ asset('img/logo_ittg.png') }}"></td> -->
    @foreach($data as $value)
        <td><strong>Num_Control: {{ $value->num_control }}</strong></td>
        @foreach($data as $data_r)
            <tr>
                <td>{{ $data_r->category }}</td>
                <td colspan="6">{{ $data_r->question }}</td>
                <td>{{ $data_r->answer }}</td>
            </tr>
        @endforeach
    @endforeach

    @foreach($data as $value)
        <td><strong>{{ $value->question }}</strong></td>
        @foreach($data as $dato)
            <tr>
                <td>Respuesta.- {{ $dato->answer }} <span>Total.- {{ $dato->total }}</span></td>
            </tr>
        @endforeach
    @endforeach
</table>