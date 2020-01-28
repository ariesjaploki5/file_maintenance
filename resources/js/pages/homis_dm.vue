<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <h4>Drugs And Medicines <sub>Homis</sub></h4>
                        </div>
                        <div class="col-auto">
                            Search:
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" v-model="word" @keyup="get_homis_dms()">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="25%">Homis Desc</th>
                                <th>Unit</th>
                                <th width="10%">Item ID</th>
                                <th width="25%">Item Desc</th>
                                <th>Unit</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(homis_dm, index) in homis_dms" :key="index">
                                <td>{{ homis_dm.dmdcomb }}-{{ homis_dm.dmdctr }}</td>
                                <td>
                                    <div>{{ homis_dm.homis_desc }}</div>
                                    <div><small>{{ homis_dm.chrgdesc }}</small></div>
                                </td>
                                <td>{{ homis_dm.homis_unit_desc }}</td>
                                <td>{{ homis_dm.item_id }}</td>
                                <td>{{ homis_dm.item_desc }}</td>
                                <td>{{ homis_dm.unit_desc }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" type="button" @click="edit_homis_dm(homis_dm)">
                                        edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dmModal" tabindex="-1" role="dialog" aria-labelledby="dmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dmModalLabel">Edit Drugs And Medicines</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="update_homis_dm()">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Homis Description: 
                        </div>
                        <div class="col">
                            <span>{{ homis_dm.homis_desc }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Item:
                        </div>
                        <div class="col">
                            <select class="form-control form-control-sm" v-model="homis_dm.item_id">
                                <option v-for="item in items" :key="item.item_id" :value="item.item_id">{{ item.item_desc }} {{ item.unit_desc }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            items: [],
            categories: [],
            category_id: '',
            homis_dms: [],
            homis_dm: {},
            word: '',
        }
    },
    methods:{
        get_all(){
            this.get_items();
            this.get_homis_dms();
        },
        get_homis_dms(){
            axios.get('../homis_dm?word='+this.word).then(({data}) => {
                this.homis_dms = data;
            }).catch(() => {

            });
        },
        get_items(){
            axios.get('../item?category_id='+1).then(({data}) => {
                this.items = data;
            }).catch(() => {

            });
        },
        get_categories(){
            axios.get('../category').then(({data}) => {
                this.categories = data;
            }).catch(() => {

            });
        },
        edit_homis_dm(homis_dm){
            this.homis_dm = homis_dm;
            $("#dmModal").modal("show");
        },
        update_homis_dm(){
            axios.put('homis_dm/'+this.homis_dm.dmdcomb+'/'+this.homis_dm.dmdctr,{
                item_id: this.homis_dm.item_id,
            }).then(() => {
                $("#dmModal").modal("hide");
                this.get_homis_dms();
            })
        },
    },
    created(){
        this.get_all();
        this.get_categories();
    }

}
</script>

<style scoped>

</style>