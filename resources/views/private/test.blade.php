<!DOCTYPE html>
<html>

<head>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto;
            background-color: #2196F3;
            padding: 20px;
        }

        .grid-item {
            margin-top: 20px;
            width: 650px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            height: 150px;
            font-size: 30px;
            text-align: center;
        }

        .foto {
            width: 300px;
            height: 400px;
        }
    </style>
</head>

@foreach ($data as $item)
    <div class="container-detail">
        <div class="grid-item">
            <table>
                <th>
                    <div class="item-container">
                        <img src="{{ asset('storage/foto/' . $item->foto) }}" class="foto" alt="User Image">
                    </div>
                </th>
                <th>
                    <div class="item-container">
                        <img src="{{ asset('storage/foto_ktp/' . $item->foto_ktp) }}" class="foto_ktp" alt="User Image">
                    </div>
                </th>
            </table>
        </div>
        <div class="grid-item">
            <table>
                <tr>
                    <th>Nama</th>
                    <td> : {{ $item->nama }}</td>
                </tr>
                <tr>
                    <th>Nomor KTP</th>
                    <td> : {{ $item->no_ktp }}</td>
                </tr>
                <tr>
                    <th>Umur</th>
                    <td> : {{ $item->umur }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td> : {{ $item->t_lahir }}</td>
                </tr>
                <tr>
                    <th>Plat Truk</th>
                    <td> : {{ $item->p_truk }}</td>
                </tr>
                <tr>
                    <th>Asal</th>
                    <td> : {{ $item->asal }}</td>
                </tr>
            </table>
@endforeach

<body>

    <h1>Grid Elements</h1>

    <p>A Grid Layout must have a parent element with the <em>display</em> property set to <em>grid</em> or
        <em>inline-grid</em>.
    </p>

    <p>Direct child element(s) of the grid container automatically becomes grid items.</p>

    <div class="grid-container">
        <table>
            <th>
                <div class="grid-item foto">1</div>
            </th>
            <th>
                <div class="grid-item">2</div>
            </th>
            <th>
                <div class="grid-item">2</div>
            </th>

        </table>
        <div class="grid-item">3</div>
        <div class="grid-item">4</div>
        <div class="grid-item">5</div>
    </div>

</body>

</html>
