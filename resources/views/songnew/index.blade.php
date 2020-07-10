@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body >
	<div class="container">
		<div class="row">
				<table id="myTable" class="table table-hover">
					<thead>
						<tr>
							<td colspan="6"><h3><a href="">BÀI HÁT HOT</a></h3></td>
						</tr>
						<tr style="background-color: #2E8B57;">
							<td style="color: white;font-weight: bold;">Bài hát</td>
							<td style="color: white;font-weight: bold;">Sáng tác</td>
							<td style="color: white;font-weight: bold;">Ca sĩ</td>
							<td style="color: white;font-weight: bold;">Thể loại</td>
							<td style="color: white;font-weight: bold;">Năm</td>
							<td style="color: white;font-weight: bold;">Quốc gia</td>
							<td style="color: white;font-weight: bold;">Lượt nghe</td>
						</tr>
					</thead>
					<tbody>
						@foreach($v_song as $song)
							
							<tr >
								<td><a href="{{ URL ::to('musics/'.$song->id)}}">{!! $song->original_filename !!}</a></td>
								<td>{{ $song->artist }}</td>
								<td>{{ $song->singer }}</td>
								<td>{{ $song->type }}</td>
								<td>{{ $song->year }}</td>
								<td>{{ $song->country }}</td>
								<td>{{ $song->view }}</td>
							</tr>
						@endforeach
					</tbody>

					
					<p>Click the button to sort the table numerically:</p>
					<p><button onclick="sortTable()">Sort</button></p>
										
					<script>
					function sortTable() {
					  var table, rows, switching, i, x, y, shouldSwitch;
					  table = document.getElementById("myTable");
					  switching = true;
					  /*Make a loop that will continue until
					  no switching has been done:*/
					  while (switching) {
					    //start by saying: no switching is done:
					    switching = false;
					    rows = table.rows;
					    /*Loop through all table rows (except the
					    first, which contains table headers):*/
					    for (i = 1; i < (rows.length - 1); i++) {
					      //start by saying there should be no switching:
					      shouldSwitch = false;
					      /*Get the two elements you want to compare,
					      one from current row and one from the next:*/
					      x = rows[i].getElementsByTagName("TD")[0];
					      y = rows[i + 1].getElementsByTagName("TD")[0];
					      //check if the two rows should switch place:
					      if (Number(x.innerHTML) > Number(y.innerHTML)) {
					        //if so, mark as a switch and break the loop:
					        shouldSwitch = true;
					        break;
					      }
					    }
					    if (shouldSwitch) {
					      /*If a switch has been marked, make the switch
					      and mark that a switch has been done:*/
					      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					      switching = true;
					    }
					  }
					}
					</script>

				</table>
				{!! $v_song->render() !!}
		</div>
	</div>
</body>
</html>
@stop