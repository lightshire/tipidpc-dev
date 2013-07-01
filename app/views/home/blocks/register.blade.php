<div class="register-form">
	<div class="row-fluid">
		<div class="span12 well">
			<div class="span6">
				@if(Session::get('error'))
					<div class="alert alert-error">
						<i class="icon-exclamation-sign">&nbsp;</i>&nbsp;{{Session::get('error')}}
					</div>
				@endif
				@if(Session::get('success'))
					<div class="alert alert-success">
						<i class="icon-ok-sign">&nbsp;</i>&nbsp;{{ Session::get('success') }}
					</div>
				@endif
				<form action="{{ URL::to('register') }}" method="POST">
					{{ Form::token() }}
					<h3> Register Now</h3>
						<input type="text" name="email" class="span12" placeholder="Email Address"/>
						<input type="text" name="username" class="span12" placeholder="Username"/>
					<div class="row-fluid span12" style="margin-left:0px;">
						<input type="password" name="password" class="span6" style="margin" placeholder="Password" />
						<input type="password" name="password2" class="span6 pull-right" placeholder="Repeat Password" />
					</div>
					<div class="button-group pull-right">
						<button class="btn btn-success" type="submit">Register</button>
					</div>
				</form>
			</div>
			<div class="span6">
				<h3> Login</h3>
					<input type="text" name="username" class="span12" placeholder="Username"/>
					<input type="text" name="password" class="span12" placeholder="Password"/>
					<ul class="inline pull-left">
						<li><a href="/forgot">Forgot Password? </a></li>
					</ul>
					<div class="pull-right">
						<button class="btn btn-success" type="submit">Login</button>
					</div>
			</div>
		</div>
	</div>
</div>