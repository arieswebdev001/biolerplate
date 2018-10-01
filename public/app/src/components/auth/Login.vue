<template>
	<div class="container">
		<div style="max-width: 350px;margin: 50px auto;text-align: center;">
			<img src="images/app/logo.png" />  	
			<br/>
			<h3>Login To Your Account</h3>
			<br/>
			<div>
				<div class="form-group">
					<input class="form-control" type="email" v-model="user.email" placeholder="Email" name="email" autocomplete="off">
				</div>
				<div class="form-group">
					<input class="form-control" v-model="user.password" type="password" placeholder="Password" name="password">
				</div>
				<div>
					<div>
						<a href="#/forgot-password">Forgot Password ?</a>
						<br/><br/>
					</div>
				</div>
				<div>
					<button class="btn btn-success" type="button" @click="login($event)">Login</button>
				</div>
			</div>	
		</div>
 	 </div>
</template>

<script>
export default {
	name: 'Login',
	data () {
		return {
				user:{
					email:'',
					password:'',
				}
			}
	},
	mounted(){
		if(this.current_user !== null)
			this.redirectToHome();
	},
	methods:{
		login(event){
			let u = this;
			this.spinButton(event.target);
			this.$http.post('../../api/user/login', this.user)
				.then((response) => {
					window.localStorage.setItem("access_token", response.data.access_token);
					window.localStorage.setItem("refresh_token", response.data.refresh_token);
					u.redirectToHome();
					window.location.reload();
				}).catch(function (error) {
					if(error.response.data !== undefined)
						if(error.response.data.message !== undefined)
							toastr.error(error.response.data.message, "Login attempt failed");
				})
				.then(function () {
					u.stopButton(event.target)
				});
		}
	},
	computed:{
		current_user(){
			return this.$store.state.user;
		}
	}
}
</script>