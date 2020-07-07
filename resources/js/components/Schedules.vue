<template>
    <div class="col-md-2">

        <div class="card text-center">
            <div class="card-header">
                사창리 >>> 동서울
            </div>
            <ul class="list-group list-group-flush ">
                <li class="list-group-item">00:00</li>
            </ul>
        </div>

        <div class="input-group mt-2">
            <input type="text" class="form-control" placeholder="형식 00:00">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">저장</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['schedules'],
        mounted() {
        },
        data() {
            return {
                
            }
        }
    }
</script>
