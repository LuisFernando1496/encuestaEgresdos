<table>
    <tr>
        <td>
            <img src="img/logo-ittg.jpeg" width="70px">
        </td>
        <td colspan="8" style="
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            "
        >
            <strong>
                <h1>Instituto Tecnológico De México (Tuxtla Gutiérrez)</h1>
            </strong>
        </td>
        <td>
            <img src="img/Logo-TecNM.jpeg" width="130px">
        </td>
    </tr>
    @foreach($data as $value)
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <strong>Num_Control: {{ $value->num_control }}</strong>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <strong>Nombre: {{ $value->name }}</strong>
            </td>
        </tr>
        @foreach($data as $data_r)
            <tr>
                <td></td>
                <td colspan="8">{{ $data_r->question }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Respuesta.- {{ $data_r->answer }}</td>
            </tr>
        @endforeach
    @endforeach
    <tr></tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <img class="chart" src="img/{{ $filename }}" width="850px">
        </td>    
    </tr>
    
</table>