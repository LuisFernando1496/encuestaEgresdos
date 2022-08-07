<table>
    <!-- <td><img src="img/Logo-TecNM.png"></td> -->
    <tr><td colspan="8"><h1>Instituto Tecnológico De México (Tuxtla Gutiérrez)</h1></td></tr>
    <!-- <td><img src="img/logo-ittg.png"></td> -->
    @foreach($data as $value)
        <tr><td><strong>Num_Control: {{ $value->num_control }}</strong></td></tr>
        <tr><td><strong>Nombre: {{ $value->name }}</strong></td></tr>
        @foreach($data as $data_r)
            <tr>
                <td>{{ $data_r->category }}</td>
                <td colspan="6">{{ $data_r->question }}</td>
                <td>Respuesta.- {{ $data_r->answer }}</td>
            </tr>
        @endforeach
    @endforeach
    <tr></tr><tr>Resultados.</tr>
    <!-- <label class="titulo_centro">Promedio de respuestas por pregunta</label>
    <img class="chart" src="img/{{ $filename }}"> -->
    @foreach($data as $value)
        <tr><td colspan="6"><strong>{{ $value->question }}</strong></td></tr>
        @foreach($data as $dato)
            <tr>
                <td colspan="3">Respuesta.- {{ $dato->answer }}</td><td>Total.- {{ $dato->total }}</td>
            </tr>
        @endforeach
    @endforeach
</table>