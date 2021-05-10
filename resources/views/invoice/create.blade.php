@extends('layout.default')

@section('content')

@php
$clients = Auth::user()->clients;	
$products = Auth::user()->products;
@endphp
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
            <div class="card-header">
                <h3 class="card-title">
                    Dodajanje novega računa
                </h3>
            </div>
            <form method="" action="" encrypte="multipart/form-data">
                {{-- @csrf --}}
                <div class="card-body">
					<div class="my-5">
						<h3 class=" text-dark font-weight-bold mb-10">Informacije o stranki:</h3>
						<div class="form-group row">
							<label class="col-3" style="display: flex; margin-bottom: 0px; align-items: center;">Stranka</label>
							<div class="col-9">
								<select id="client_id"
                                    name="client_id"
                                    class="form-control"
                                    required>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"> 
                                            {{ $client->name }}                             
                                        </option>
                                    @endforeach  
                            </select>
							</div>
						</div>

						<h3 class=" text-dark font-weight-bold mb-10">Datumi:</h3>
						<div class="form-group row">
							<div class="col-lg-4">
								<label for="invoiceDate" class="control-label">Datum računa</label>
								<input  id="invoiceDate" 
										type="date"
										class="form-control @error('invoiceDate') is-invalid @enderror" 
										name="invoiceDate" 
										value="{{old('invoiceDate')}}"
										>
		
								@if ($errors->has('invoiceDate'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('invoiceDate') }}</strong>
									</span>
								@endif
							</div>

							<div class="col-lg-4">
								<label for="invoiceDateOfOrder" class="control-label">Datum naročila:</label>
								<input  id="invoiceDateOfOrder" 
										type="date"
										class="form-control @error('invoiceDateOfOrder') is-invalid @enderror" 
										name="invoiceDateOfOrder" 
										value="{{old('invoiceDateOfOrder')}}"
										>
		
								@if ($errors->has('invoiceDateOfOrder'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('invoiceDateOfOrder') }}</strong>
									</span>
								@endif
							</div>

							<div class="col-lg-4">
								<label for="invoiceDateOfMaturity" class="control-label">Datum zapadlosti:</label>
								<input  id="invoiceDateOfMaturity" 
										type="date"
										class="form-control @error('invoiceDateOfMaturity') is-invalid @enderror" 
										name="invoiceDateOfMaturity" 
										value="{{old('invoiceDateOfMaturity')}}"
										>
		
								@if ($errors->has('invoiceDateOfMaturity'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('invoiceDateOfMaturity') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label for="invoiceServiceFrom" class="control-label">Datum opr. storitve od:</label>
								<input  id="invoiceServiceFrom" 
										type="date"
										class="form-control @error('invoiceServiceFrom') is-invalid @enderror" 
										name="invoiceServiceFrom" 
										value="{{old('invoiceServiceFrom')}}"
										>
		
								@if ($errors->has('invoiceServiceFrom'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('invoiceServiceFrom') }}</strong>
									</span>
								@endif
							</div>
							<div class="col-lg-6">
								<label for="invoiceServiceUntil" class="control-label">Datum opr. storitve do:</label>
								<input  id="invoiceServiceUntil" 
										type="date"
										class="form-control @error('invoiceServiceUntil') is-invalid @enderror" 
										name="invoiceServiceUntil" 
										value="{{old('invoiceServiceUntil')}}"
										>
		
								@if ($errors->has('invoiceServiceUntil'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('invoiceServiceUntil') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="separator separator-dashed my-10"></div>
						<h3 class=" text-dark font-weight-bold mb-10">Postavke:</h3>
						<div class="form-group row">
							<table class="table table-striped table-hover" id="tab_logic">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">
                                            Izdelek
                                        </th>
                                        <th class="text-center">
                                            Količina
                                        </th>
                                        <th class="text-center">
                                            Znesek brez DDV
                                        </th>
                                        <th class="text-center">
                                            Popust
                                        </th>
                                        <th class="text-center">
                                            Davek
                                        </th>
                                        <th class="text-center" style="border-top: 1px solid white; border-right: 1px solid white;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="articlesTableRow hidden" data-id="0">
                                        <td id="item" data-name="item">
                                            <select name="item0" class="form-control" onchange="getTotals2()">
                                                <option value="">Izberi izdelek</option>
												@foreach ($products as $product)
													<option value="{{ $product->id }}" data-item-price="{{ $product->sellingPrice }}"> 
														{{ $product->name }}                             
													</option>
												@endforeach 
                                            </select>
                                        </td>
                                        <td id="quantity" data-name="quantity">
                                            <input id="kolicina" class="form-control" label="Količina" type="number" name='q0' min="1" step="1" value="1" onchange="getTotals2()" />
                                        </td>
                                        <td id="price" data-name="price">
                                            <input id="cena" type="text" name='price0' class="form-control" disabled />
                                        </td>
                                        <td id="disc" data-name="disc">
                                            <input class="form-control" type="number" name='disc0' min="0" step="0.1" value="0" onchange="getTotals2()" />
                                        </td>
                                        <td data-name="tax">
                                            <select id="davek" name="tax0" class="form-control" onchange="getTotals2()">
                                                <option value="22" data-item-taxRate="22">22 %</option>
                                                <option value="9.5" data-item-taxRate="9.5">9.5 %</option>
                                            </select>
                                        </td>

                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger flaticon-circle row-remove'></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a id="add_row" class="btn btn-success btn-circle btn-xl">
                                <i class="fas fa-plus"></i>
                            </a>
						</div>

						<div class="separator separator-dashed my-10"></div>
                        <div class="my-5">
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6">Skupaj brez DDV:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input id="skupaj-brez-ddv" class="form-control" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6">Popust:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input id="popust" class="form-control" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6">Znesek brez DDV:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input id="znesek-brez-ddv" class="form-control" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6 bold">Znesek z DDV:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input id="znesek-z-ddv" class="form-control" disabled />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
					</div>                    
                </div>
                <div class="card-footer">
                    <button id="js_add" type="submit" class="btn btn-primary">
                        {{ __('Shrani') }}
                    </button>
                    <a class="btn btn-secondary" href="/clients">Prekliči</a>
                </div>

                
                    </div>
                </div>
            </form>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>



<script>
    $(document).ready(function () {
        $('#client_id').select2();
    });
</script>

<script>
	var docId = -1;
	var skupajBrezDdv95 = 0;
	var skupajBrezDdv22 = 0;
	var znesekBrezDdv = 0;
	var znesekPopusti = 0;

	$("#js_add").click(function (e) {
		e.preventDefault();
		docId = -1;
		skupajBrezDdv95 = 0;
		skupajBrezDdv22 = 0;
		znesekBrezDdv = 0;
		znesekPopusti = 0;
		getTotals();

		var newDocument = {};
		//stranka
		newDocument.clientId = parseInt($('#client_id').val());

		//račun
		newDocument.invoiceDate = $('#invoiceDate').val() === "" ? null : $('#invoiceDate').val();
		newDocument.invoiceServiceFrom = $('#invoiceServiceFrom').val() === "" ? null : $('#invoiceServiceFrom').val();
		newDocument.invoiceServiceUntil = $('#invoiceServiceUntil').val() === "" ? null : $('#invoiceServiceUntil').val();
		newDocument.invoiceDateOfMaturity = $('#invoiceDateOfMaturity').val() === "" ? null : $('#invoiceDateOfMaturity').val();;
		newDocument.invoiceDateOfOrder = $('#invoiceDateOfOrder').val() === "" ? null : $('#invoiceDateOfOrder').val();

		//cene
		newDocument.totalExcludingVAT = parseFloat(znesekBrezDdv);
		newDocument.discountAmount = parseFloat(znesekPopusti);
		newDocument.amountExludingVAT = parseFloat(znesekBrezDdv - znesekPopusti);
		newDocument.amountIncludingVAT = parseFloat((znesekBrezDdv - znesekPopusti) + (skupajBrezDdv95 * 0.095) + (skupajBrezDdv22 * 0.22));
		newDocument.paidAmount = 0;

		//JSON string
		var documentJson = JSON.stringify(newDocument);
		//console.log(newDocument);
		console.log(documentJson);
		//bootbox.alert("neki");
		//alert(documentJson);

		$.ajax({
			headers: { "api_token" : "{{auth()->user()->api_token}}" },
            url: "/api/user/{{auth()->user()->id}}/invoice",
			data: documentJson,
			contentType: "application/json",
			method: "POST",
			success: function (data) {
				var docId = data['new_id'];
				bootbox.alert("Račun s št. " + docId + " je bil uspešno ustvarjen!");
				//articles(docId);
				//console.log("invoice post");
			},
			fail: function (data) {
				bootbox.alert("Prišlo je do napake pri ustvarjanju dokumenta: (" + data + ")");
			},
			error: function (jqXHR, textStatus, errorThrown) {
				bootbox.alert("Prišlo je do napake: " + jqXHR.status + " (" + errorThrown + ") pri ustvarjanju dokumenta.");
			},
		});
	});

	function getTotals() {
		var articlesList = [];

		$.each($("#tab_logic tbody tr"), function () {
			var neki = {};
			neki.documentId = docId;
			neki.productId = $(this).find('td:eq(0) select').val();
			neki.quantity = $(this).find('td:eq(1) input').val();
			neki.discount = $(this).find('td:eq(3) input').val();
			neki.taxRate = $(this).find('td:eq(4) select').find(':selected').attr('data-item-taxRate');
			var total = neki.quantity * $(this).find('td:eq(0) select').find(':selected').attr('data-item-price');
			if (!isNaN(total)) {
				znesekBrezDdv += eval(total);
				neki.price = total - (total * neki.discount / 100);
				znesekPopusti += total * neki.discount / 100;

				if (neki.taxRate == "9.5") {
					skupajBrezDdv95 += neki.price;
				}
				else if (neki.taxRate == "22") {
					skupajBrezDdv22 += neki.price;
				}
			}
			//console.log("znesek brez ddv: " + eval(znesekBrezDdv));

			
			articlesList.push(neki);
		});
	}

	function getTotals2() {
		var skupajBrezDdv95 = 0;
		var skupajBrezDdv22 = 0;
		var znesekBrezDdv = 0;
		var znesekPopusti = 0;
		var articlesList = [];

		$.each($("#tab_logic tbody tr"), function () {
			var neki = {};
			neki.documentId = docId;
			neki.productId = $(this).find('td:eq(0) select').val();
			neki.quantity = $(this).find('td:eq(1) input').val();
			neki.discount = $(this).find('td:eq(3) input').val();
			neki.taxRate = $(this).find('td:eq(4) select').find(':selected').attr('data-item-taxRate');
			var total = neki.quantity * $(this).find('td:eq(0) select').find(':selected').attr('data-item-price');


			if (!isNaN(total)) {
				znesekBrezDdv += eval(total);
			}
			neki.price = total - (total * neki.discount / 100);
			znesekPopusti += total * neki.discount / 100;

			$(this).find('td:eq(2) input').val(neki.price.toFixed(2) + " €");


			if (neki.taxRate == "9.5") {
				skupajBrezDdv95 += neki.price;
			}
			else if (neki.taxRate == "22") {
				skupajBrezDdv22 += neki.price;
			}
			//console.log("znesek brez ddv: " + eval(znesekBrezDdv));

			
			articlesList.push(neki);
		});

		$("#skupaj-brez-ddv").val(parseFloat(znesekBrezDdv).toFixed(2));
		$("#popust").val(parseFloat(znesekPopusti).toFixed(2));
		$("#znesek-brez-ddv").val(parseFloat(znesekBrezDdv - znesekPopusti).toFixed(2));
		$("#znesek-z-ddv").val(parseFloat((znesekBrezDdv - znesekPopusti) + (skupajBrezDdv95 * 0.095) + (skupajBrezDdv22 * 0.22)).toFixed(2));
	}

	$("#tab_logic").on("click", function () {
		getTotals2();
	});

	function articles(docId) {
		var postObject = {};
		postObject.documentId = parseInt(docId);

		var articlesList = [];
		$.each($("#tab_logic tbody tr"), function () {
			var neki = {};
			neki.documentId = docId;
			neki.productId = parseInt($(this).find('td:eq(0) select').val());
			neki.quantity = parseInt($(this).find('td:eq(1) input').val());
			neki.discount = parseFloat($(this).find('td:eq(3) input').val());
			neki.taxRate = parseFloat($(this).find('td:eq(4) select').find(':selected').attr('data-item-taxRate'));
			var total = neki.quantity * $(this).find('td:eq(0) select').find(':selected').attr('data-item-price');
			znesekBrezDdv += total;
			neki.price = total - (total * neki.discount / 100);
			znesekPopusti += total * neki.discount / 100;

			if (neki.taxRate == "9.5") {
				skupajBrezDdv95 += neki.price;
			}
			else if (neki.taxRate == "22") {
				skupajBrezDdv22 += neki.price;
			}
			articlesList.push(neki);
		});

		postObject.articles = articlesList;
		//var articlesJson = JSON.stringify(articlesList);
		var articlesJson = JSON.stringify(postObject);
		console.log(articlesJson);
		$.ajax({
			url: "/api/articles/" + docId,
			contentType: "application/json",
			data: articlesJson,
			method: "POST",
			success: function () {
				bootbox.confirm("Dokument s št. '" + docId + "' je bil uspešno ustvarjen!", function (result) {
					location.href = "/document/details/" + docId;
				});
				
			},
			fail: function (data) {
				bootbox.alert("Prišlo je do napake (" + data + ")");
			},
			error: function (jqXHR, textStatus, errorThrown) {
				bootbox.alert("Prišlo je do napake: " + jqXHR.status + " (" + errorThrown + ") pri dodajanju postavk. Preverite vnosna polja pri postavkah!");
				$.ajax({
					url: "/api/document/" + docId,
					method: "DELETE",
					success: function () {
						
					}
				});
			},
		});
	}
</script>

<script>
	$(document).ready(function () {
		$("#add_row").on("click",
			function () {
				// Dynamic Rows Code
				// Get max row id and set new id
				var newid = 0;
				$.each($("#tab_logic tr"),
					function () {
						if (parseInt($(this).data("id")) > newid) {
							newid = parseInt($(this).data("id"));
						}
					});
				newid++;
				var tr = $("<tr></tr>",
					{
						id: "addr" + newid,
						"data-id": newid
					});
				// loop through each td and create new elements with name of newid
				$.each($("#tab_logic tbody tr:nth(0) td"),
					function () {
						var td;
						var cur_td = $(this);
						var children = cur_td.children();
						// add new td and element if it has a nane
						if ($(this).data("name") !== undefined) {
							td = $("<td></td>",
								{
									"data-name": $(cur_td).data("name"),
								});
							var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
							c.attr("name", $(cur_td).data("name") + newid);
							c.appendTo($(td));
							td.appendTo($(tr));
						} else {
							td = $("<td></td>",
								{
									'text': $('#tab_logic tr').length
								}).appendTo($(tr));
						}
					});
				// add delete button and td
				/*
				$("<td></td>").append(
					$("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
						.click(function() {
							$(this).closest("tr").remove();
						})
				).appendTo($(tr));
				*/
				// add the new row
				$(tr).appendTo($('#tab_logic'));
				$(tr).find("td button.row-remove").on("click",
					function () {
						$(this).closest("tr").remove();
					});
				$("#addr" + newid).find('td:eq(1) input').val(1);
				$("#addr" + newid).find('td:eq(3) input').val(0);
				$("#addr" + newid).find('td:eq(4) select').val("22");
			});
	});
</script>
@endsection
