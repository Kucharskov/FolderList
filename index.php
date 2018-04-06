<?php
/***************************************************************************
 *
 *	FolderList v3.0 (https://github.com/Kucharskov/FolderList)
 *	with love by M. Kucharskov (http://kucharskov.pl)
 *	Idea: Encode Explorer (http://encode-explorer.siineiolekala.net)
 *
 *	This is free software and it's distributed under Creative Commons BY-NC-SA License.
 *
 *	FolderList is written in the hopes that it can be useful to people.
 *	It has NO WARRANTY and when you use it, the author is not responsible
 *	for how it works (or doesn't).
 *
 *	The icon images are designed by Mark James (http://www.famfamfam.com) 
 *	and distributed under the Creative Commons Attribution 3.0 License.
 *
 ***************************************************************************/
 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
	<!--
	.card { overflow: hidden; }
	.card .card-header .breadcrumb { background: none; }
	.table tr td.size { text-align: right; }
	.table tr td img { text-align: center; vertical-align: baseline; }
	.table tr td a { display: block; width: auto; height: auto; }
	.table tr.table-danger td { color: #F00; }
	-->
	</style>

	<title>Page powered by FolderList</title>
</head>
<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mt-3">
<div class="card">
	<div class="card-header text-center">
		<h1>Page powered by FolderList</h1>
		<p class="h4 text-muted">List any file of the folder</p>
		
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-0 m-0 mt-3">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data</li>
			</ol>
		</nav>		
	</div>
	<div class="card-body p-0">
		<table class="table table-striped table-hover table-sm table-responsive m-0">
			<thead class="text-center">
				<tr>
					<th scope="col">#</th>
					<th scope="col" class="col-10">Name</th>
					<th scope="col">Size</th>
				</tr>
			</thead>
			<tbody>

<tr class="table-danger">
<td><img src="http://folderlist.kucharskov.pl/?img=warning"></td>
<td colspan="2">You dont have access to selected folder!</td>
</tr>

<tr>
<td><img src="https://folderlist.kucharskov.pl/?img=folder"></td>
<td colspan="2"><a href="#">Some folder</a></td>
</tr>

<tr>
<td><img src="https://folderlist.kucharskov.pl/?img=none"></td>
<td><a href="#">Unsupported type file</a></td>
<td class="size">0&nbsp;B</td>
</tr>

			</tbody>
		</table>
	</div>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 text-center mb-3">
	<a target="_blank" href="https://github.com/Kucharskov/FolderList">FolderList</a>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>