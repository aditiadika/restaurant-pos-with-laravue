<template>
    <div class="wrapper menu-container">
        <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu Items</template>
                    <template slot="body">
                        <div class="section">
                            <multiselect v-model="menu" :options="categories"></multiselect>
                        </div>
                        <menu-groups :items="currentMenuItems"></menu-groups>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Items</template>
                    <template slot="body">
                        <menu-add-form :categories="categories"></menu-add-form>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import MenuGroups from './MenuGroups';
    import MenuAddForm from './MenuAddForm';

    export default {
        components: {MenuGroups, MenuAddForm},
        props: ['items'],
        component: [ MenuGroups ],
        data() {
            return {
                categories: [],
                menu: ''
            }
        },
        created() {
            console.log(this.items)
            _.forEach(this.items, (item, key) => {
                this.categories.push(key)
            })
            this.menu = this.categories[0]
        },
        computed: {
            currentMenuItems(){
                return this.items[this.menu]
            }
        }
    }
</script>

<style scoped>

</style>