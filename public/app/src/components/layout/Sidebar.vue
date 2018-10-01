<template>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu"  class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
            <ul class="m-menu__nav ">
                <li :class="'m-menu__item ' + (page==='Dashboard'?'m-menu__item--active':'')" aria-haspopup="true" >
                    <a  href="#/dashboard" class="m-menu__link ">
                        <span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-text">Dashboard</span>
                    </a>
                </li>
                <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                    <a href="javascript:;" @click="logout" class="m-menu__link ">
                        <span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-settings"></i>
                        <span class="m-menu__link-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END: Aside Menu -->
    </div>
</template>
<script>
export default {
    name: 'Sidebar',
    data () {
        return {
        }
    },
    methods:{
        logout(){
            this.$emit('logout');
        }
    },
    computed:{
        page(){
            return this.$route.name;
        },
        user(){
            return this.$store.state.user;
        }
    }
}
</script>