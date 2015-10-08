{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('code', 'Code:') !!}
			{!! Form::text('code') !!}
		</li>
		<li>
			{!! Form::label('FK_user_id', 'FK_user_id:') !!}
			{!! Form::text('FK_user_id') !!}
		</li>
		<li>
			{!! Form::label('winning1_losing0', 'Winning1_losing0:') !!}
			{!! Form::text('winning1_losing0') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}