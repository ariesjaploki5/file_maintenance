<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">.
                    <div class="row">
                        <div class="col-auto">
                            <h4>Drugs And Medicines</h4>
                        </div>
                        <div class="col-auto">
                            Search:
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" v-model="word" @keyup="get_items_dm()">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-dark table-bordered">
                        <thead>
                            <tr>
                                <th width="10%">Item ID</th>
                                <th width="30%">Item Desc</th>
                                <th>Unit</th>
                                <th width="10%">Homis ID</th>
                                <th width="30%">Homis Desc</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items_dm" :key="item.item_id" :class="{ 'bg-danger' : item.homis_dms.length == 0 }">
                                <td>{{ item.item_id }}</td>
                                <td>{{ item.item_desc }}</td>
                                <td>{{ item.unit_desc }}</td>
                                <td>
                                    <div class="row" v-for="(homis, index) in item.homis_dms" :key="index">
                                        <div class="col">
                                            <span  :class="{ 'bg-warning' : homis.dmdstat !== 'A' }">
                                                {{ homis.dmdcomb }}-{{ homis.dmdctr }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row" v-for="(homis, index) in item.homis_dms" :key="index">
                                        <div class="col">
                                            {{ homis.dmdesc }}
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            items_dm: [],
            item_dm: {
                item_id: '',
                homis_dms: [],
            },
            word: '',
        }
    },
    methods:{
        get_items_dm(){
            axios.get('../items_dm?category_id=1&&word='+this.word).then(({data}) => {
                this.items_dm = data;
            }).catch(() => {

            });
        },
        edit_item_dm(item_dm){
            this.item_dm = item_dm;
        },
        store_item_dm(){
            axios.post('../item_dm', {
                item_id: this.item_dm.item_id,
                homis_dm: this.item_dm.homis_dm,
            }).then(() => {
                this.get_items_dm();
            }).catch(() => {

            });
        }
    },
    created(){
        this.get_items_dm();
    }
}
</script>

<style scoped>
tbody{
    font-size: 12px !important;
}
</style>