<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
        <title>PDF Contactos</title>
        
    </head>
<style>
    .table {     
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 12px;        
        width: 100%; 
        text-align: left;    
        border-collapse: collapse; }

   .th {    
     font-size: 13px;     
     font-weight: normal;  
     background: #ffff;
     border-top: 4px solid #000000;    
     border-bottom: 1px solid #000000; 
     color: #000000;
     }

   .td {    
      padding: 8px;     
      background: #e8edff;    
      border-bottom: 1px solid #000000;
      color: #669;    
      border-top: 1px solid transparent;
     }

.tr:hover td { background: #000000}
</style>
    <body>
        <table width="100%;">
            <thead>
                <tr>
                    <th> <img src="img/Logo-TecNM.jpeg" style="width:120px ; height:90px ;"></th>
                    <th> <h3>Instituto Tecnológico De México (Tuxtla Gutiérrez)</h3></th>
                    <th><img src="img/logo-ittg.jpeg" style="width:120px ; height:120px ;"></th>
                </tr>
            </thead>
        </table>
           
           <h3 style="text-align: center">DIRECTORIO DE DATOS</h3>
           <h4 style="text-align: center"><strong>{{$title}}</strong></h4>
                               
    <table class="table">
        <thead>
            <tr>
                <th class="th" >NOMBRE</th>
            <th class="th"> CORREO</th>
            <th class="th">CORREO ALTERNATIVO</th>
            <th class="th">TELEFONO</th>
            <th class="th">SEMESTRE</th>
            <th class="th">No. CONTROL</th>
            <th class="th">FECHA DE EGRESO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                 @forelse ($users as $item)
          
                <td class="td" > {{$item->name}}</td>
                <td class="td"> {{$item->email}}</td>
                <td class="td"> {{$item->second_email}}</td>
                <td class="td"> {{$item->smart_phone}}</td>
                <td class="td"> {{$item->semester}}</td>
                <td class="td"> {{$item->enrollment}}</td>
                <td class="td"> {{Carbon\Carbon::parse($item->date_graduate)->format('Y-m-d')}}</td>
            
            @empty
            <td colspan="7" style="text-align: center"><strong >NO EXISTEN DATOS</strong> </td>
            @endforelse
            </tr>
        </tbody>
    </table>
       
            
        
    
     
           
            
          
      
    </body>
</html>