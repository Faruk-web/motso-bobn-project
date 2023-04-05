<!DOCTYPE html>
<html>
<head>
<title>Laravel Search</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
<h3>Simple Search</h3><br>
<form action="{{ route('vesselinfo.simple_search') }}" method="GET">
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Type the name" aria-describedby="basic-addon2" name="search">
<div class="input-group-append">
<button class="btn btn-secondary" type="submit">Search</button>
</div>
</div>
</form>
<form action="{{ route('vesselinfo.advance_search') }}" method="GET">
<h3>Advanced Search</h3><br>
<input type="text" name="name" class="form-control" placeholder="Person's name"><br>
<input type="text" name="skipper_name" class="form-control" placeholder="skipper_name"><br>
<label>Range of Age</label>
<div class="input-group">
<input type="date" name="start_date" class="form-control" placeholder="start date">
<input type="date" name="end_date" class="form-control" placeholder="end vdate">
{{-- <input type="date" name="yearly" class="form-control" placeholder="yearly"> --}}
</div><br>
<input type="submit" value="Search" class="btn btn-secondary">
</form>
</div>
<div class="col-md-8">
<h3>List of People</h3>
<table class="table table-striped">
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Age</th>
</tr>
@foreach($results as $pep)
{{-- @dd($pep); --}}
<tr>
<td>{{ $pep->id }}</td>
<td>{{ $pep->name }}</td>
<td>{{ $pep->skipper_name }}</td>
<td>{{ $pep->created_at }}</td>
</tr>
@endforeach
</table>
{{ $results->appends(request()->except('page'))->links() }}
</div>
</div>
</div>
</body>
</html>