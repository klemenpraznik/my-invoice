<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Racun - {{ $invoice->id }}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #1e1e2d;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{ $invoice->client->name}}</h3>
<pre>
{{ $invoice->client->address}},{{ $invoice->client->country}}
{{ $invoice->client->phone}}
{{ $invoice->client->email}}
</pre>


            </td>
            <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>CompanyName</h3>
                <pre>
                    Street 26
                    123456 City
                    United Kingdom
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Racun št.: {{ $invoice->id}}</h3>
    <pre style="font-size: 12px;">
    Datum racuna: {{ date('d.m.Y', strtotime($invoice->invoiceDate)) }}
    Datum opr. storitve od: {{ date('d.m.Y', strtotime($invoice->invoiceServiceFrom)) }}
    Datum opr. storitve do: {{ date('d.m.Y', strtotime($invoice->invoiceServiceUntil)) }}
    Datum narocila: {{ date('d.m.Y', strtotime($invoice->invoiceDateOfOrder)) }}
    Datum zapadlosti: {{ date('d.m.Y', strtotime($invoice->invoiceDateOfMaturity)) }}
    </pre>
    <table width="100%">
        <thead>
        <tr style="background-color:#1e1e2d; color:#fff">
            <th align="left">Produkt</th>
            <th align="left">Kolicina</th>
            <th align="left">Cena brez DDV</th>
            <th align="left">Popust</th>
            <th align="left">DDV</th>
        </tr>
        </thead>
        <tbody>
            @if (count($invoice->articles) == 0)
                Račun nima postavk! 
            @endif
            @foreach ($invoice->articles as $article)
                <tr>
                    <td align="left">{{ $article->product->name }}</td>
                    <td align="left">{{ $article->quantity }} {{ $article->product->unitOfMeasure}}</td>
                    <td align="left">{{ $article->price }} €</td>
                    <td align="left">{{ $article->discount }} %</td>
                    <td align="left">{{ $article->taxRate }} %</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <pre style="font-size: 14px;">
    Skupaj brez DDV: {{ $invoice->totalExcludingVAT }} €
    Popust: {{ $invoice->discountAmount }} €
    Znesek brez DDV: {{ $invoice->amountExludingVAT }} €
    </pre>
    <div style="padding-left: 1em;"><b>Znesek z DDV: {{ $invoice->amountIncludingVAT }} €</b></div>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }}
            </td>
            <td align="right" style="width: 50%;">
                <i>My Invoice</i>
            </td>
        </tr>

    </table>
</div>
</body>
</html>