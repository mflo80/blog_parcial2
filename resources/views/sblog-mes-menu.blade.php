    <div>
        <center>
            @if(isset($meses))
                <br>
                <th>
                    <td>
                        <strong>
                            Filtrar post por mes:
                        </strong>
                    </td>
                </th>
               @foreach($meses as $mes)
                <th>
                    <td>
                        @php
                            $mes_array = array(
                                1 => "January",
                                2 => "February",
                                3 => "March",
                                4 => "April",
                                5 => "May",
                                6 => "June",
                                7 => "July",
                                8 => "August",
                                9 => "September",
                                10 => "Octuber",
                                11 => "November",
                                12 => "December"
                            );

                            $mes_espaniol_array = array(
                                "Enero" => "January",
                                "Febrero" => "February",
                                "Marzo" => "March",
                                "Abril" => "April",
                                "Mayo" => "May",
                                "Junio" => "June",
                                "Julio" => "July",
                                "Agosto" => "August",
                                "Setiembre" => "September",
                                "Octubre" => "Octuber",
                                "Noviembre" => "November",
                                "Diciembre" => "December"
                            );

                            $mes_numero = array_search($mes->mes, $mes_array, true);
                            $mes_espaniol = array_search($mes->mes, $mes_espaniol_array, true);
                        @endphp
                            <a href='sblog-mes-{{ $mes_numero }}'>{{ $mes_espaniol }}</a>
                    </td>
                </th>
                @endforeach
            @endif
        </center>
    </div>
