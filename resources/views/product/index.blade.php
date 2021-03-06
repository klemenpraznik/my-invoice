@extends('layout.default')

@section('content')
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Izdelki
                    </h3>
                    <div style="display: grid; align-items: center;">
                        <a href="product/create" class="btn btn-primary">Dodaj izdelek</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="clients" class="hover table table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Šifra</th>
                                <th scope="col">Ime izdelka</th>
                                <th scope="col">Kategorija</th>
                                <th scope="col">Prodajna cena</th>
                                <th scope="col">Tip</th>
                                <th scope="col" data-priority="2">Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function () {
        $.noConflict();
        var table = $("#clients").DataTable({
            ajax: {
                headers: { "api_token" : "{{auth()->user()->api_token}}" },
                url: "/api/user/{{auth()->user()->id}}/products",
                dataSrc: ""
            },
            columns: [
                {
                    data: "id",
                    width: 30
                },
                {
                    data: "shortName",
                    defaultContent: "",
                    width: 50
                },
                {
                    data: "name",
                    render: function (data, type, product) {
                        return "<b>" + data + "</b>";
                    },
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    data: "category.name",
                    defaultContent: "",
                },
                {
                    data: "sellingPrice",
                    defaultContent: "",
                    render: function (data, type, product) {
                        return data + " €";
                    },
                    width: 50
                },
                {
                    data: "type",
                    render: function (data, type, product) {
                        if (data == "Storitev") {
                            return "<span class='label font-weight-bold label-lg label-light-info label-inline'>" + data + "</span>";
                        }
                        return "<span class='label font-weight-bold label-lg label-light-primary label-inline'>" + data + "</span>"
                    },
                    width: 40
                },
                {
                    data: "id",
                    render: function (data, type, category) {
                        return  "<a class='btn btn-sm btn-clean btn-icon mr-2' href='/product/details/" + category.id + "'><span class='svg-icon svg-icon-md'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'><g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd><rect x='0' y='0' width='24' height='24'></rect><path d='M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z' fill='#000000'></path></g></svg></span></a>" +
                                "<a class='btn btn-sm btn-clean btn-icon mr-2' href='/product/edit/" + category.id + "'><span class='svg-icon svg-icon-md'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'><g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd><rect x='0' y='0' width='24' height='24'></rect><path d='M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z' fill='#000000' fill-rule='nonzero' transform='translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409)'></path><rect fill='#000000' opacity='0.3' x='5' y='20' width='15' height='2' rx='1'></rect></g></svg></span></a>" +
                                "<a class='btn btn-sm btn-clean btn-icon mr-2 js-delete' data-category-id=" + data + "><span class='svg-icon svg-icon-md'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>	 <g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>	 <rect x='0' y='0' width='24' height='24'></rect>	 <path d='M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z' fill='#000000' fill-rule='nonzero'></path><path d='M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z' fill='#000000' opacity='0.3'></path></g></svg></span></a>";
                    },
                    orderable: false,
                    width: 100,
                    searchable: false
                }
            ],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Slovenian.json"
            },
            autoWidth: true,
            responsive: true
        });
        $("#clients").on("click", ".js-delete",
            function () {
                var button = $(this);
                bootbox.confirm("Ali ste pripričani, da želite izbrisati ta izdelek?",
                    function (result) {
                        if (result) {
                            $.ajax({
                                headers: { "api_token" : "{{auth()->user()->api_token}}" },
                                url: "/api/user/{{auth()->user()->id}}/product/" + button.attr("data-category-id"),
                                method: "DELETE",
                                success: function () {
                                    button.parents("tr").remove();
                                }
                            });
                        }
                    });
            });
    })
</script>
@endsection