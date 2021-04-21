<template>
    <div class="filter-space">
        <form method='' action='/posts/filter'>
            Filter <br>
            <div>
                <div>Breed</div>
                <label><input type='checkbox' name='breed'>Labrador</label>
                <br><label><input type='checkbox' name='breed'>Shih Tzu</label>
                <br><label><input type='checkbox' name='breed'>Terrier</label>
                <br><label><input type='checkbox' name='breed'>German Shepherd</label>
                <br><label><input type='checkbox' name='breed'>Shiba Inu</label>
            </div><br>
            <div>
                <div>Breed</div>
                <label><input type='checkbox' name='breed'>Labrador</label>
                <br><label><input type='checkbox' name='breed'>Shih Tzu</label>
                <br><label><input type='checkbox' name='breed'>Terrier</label>
                <br><label><input type='checkbox' name='breed'>German Shepherd</label>
                <br><label><input type='checkbox' name='breed'>Shiba Inu</label>
            </div><br>

            Sort By:
            <div>
                <label><input type='checkbox' name='breed'>Date</label>
                <br><label><input type='checkbox' name='breed'>Breed</label>
                <br><label><input type='checkbox' name='breed'>Seller</label>
            </div><br>
            <input type='submit' value='Filter'>
        </form>
        
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.filter-space {
    width: 20%;
    max-width: 400px;
    min-height: 550px;
    height: 20%;
    border: 1px solid black;
    float: left;
}
</style>
