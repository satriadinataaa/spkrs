<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="http://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" >
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <title>Hasil SPK Rumah Sakit</title>
    <script>
        
        $(document).ready( function () {
            $('#myTable').DataTable({
				"pageLength": 5,
				"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			});
			 $('#tabelNormalisasi').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_avg').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_pda').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_nda').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_wpda').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_wnda').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_akhir').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			 });
			 $('#edas_sorted').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 "order": [[ 6, "asc" ]]
			 });
			 $('#aras_matrix').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				
			 });
			 $('#aras_nmatrix').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 
			 });
			 $('#aras_nwmatrix').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 
			 });
			 $('#aras_optval').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 
			 });
			 $('#aras_ki').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 
			 });
			 $('#aras_sorted').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 "order": [[ 3, "asc" ]]
			 });
			 $('#edas_sorted2').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 "order": [[ 2, "asc" ]]
			 });
			 $('#aras_sorted2').DataTable({
				 "pageLength":5,
				 "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
				 "order": [[ 2, "asc" ]]
			 });
        } );
    </script>
  </head>
  <body>
	<?php
		function idr_curr($str){
			return number_format($str, 0, ",", ".");
		}
	?>

	<div>    <!-- As a heading -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url()?>">SPK Rumah Sakit</a>
        </div>
        </nav>
    </div>

   
	<!-- DATA SET -->
    <div class="container mt-3">
        <h1>Data Rumah Sakit</h1>
        <table id="myTable" class="table  table-bordered mt-3   " style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Rumah Sakit</th>
                    <th>Jarak</th>
                    <th>Biaya Normal</th>
                    <!-- <th>Biaya Caesar</th> -->
                    <th>Pelayanan</th>
                    <th>Fasilitas</th>
                </tr>
            </thead>
            <tbody>
				<?php 
				$i=1;
				foreach ($rs->result_array() as $row)
				{?>
					<tr>
						<td class="text-center"><?= $i ?></td>
						<td><?= $row['nama']?></td>
						<td class="text-center"><?= $row['jarak']?> Km</td>
						<td>Rp&nbsp;<?=  idr_curr($row['biaya_normal'])?> - Rp&nbsp;<?= idr_curr($row['biaya_normal2'])?></td>
						<!-- <td>Rp&nbsp;<?= idr_curr($row['biaya_caesar'])?> - Rp&nbsp;<?= idr_curr($row['biaya_caesar2'])?></td> -->
						<td class="text-center"><?= $row['pelayanan']?></td>
						<td class="text-center"><?= $row['fasilitas']?></td>
					</tr>
				<?php $i++;} ?>            
            </tbody>
        </table>
    </div>
    <div class="container">
        <hr>
    </div>
		
	<!-- Button Normalisasi -->
	<div class="container mb-5">
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#normalisasi" aria-expanded="false" aria-controls="normalisasi">
				Normalisasi
		</button>
		<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#edas" aria-expanded="false" aria-controls="edas">
				EDAS
		</button>
		<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#aras" aria-expanded="false" aria-controls="aras">
				ARAS
		</button>
		<button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#comparison" aria-expanded="false" aria-controls="comparison">
				Perbandingan
		</button>
	</div>

		<!-- TABEL HASIL NORMALISASI  -->
		<div class="container collapse mb-5" id="normalisasi">
			<div class="row">
					<!-- TABEL BOBOT -->
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Data Bobot</h6>
									<table id="tabelBobot" class="table  table-bordered mt-3   " style="width:100%">
											<thead>
													<tr>
															<th>No</th>
															<th>Kriteria</th>
															<th>Kategori</th>
															<th>Bobot</th>
															<th>Bobot Konversi</th>
															
													</tr>
											</thead>
											<tbody>
													<tr>
															<td>1</td>
															<td>Jarak</td>
															<td>COST</td>
															<td><?= $bobot['jarak'] * 100 ?> %</td>
															<td><?= $bobot['jarak']?></td>
													</tr>
													<tr>
															<td>2</td>
															<td>Biaya</td>
															<td>COST</td>
															<td><?= $bobot['biaya'] * 100 ?> %</td>
															<td><?= $bobot['biaya']?></td>
													</tr>
													<tr>
															<td>3</td>
															<td>Pelayanan</td>
															<td>BENEFIT</td>
															<td><?= $bobot['pelayanan'] * 100 ?> %</td>
															<td><?= $bobot['pelayanan']?></td>
													</tr>
													<tr>
															<td>4</td>
															<td>Fasilitas</td>
															<td>BENEFIT</td>
															<td><?= $bobot['fasilitas'] * 100 ?> %</td>
															<td><?= $bobot['fasilitas']?></td>
													</tr>								           
											</tbody>
									
									</table>
						</div>
					</div>
					<!-- TABEL HASIL NORMALISASI -->
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Hasil Normalisasi</h6>
									<table id="tabelNormalisasi" class="table  table-bordered mt-3">
											<thead>
													<tr>
															<th>No</th>
															<th>Alternatif</th>
															<th>Jarak</th>
															<th>Biaya Normal</th>
															<!-- <th>Biaya Caesar</th> -->
															<th>Pelayanan</th>
															<th>Fasilitas</th>
													</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($normalisasi);$i++){?>
													<tr>
															<td><?= ($i + 1) ?></td>
															<td>A<?= ($i+1) ?></td>
															<td><?= $normalisasi[$i]['jarak']?></td>
															<td><?= $normalisasi[$i]['biaya_normal'] ?></td>
															<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
															<td><?= $normalisasi[$i]['pelayanan'] ?></td>
															<td><?= $normalisasi[$i]['fasilitas'] ?></td>
													</tr>
											<?php } ?>						           
											</tbody>
									
									</table>
						</div>
					</div>
			</div>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#normalisasi" aria-expanded="false" aria-controls="normalisasi">
					Hide Normalisasi
			</button>
		</div>

		<div class="container collapse mb-5" id="edas">
			<div class="row">
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-1 :  Determine the average solution (Avj)</h6>
						<table id="edas_avg" class="table  table-bordered mt-3">
								<thead>
									<tr>
											
											<th rowspan="2">Weightage</th>
											<th><?= $bobot['jarak']?></th>
											<th><?= $bobot['biaya']?></th>
											<!--<th>Biaya Caesar (COST )</th>-->
											<th><?= $bobot['pelayanan']?></th>
											<th><?= $bobot['fasilitas']?></th>
									</tr>
									<tr>
											<th>Jarak (COST)</th>
											<th>Biaya Normal (COST )</th>
											<!--<th>Biaya Caesar (COST )</th>-->
											<th>Pelayanan (BENEFIT )</th>
											<th>Fasilitas ( BENEFIT) </th>
									</tr>
								</thead>
								<tbody>
									<?php for($i = 0; $i < count($normalisasi);$i++){?>
											<tr>
												<td>A<?= ($i+1) ?></td>
												<td><?= $normalisasi[$i]['jarak']?></td>
												<td><?= $normalisasi[$i]['biaya_normal'] ?></td>
												<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
												<td><?= $normalisasi[$i]['pelayanan'] ?></td>
												<td><?= $normalisasi[$i]['fasilitas'] ?></td>
											</tr>
									<?php } ?>								
								</tbody>
								<tfooter>
									<tr>	
										<th>AVJ</th>
										<th><?= $avj['jarak'] ?></th>
										<th><?= $avj['biaya_normal']?></>
										<!--<th>Biaya Caesar (COST )</th>-->
										<th><?= $avj['pelayanan']?></th>
										<th><?= $avj['fasilitas']?></th>
									</tr>
								</tfooter>
						
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-2- Calculate the positive distance from average (PDA)</h6>
						<table id="edas_pda" class="table  table-bordered mt-3">	
								<thead>
									<tr>	
										<th rowspan="2">Weightage</th>
										<th><?= $bobot['jarak']?></th>
										<th><?= $bobot['biaya']?></th>
										<!--<th>Biaya Caesar (COST )</th>-->
										<th><?= $bobot['pelayanan']?></th>
										<th><?= $bobot['fasilitas']?></th>
									</tr>
									<tr>
										<th>Jarak (COST)</th>
										<th>Biaya Normal (COST )</th>
										<!--<th>Biaya Caesar (COST )</th>-->
										<th>Pelayanan (BENEFIT )</th>
										<th>Fasilitas ( BENEFIT) </th>
									</tr>
								</thead>
								<tbody>
									<?php for($i = 0; $i < count($normalisasi);$i++){?>
										<tr>	
											<td>A<?= ($i+1) ?></td>
											<td><?= $pda_jarak[$i]?></td>
											<td><?= $pda_biaya_normal[$i] ?></td>
											<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
											<td><?= $pda_pelayanan[$i] ?></td>
											<td><?= $pda_fasilitas[$i]?></td>
										</tr>
									<?php } ?>	
																
								</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-3- Calculate the negative distance from average (NDA)</h6>
						<table id="edas_nda" class="table  table-bordered mt-3">
							<thead>
								<tr>	
									<th rowspan="2">Weightage</th>
									<th><?= $bobot['jarak']?></th>
									<th><?= $bobot['biaya']?></th>
									<!--<th>Biaya Caesar (COST )</th>-->
									<th><?= $bobot['pelayanan']?></th>
									<th><?= $bobot['fasilitas']?></th>
								</tr>
								<tr>
									<th>Jarak (COST)</th>
									<th>Biaya Normal (COST )</th>
									<!--<th>Biaya Caesar (COST )</th>-->
									<th>Pelayanan (BENEFIT )</th>
									<th>Fasilitas ( BENEFIT) </th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0; $i < count($normalisasi);$i++){?>
										<tr>
											<td>A<?= ($i+1) ?></td>
											<td><?= $nda_jarak[$i]?></td>
											<td><?= $nda_biaya_normal[$i] ?></td>
											<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
											<td><?= $nda_pelayanan[$i] ?></td>
											<td><?= $nda_fasilitas[$i]?></td>
										</tr>
								<?php } ?>	
															
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-4- Weighted sum of PDA</h6>
						<table id="edas_wpda" class="table  table-bordered mt-3">
							<thead>
								
								<tr>
									<th>Jarak (COST)</th>
									<th>Biaya Normal (COST )</th>
									<!--<th>Biaya Caesar (COST )</th>-->
									<th>Pelayanan (BENEFIT )</th>
									<th>Fasilitas ( BENEFIT) </th>
									<th>SPi</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0; $i < count($normalisasi);$i++){?>
										<tr>
											<td><?= $wpda_jarak[$i]?></td>
											<td><?= $wpda_biaya_normal[$i] ?></td>
											<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
											<td><?= $wpda_pelayanan[$i] ?></td>
											<td><?= $wpda_fasilitas[$i]?></td>
											<td><?= $wpda_SPI[$i]?></td>
										</tr>
								<?php } ?>	
															
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-5- Weighted sum of NDA</h6>
						<table id="edas_wnda" class="table  table-bordered mt-3">
							<thead>
								
								<tr>
									<th>Jarak (COST)</th>
									<th>Biaya Normal (COST )</th>
									<!--<th>Biaya Caesar (COST )</th>-->
									<th>Pelayanan (BENEFIT )</th>
									<th>Fasilitas ( BENEFIT) </th>
									<th>SNi</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0; $i < count($normalisasi);$i++){?>
										<tr>
											<td><?= $wnda_jarak[$i]?></td>
											<td><?= $wnda_biaya_normal[$i] ?></td>
											<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
											<td><?= $wnda_pelayanan[$i] ?></td>
											<td><?= $wnda_fasilitas[$i]?></td>
											<td><?= $wnda_SNI[$i]?></td>
										</tr>
								<?php } ?>	
															
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-6- NSP NSN And AS</h6>
						<table id="edas_akhir" class="table  table-bordered mt-3">
							<thead>
								
								<tr>
									<th>Rumah Sakit</th>
									<th>SPi</th>
									<th>SNi</th>
									<!--<th>Biaya Caesar (COST )</th>-->
									<th>NSPi</th>
									<th>NSNi</th>
									<th>ASi</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0; $i < count($rs_akhir);$i++){?>
										<tr>
											<td><?= $rs_akhir[$i]['nama']?></td>
											<td><?= $rs_akhir[$i]['SPI'] ?></td>
											<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
											<td><?= $rs_akhir[$i]['SNI'] ?></td>
											<td><?= $rs_akhir[$i]['NSPI']?></td>
											<td><?= $rs_akhir[$i]['NSNI']?></td>
											<td><?= $rs_akhir[$i]['ASI']?></td>
										</tr>
								<?php } ?>	
															
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="mt-3">
						<h6>Step-7 - SORTED DATA</h6>
						<table id="edas_sorted" class="table  table-bordered mt-3">
							<thead>
								
								<tr>
									<th>Rumah Sakit</th>
									<th>SPi</th>
									<th>SNi</th>
									<!--<th>Biaya Caesar (COST )</th>-->
									<th>NSPi</th>
									<th>NSNi</th>
									<th>ASi</th>
									<th>Rank</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0; $i < count($rs_sorted);$i++){?>
										<tr>
											<td><?= $rs_sorted[$i]['nama']?></td>
											<td><?= $rs_sorted[$i]['SPI'] ?></td>
											<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
											<td><?= $rs_sorted[$i]['SNI'] ?></td>
											<td><?= $rs_sorted[$i]['NSPI']?></td>
											<td><?= $rs_sorted[$i]['NSNI']?></td>
											<td><?= $rs_sorted[$i]['ASI']?></td>
											<td><?= $rs_sorted[$i]['rank']?></td>
										</tr>
								<?php } ?>	
															
							</tbody>
						</table>
					</div>
				</div>
				
				<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#edas" aria-expanded="false" aria-controls="edas">
				Hide EDAS
				</button>
			</div>														
		</div>

		<div class="container collapse mb-5" id="aras">
			<div class="row">
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Step-1- Developing the Initial Decision Matrix</h6>
									<table id="aras_matrix" class="table  table-bordered mt-3">
											<thead>
													<tr>
															<th>No</th>
															<th>Alternatif</th>
															<th>Jarak</th>
															<th>Biaya</th>
															<!--<th>Biaya Caesar</th>-->
															<th>Pelayanan</th>
															<th>Fasilitas</th>
													</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($normalisasi);$i++){?>
													<tr>
															<td><?= ($i + 1) ?></td>
															<td>A<?= ($i+1) ?></td>
															<td><?= $normalisasi[$i]['jarak']?></td>
															<td><?= $normalisasi[$i]['biaya_normal'] ?></td>
															<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
															<td><?= $normalisasi[$i]['pelayanan'] ?></td>
															<td><?= $normalisasi[$i]['fasilitas'] ?></td>
													</tr>
											<?php } ?>						           
											</tbody>
											<tfooter>
												<tr>
													<td colspan="2">OV</td>
													<td><?= $OV['jarak']?></td>
													<td><?= $OV['biaya']?></td>
													<td><?= $OV['pelayanan']?></td>
													<td><?= $OV['fasilitas']?></td>
												</tr>
												<tr>
													<td colspan="2">Total</td>
													<td><?= $OV['total']['jarak']?></td>
													<td><?= $OV['total']['biaya']?></td>
													<td><?= $OV['total']['pelayanan']?></td>
													<td><?= $OV['total']['fasilitas']?></td>
												</tr>
											</tfooter>
									
									</table>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Step-2 -  Normalize Decision Matrix</h6>
									<table id="aras_nmatrix" class="table  table-bordered mt-3">
											<thead>
												<tr>	
													<th rowspan="2">Weightage</th>
													<th><?= $bobot['jarak']?></th>
													<th><?= $bobot['biaya']?></th>
													<!--<th>Biaya Caesar (COST )</th>-->
													<th><?= $bobot['pelayanan']?></th>
													<th><?= $bobot['fasilitas']?></th>
												</tr>
												<tr>
													<th>Jarak (COST)</th>
													<th>Biaya Normal (COST )</th>
													<!--<th>Biaya Caesar (COST )</th>-->
													<th>Pelayanan (BENEFIT )</th>
													<th>Fasilitas ( BENEFIT) </th>
												</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($MND);$i++){?>
													<tr>
															
															<td>A<?= ($i+1) ?></td>
															<td><?= $MND[$i]['jarak']?></td>
															<td><?= $MND[$i]['biaya'] ?></td>
															<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
															<td><?= $MND[$i]['pelayanan'] ?></td>
															<td><?= $MND[$i]['fasilitas'] ?></td>
													</tr>
											<?php } ?>						           
											</tbody>
									</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Step-3 -  Normalize Matrix's Weight</h6>
									<table id="aras_nwmatrix" class="table  table-bordered mt-3">
											<thead>
												<tr>	
													<th rowspan="2">Weightage</th>
													<th><?= $bobot['jarak']?></th>
													<th><?= $bobot['biaya']?></th>
													<!--<th>Biaya Caesar (COST )</th>-->
													<th><?= $bobot['pelayanan']?></th>
													<th><?= $bobot['fasilitas']?></th>
												</tr>
												<tr>
													<th>Jarak (COST)</th>
													<th>Biaya Normal (COST )</th>
													<!--<th>Biaya Caesar (COST )</th>-->
													<th>Pelayanan (BENEFIT )</th>
													<th>Fasilitas ( BENEFIT) </th>
												</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($NBM);$i++){?>
													<tr>
															
															<td>A<?= ($i+1) ?></td>
															<td><?= $NBM[$i]['jarak']?></td>
															<td><?= $NBM[$i]['biaya'] ?></td>
															<!-- <td><?= $normalisasi[$i]['biaya_caesar'] ?></td> -->
															<td><?= $NBM[$i]['pelayanan'] ?></td>
															<td><?= $NBM[$i]['fasilitas'] ?></td>
													</tr>
											<?php } ?>						           
											</tbody>
									</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Step-4 -  Optimize Value Si</h6>
									<table id="aras_optval" class="table  table-bordered mt-3">
											<thead>
												<tr>	
													<th>Option</th>
													<th>Optimize Value</th>
												</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($OPT) -1;$i++){?>
													<tr>	
														<td>A<?= ($i+1) ?></td>
														<td><?= $OPT[$i]?></td>
													</tr>
											<?php } ?>						           
											</tbody>
											<tfooter>
												<tr>
													<td>SO</td>
													<td><?= $OPT['sum']?></td>
												</tr>
											</tfooter>
									</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Step-5 -  Utility Ki</h6>
									<table id="aras_ki" class="table  table-bordered mt-3">
											<thead>
												<tr>	
													<th>Nomor</th>
													<th>Rumah Sakit</th>
													<th>Alternative</th>
													<th>Ki</th>
												</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($KI);$i++){?>
													<tr>	
														<td><?= $i+1 ?></td>
														<td><?= $KI[$i]['nama'] ?></td>
														<td><?= $KI[$i]['alt'] ?></td>
														<td><?= $KI[$i]['KI'] ?></td>
													</tr>
											<?php } ?>						           
											</tbody>
											
									</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mt-3">
									<h6>Step-6 -  Ranking</h6>
									<table id="aras_sorted" class="table  table-bordered mt-3">
											<thead>
												<tr>	
													<th>Rumah Sakit</th>
													<th>Alternative</th>
													<th>Ki</th>
													<th>Rank</th>
												</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($rs_aras_sorted);$i++){?>
													<tr>	
														<td><?= $rs_aras_sorted[$i]['nama'] ?></td>
														<td><?= $rs_aras_sorted[$i]['alt'] ?></td>
														<td><?= $rs_aras_sorted[$i]['KI'] ?></td>
														<td><?= $rs_aras_sorted[$i]['rank']?></td>
													</tr>
											<?php } ?>						           
											</tbody>
											
									</table>
						</div>
					</div>
					<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#aras" aria-expanded="false" aria-controls="aras">
						Hide ARAS
					</button>
			</div>														
		</div>
		
		<div class="container collapse mb-5" id="comparison">
			<div class="row">
				<div class="col-md-12" >
						<div class="mt-3">
							<h6>EDAS SORTED DATA</h6>
							<table id="edas_sorted2" class="table  table-bordered mt-3">
								<thead>
									
									<tr>
										<th>Rumah Sakit</th>
										<th>ASi</th>
										<th>Rank</th>
									</tr>
								</thead>
								<tbody>
									<?php for($i = 0; $i < count($rs_sorted);$i++){?>
											<tr>
												<td><?= $rs_sorted[$i]['nama']?></td>
												<td><?= $rs_sorted[$i]['ASI']?></td>
												<td><?= $rs_sorted[$i]['rank']?></td>
											</tr>
									<?php } ?>	
																
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mt-3">
									<h6>ARAS SORTED DATA</h6>
									<table id="aras_sorted2" class="table  table-bordered mt-3">
											<thead>
												<tr>	
													<th>Rumah Sakit</th>
													<th>Ki</th>
													<th>Rank</th>
												</tr>
											</thead>
											<tbody>
											<?php for($i = 0; $i < count($rs_aras_sorted);$i++){?>
													<tr>	
														<td><?= $rs_aras_sorted[$i]['nama'] ?></td>
														<td><?= $rs_aras_sorted[$i]['KI'] ?></td>
														<td><?= $rs_aras_sorted[$i]['rank']?></td>
													</tr>
											<?php } ?>						           
											</tbody>
											
									</table>
						</div>
					</div>
			</div>
		</div>
	
    
    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
   
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>