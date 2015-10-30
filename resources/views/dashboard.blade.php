@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

	<div class="container">
        <div class="dashboard">
            <div class="row">
            	<div class="col-md-12">
            		<div class="table-responsive">          
					  <table class="table">
					    <thead>
					      <tr>
					        <th>Naam</th>
					        <th>Email</th>
					        <th>Stad</th>
					        <th>Ip adres</th>
					        <th>Status</th>
					      </tr>
					    </thead>
					    <tbody>
					    @foreach($users as $user)

					    @if($user->deleted_at != NULL)
					      <tr class="danger">
					    @else
					      <tr>
					    @endif
					        	<td>{{$user->name}}</td>
					        	<td>{{$user->email}}</td>
					        	<td>{{$user->city}}</td>
					        	<td>{{$user->ipAddress}}</td>
					        	@if($user->deleted_at != NULL)
							      <td><a href="/dashboard/restore/{{$user->id}}">Kwalificeren</a></td>
							    @else
							      <td><a href="/dashboard/delete/{{$user->id}}">Diskwalificeren</a></td>
							    @endif
					        	
					      </tr>
					    @endforeach
					    </tbody>
					  </table>
					  </div>
            	</div>
            </div>
        </div>
       </div>

@stop