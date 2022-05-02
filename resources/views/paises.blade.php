<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paises</title>
</head>
<body>
    <h1> Paises de la región </h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-warning"> País </th>
                <th class="text-primary"> Capital </th>
                <th class="text-danger"> Moneda </th>
                <th class="text-success"> Poblacion </th>
                <th class="text-info"> Ciudades </th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
            <tr>
                <td class="text-warning" rowspan="{{ count($infopais['ciudades']) }}">
                    {{ $pais }}
                </td>
                <td class="text-primary" rowspan="{{ count($infopais['ciudades']) }}">
                    {{ $infopais["capital"] }}
                </td>
                <td class="text-danger" rowspan="{{ count($infopais['ciudades']) }}">
                    {{ $infopais["moneda"] }}
                </td>
                <td class="text-success" rowspan="{{ count($infopais['ciudades']) }}">
                    {{ $infopais["poblacion"] }}
                    millones hab.
                </td>
                @foreach($infopais["ciudades"] as $ciudad)
                <td class="text-info">
                    {{ $ciudad }}
                </td>
                </tr>
                @endforeach()
          
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
</body>
</html>