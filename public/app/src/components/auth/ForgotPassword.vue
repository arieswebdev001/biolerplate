<template>

	<div class="container">
		<div style="max-width: 350px;margin: 50px auto;text-align: center;">
			<img src="images/app/logo.png" />  <br/>	
			<h3>Request Password Reset</h3>
			<br/>
			<div v-if="!success">
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Email" v-model="newUser.email" autocomplete="off">
				</div>
				<div>
					<button type="button" class="btn btn-info" @click="requestPassword($event)">Request</button>&nbsp;&nbsp;
					<a href="#/login" class="btn btn-outline-focus">Cancel</a>
				</div>
			</div>	
			<div class="alert alert-success" v-else>
				<h4>Request has been sent</h4>
				<p>Please check your email and follow the instructions.</p>
			</div>
		</div>
  </div>
</template>

<script>
export default {
  	name: 'ForgotPassword',
  	data () {
		return {
			newUser:{
				email:''
			},
			success:false
		}
	},
	methods:{
		requestPassword(event){
			let u = this;
			this.spinButton(event.target);
			this.$http.post('../../api/user/password', this.newUser)
				.then((response) => {
					u.success = true;
				}).catch(function (error) {
					if(error.response.data !== undefined)
						if(error.response.data.message !== undefined)
							toastr.error(error.response.data.message, "Failed to request new Password.");
				})
				.then(function () {
					u.stopButton(event.target)
				});
		}
	},
	mounted(){
		if(this.current_user !== null)
			this.redirectToHome();
	},
	computed:{
		current_user(){
			return this.$store.state.user;
		}
	}
}
</script>