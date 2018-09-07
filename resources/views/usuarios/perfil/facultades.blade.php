<option value="" selected>Facultad</option>
@for($i=0;$i<count($facultades);$i++)
    <option value="{{$facultades[$i]["universidades_facultades_id"]}}">{{$facultades[$i]["facultadNombre"]}}</option>
@endfor