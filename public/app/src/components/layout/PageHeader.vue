<template>
<div class="m-subheader " style="padding-top: 15px;">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator" v-if="page !== undefined">{{ page }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                    <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>
<script>
export default{
    name:'PageHeader',
    computed:{
        page(){
            return this.$route.name;
        }
    }
}
</script>