<template>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Items</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Item Desc</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
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
            items: [],
            item: {},
            category_id:'',
            word: '',
        }
    },
    methods:{
        get_items(){
            axios.get('../item?category_id='+this.category_id+'&&word='+this.word).then(({data}) => {
                this.items = data;
            }).catch(() => {

            });
        },

    },

}
</script>

<style scoped>

</style>