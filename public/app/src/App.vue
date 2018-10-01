<template>
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header-view v-if="loaded" @logout="logout" v-if="user!== null"/>
		<!-- END: Header -->		
		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button  v-if="user!== null" class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
			<sidebar v-if="loaded" @logout="logout" v-if="user!== null"/>
			<!-- END: Left Aside -->							
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<!-- BEGIN: Subheader -->
				<page-header  v-if="user!== null" />
				<!-- END: Subheader -->		        
				<div class="m-content">
					<router-view v-if="loaded"/>		        
				</div>
			</div>
		</div>
		<!-- end:: Body -->
		<!-- begin::Footer -->
		<footer-view v-if="loaded"  v-if="user!== null"/>
		<!-- end::Footer -->		
	</div>
</template>
<script>
    import FooterView from './components/layout/FooterView.vue';
    import Sidebar from './components/layout/Sidebar.vue';
	import HeaderView from './components/layout/HeaderView.vue';
    import PageHeader from './components/layout/PageHeader.vue';
	
    export default {
		name: 'app',
		components:{ FooterView, Sidebar, HeaderView, PageHeader },
		data(){
			return {
				loaded:false
			}
		},
		methods:{
			logout(){
				let u = this;
				//this.sweetAlert("Are you sure you want to logout from the system?", function(){
					u.$store.commit('setUser', {user:null});
					window.localStorage.removeItem("access_token");
					u.redirectToLogin(); 
				//});
			},
			fetchUser(){
				let u = this;
				//check if logged in
				if(window.localStorage.access_token !== undefined){
					this.$http.get('../../api/user')
					.then(function (response) {
						u.$store.commit('setUser', {user:response.data.user});
						u.$store.commit('setConfigs', response.data.configs);
						u.app_name = response.data.app_name;
					if(u.$route.path === '/login' || u.$route.path === '/forgot-password')
						u.redirectToHome();
					})
					.catch(function (error) {
						u.$store.commit('setUser', {user:null});
						u.redirectToLogin();
						});
				}
				else{
					u.$store.commit('setUser', {user:null});
					u.redirectToLogin();
				}
			}
		},
		mounted(){
			let u = this;
			this.$http.defaults.headers.post['Content-Type'] = 'application/json';
			this.$http.defaults.headers.get['Accept'] = 'application/json';
			this.$http.defaults.headers.put['Accept'] = 'application/json';
			this.$http.defaults.headers.delete['Accept'] = 'application/json';
			this.$http.defaults.headers.get['Authorization'] = 'Bearer ' + window.localStorage.access_token;
			this.$http.defaults.headers.post['Authorization'] = 'Bearer ' + window.localStorage.access_token;
			this.$http.defaults.headers.put['Authorization'] = 'Bearer ' + window.localStorage.access_token;
			this.$http.defaults.headers.delete['Authorization'] = 'Bearer ' + window.localStorage.access_token;
			
			this.fetchUser();
			setTimeout(()=>{
				u.loaded = true;
				initTheme();
			},1000);
		},
		computed:{
			user(){
				return this.$store.state.user;
			},
			loaded(){
				return this.$store.state.loaded;
			}
		},
		watch:{
			$route (to, from){
				if((to.path !== '/login' && to.path !== '/forgot-password') && window.localStorage.access_token === undefined){
					this.redirectToLogin();
					this.$store.commit('setLoaded', false);
					window.location.reload();
				}
				window.document.title = this.app_name + ' - ' + this.$route.name;
			}
		} 
    }
</script>
<style>
    .modal-lg{
    	width:970px !important;
    }
    .table-bordered{
    	border:1px solid #a3aebd !important;
    }
    .vgt-input, .vgt-select, .vgt-table, .vgt-wrap__footer, .footer__row-count__label,.footer__navigation {
    	font-size:12px !important; 
    }
</style>