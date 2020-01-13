<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <h4>SL CODES</h4>
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">Category</label>
                        </div>
                        <div class="col-3">
                            <select  class="form-control form-control-sm" v-model="category_id" @change="get_all()">
                                <option v-for="c in categories" :key="c.category_id" :value="c.category_id">{{ c.category_desc }}</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            Search:
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" v-model="word" @keyup="get_search()">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-dark">
                        <thead>
                            <tr>
                                <th width="12%">SL Code</th>
                                <th width="32%">SL Desc</th>
                                <th width="4%">Unit</th>
                                <th width="8%">Item Code</th>
                                <th width="32%">Item Desc</th>
                                <th width="4%">Unit</th>
                                <!-- <th width="4%">Brand</th> -->
                                <th width="4%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="sc in sl_codes" :key="sc.sl_code">
                                <td>{{ sc.sl_code }}</td>
                                <td>{{ sc.sl_description }}</td>
                                <td>{{ sc.unit_desc }}</td>
                                <td>{{ sc.item_id }}</td>
                                <td>{{ sc.item_desc }}</td>
                                <td>{{ sc.item_unit_desc }}</td>
                                <!-- <td>{{ sc.brand_desc }}</td> -->
                                <td>
                                    <button class="btn btn-sm btn-success" type="button" @click="edit_sl_code(sc)">
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
    <div class="modal fade" id="slCodeModal" tabindex="-1" role="dialog" aria-labelledby="slCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="slCodeModalLabel">Edit Sl Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="update_sl_code()">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Sl Code: 
                        </div>
                        <div class="col">
                            <span>{{ sl_code.sl_code }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Sl Description: 
                        </div>
                        <div class="col">
                            <span>{{ sl_code.sl_description }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Item:
                        </div>
                        <div class="col">
                            <select class="form-control form-control-sm" v-model="sl_code.item_id">
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
        return{
            sl_codes: [],
            items: [],
            brands: [],
            categories: [],
            sl_code: {
                item_id: '',
                brand_id: '',
            },
            category_id: '',
            word: '',
        }
    },
    methods:{
        get_all(){
            this.get_sl_codes();
            this.get_items();
        },
        get_search(){
            this.get_sl_codes();
        },
        get_categories(){
            axios.get('../category').then(({data}) => {
                this.categories = data;
            }).catch(() => {

            });
        },
        get_sl_codes(){
            axios.get('../sl_code?category_id='+this.category_id+'&&word='+this.word).then(({data}) => {
                this.sl_codes = data;
            }).catch(() => {

            })
        },
        get_items(){
            axios.get('../item?category_id='+this.category_id).then(({data}) => {
                this.items = data;
            }).catch(() => {

            });
        },
        get_brands(){
            axios.get('../brand').then(({data}) => {
                this.brands = data;
            }).catch(() => {

            });
        },
        edit_sl_code(sc){
            this.sl_code = sc;
            $('#slCodeModal').modal('show');
        },
        update_sl_code(){
            axios.put('../sl_code/'+this.sl_code.sl_code,{
                item_id: this.sl_code.item_id,
                brand_id: this.sl_code.brand_id,
            }).then(() => {
                $('#slCodeModal').modal('hide');
                this.get_sl_codes();
            }).catch(() => {

            });
        },
    },
    created(){
        this.get_categories();
        this.get_brands();
    }
}
</script>

<style>

</style>