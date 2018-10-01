<template>
    <vue-good-table
        mode="remote"
        @on-page-change="onPageChange"
        @on-sort-change="onSortChange"
        @on-column-filter="onColumnFilter"
        @on-per-page-change="onPerPageChange"
        :totalRows="totalRecords"
        :pagination-options="{
            enabled: true,
        }"
        :rows="remoteData.rows"
        :columns="remoteData.columns"
        @on-row-click="viewRow"
    />
</template>
<script>
import {VueGoodTable} from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'

export default{
    name: 'DataTable',
    props:[ 'remoteData', 'totalRecords' ],
    components:{ VueGoodTable },
    data () {
        return {}
    },
    methods:{
        updateParams(newProps) {
            this.remoteData.serverParams = Object.assign({}, this.remoteData.serverParams, newProps);
        },
        onPageChange(params) {
            this.updateParams({page: params.currentPage});
            this.$emit('updateData');
        },
        onPerPageChange(params) {
            this.updateParams({perPage: params.currentPerPage});
            this.$emit('updateData');
        },
        onSortChange(params) {
            this.updateParams({
                sort: {
                    type: params.sortType,
                    field: this.remoteData.columns[params.columnIndex].field,
                },
            });
            this.$emit('updateData');
        },
        onColumnFilter(params) {
            this.updateParams(params);
            this.$emit('updateData');
        },
        viewRow(row){
            this.$emit('viewRow', row);
        }
    }
}

</script>