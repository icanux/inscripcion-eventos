<h3 class="h4 text-warning font-weight-bold">Lista de usuarios</h3>
<table class="mt-4 mb-4">
        <thead>
          <tr>
            <th>N°</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>F.Nacimiento</th>
            <th>T.Fijo</th>
            <th>T.Movil</th>
            <th>Direccion</th>
          </tr>
        </thead>
        <tbody>
            @if(count($usuarios)>0)
            <?php $i=1; ?>
                @foreach($usuarios as $usuario)
                <?php
                    if($usuario->fecha_nacimiento=='' || $usuario->fecha_nacimiento=='0000-00-00')
                    {
                        $fechaNacimiento='';
                    }
                    else {
                        $fechaNacimiento=date("d/m/Y", strtotime($usuario->fecha_nacimiento));
                    }
                ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$usuario->nombres . ' ' . $usuario->apellidos}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$fechaNacimiento}}</td>
                        <td>{{$usuario->telefono_fijo}}</td>
                        <td>{{$usuario->telefono_movil}}</td>
                        <td>{{$usuario->direccion}}</td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @else
                <tr>
                    <td colspan="6"> No se encontraron datos </td>
                </tr>
            @endif
        </tbody>
</table>