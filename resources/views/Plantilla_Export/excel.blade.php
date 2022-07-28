<table>
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $data_r->category }}</td>
                <td>{{ $data_r->question }}</td>
                <td>{{ $data_r->answer }}</td>
            </tr>
        @endforeach
    </tbody>
</table>