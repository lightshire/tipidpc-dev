<div class="row-fluid">
	<div class="span4" style="padding:10px;">
		<div class="row-fluid" style="margin-bottom:10px;">
			<div class="span12">
				<div class="box-dotted">
					<h3>Login Details</h3>
					@if(Session::get('password-error'))
						<div class="alert alert-error">
							{{ Session::get('password-error') }}
						</div>
					@elseif(Session::get('password-success'))
						<div class="alert alert-success">
							{{ Session::get('password-success') }}
						</div>
					@endif
					<div class="row-fluid">
						<input type="hidden" name="type" value="credentials" />
						<input type="text" name="username" value="{{ Auth::user()->username }}" disabled="disabled" class="disabled span12" />
						<a class="btn btn-mini btn-info" href="#changePassword" data-toggle="modal">New Password</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid" style="margin-bottom:10px;">
			<div class="span12">
				<div class="box-dotted">
					<h3>Avatar</h3>
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
						<div>
							<span class="btn btn-file btn-mini btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
							<a href="#" class="btn fileupload-exists btn-mini btn-danger" data-dismiss="fileupload">Remove</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="span8" style="padding:10px;">
		<div class="box-dotted">
			<h3>User Details</h3>
			@if(Session::get('details-success'))
				<div class="alert alert-success">
					{{ Session::get('details-success') }}
				</div>
			@elseif(Session::get('details-error'))
				<div class="alert alert-danger">
					{{ Session::get('details-error') }}
				</div>
			@endif
			<form action="{{ URL::to('/usercp/profile') }}" method="post">
				{{ Form::token() }}
				<input type="hidden" name="type" value="change-details" class="span12"/>
				<input type="text" name="first_name"  placeholder="First Name" class="span12" value="{{ Auth::user()->info->first_name }}"/>
				<input type="text" name="middle_name"  placeholder="Middle Name"class="span12"  value="{{ Auth::user()->info->middle_name }}"/>
				<input type="text" name="last_name"  placeholder="Last Name" class="span12"  value="{{ Auth::user()->info->last_name }}"/>
				<hr/>
				<input type="text" name="email"  placeholder="Email Address" class="span12"  value="{{ Auth::user()->info->email }}"/>
				<input type="text" name="phone"  placeholder="Phone" class="span12"  value="{{ Auth::user()->info->phone }}"/>
				<input type="text" name="location"  placeholder="Location" class="span12"  value="{{ Auth::user()->info->location }}"/>
				<button class="btn btn-mini btn-info pull-right" type="submit">Save</button>
			</form>
		</div>
	</div>
</div>

<!--user change password modal (s) -->
<div id="changePassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Change Password</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="alert alert-info">
					When modifying your password be sure to also input your
current password then your custom password in the text fields.
				</div>
			</div>
			<form action="{{ URL::to('/usercp/profile') }}" method="post">
				{{ Form::token() }}
				<input type="hidden" name="type" value="change-password" />
				<input type="password" name="currentPassword" class="span12" placeholder="Current Password" />
				<input type="password" name="password" class="span12" placeholder="New Password"/>
				<input type="password" name="password2" class="span12" placeholder="Repeat Password"/>
				<button class="btn btn-success pull-right" type"submit">Renew</button>
			</form>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-mini btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
<!--user change password modal (e) -->