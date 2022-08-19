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
    @php
        $val = '';
        $val_cat = '';
    @endphp
    @foreach($data as $value)
        @if($value->num_control != $val)
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
        @endif
        @php
            $val = $value->num_control;
        @endphp
        @if($value->category != $val_cat)
            <tr>
                <td></td>
                <td colspan="8">{{ $value->category }}</td>
            </tr>
        @endif
        <tr>
            <td></td>
            <td colspan="8">{{ $value->question }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Respuesta.- {{ $value->answer }}</td>
        </tr>
        @php
            $val_cat = $value->category;
        @endphp
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