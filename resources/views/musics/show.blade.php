@extends ('layout')
@section('content')

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
						$url = asset('uploads/')."/".$v_music->original_filename; 
					 ?>
					<div class="col-md-5" style="border: ridge";>
							<div class="row" style="margin-top: 5px;">
									<img src="{{ URL::asset('img/2.jpg') }}" class="img-responsive" alt="Cinque Terre" width="100%" height="280px" >
							</div>
							<hr style="margin: 5px;">
							<div class="row">
								<div id="player">
									   <audio controls autoplay style="width: 470px;height: 40px;">
									    <source src="{!! $url !!}" type="audio/mpeg">
									               unsupported !!
									    			<?php $a=0; ?>
									   </audio>
									   <?php
											// Khởi tạo session PHP nếu chưa khởi tạo
											if (session_id() === ''  )
											session_start();

											if( isset( $_SESSION['counter'] )) {
											    $_SESSION['counter'] += 1;
											    $conn = new mysqli('localhost', 'root', '', 'dbonlinemusic');
											    $conn->query('UPDATE songtbl SET view= view + 1 ');
											}
											else {
											    $_SESSION['counter'] = 1;
											}
											
										?>
								</div>
							</div>
							<div class="row" style="margin-top: 15px;">
								<table class="table table-hover">
									<thead>
										
									</thead>
									<tbody>
										<tr>
											<th style="color: blue;">Song :</th>
											<td>{{ $v_music ->original_filename }}</td>
										</tr>
										<tr>
											<th style="color: blue;">Singser :</th>
											<td>{{ $v_music ->singer }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					<div class="col-md-6" style="border: ridge;margin-left: 50px;">
							<table class="table table-hover"  >
								<thead>
									<tr>
										<td colspan="3" style="font-weight: bold; text-align: center;color: blue;background-color: white;">Track information</td>
									</tr>
								</thead>
								<tbody >
									<tr>
											
										<th>Tên bài hát</th>
										<td>{{ $v_music ->original_filename }}</td>
									
									</tr>
									<tr>
										
										<th>Sáng tác</th>
										<td>{{ $v_music ->artist }}</td>
										
									</tr>
									<tr>
										
										<th>Ca sĩ</th>
										<td>{{ $v_music ->singer }}</td>
									</tr>
									<tr>
										<th>Thể loại</th>
										<td>{{ $v_music ->type }}</td>
									</tr>
									<tr>
										<th>Quốc gia</th>
										<td>{{ $v_music ->country }}</th>
									</tr>
									<tr>
										<th>Năm</th>
										<td>{{ $v_music ->year }}</td>
									</tr>
									<tr>
										
										<th>Lượt nghe</th>
										<td>
										<?php
											if( isset( $_SESSION['counter'] ) and $a=0 ) {
											    $_SESSION['counter'] += 1;
											    $conn = new mysqli('localhost', 'root', '', 'dbonlinemusic');
											    $conn->query('UPDATE songtbl SET view= view + 1 ');
											}
											else {
											    $_SESSION['counter'] = 1;
											}
										?>
										{{ $v_music ->view }}
										</td>
									</tr>
								</tbody>
						</table>
					</div>
				</div>
			</div>
			<hr style="color: #698B22 ">
			<h3 ><a href="">NGHE TIẾP</a></h3>
			<div class="row">
				<div class="col-md-5"><hr style="margin: 0px;border-color: #698B22"></div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<table class="table table-hover">
						<thead>
						</thead>
						<tbody>
							@foreach($v_track as $_song =>$song_value) 
									<tr>
										<td><a href="{{ URL ::to('musics/'.$song_value->id)}}">{!! $song_value->original_filename !!}</a></td>
										<td><img src="{{ URL::asset('')}}" alt="" width="25" height="25"></td>
									</tr>
							@endforeach 
						</tbody>
					</table>
					{!! $v_track->render() !!}
				</div>
			</div>
		</div>
	</body>
	</html>
@stop