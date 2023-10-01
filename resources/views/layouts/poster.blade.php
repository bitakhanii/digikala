<style>

    .direct-access {
        width: 293px;
        height: 220px;
        margin-left: 10px;
        box-shadow: 0 2px 5px #e3e7e3;
        border-radius: 4px;
        overflow: hidden;
        margin-top: 10px;
        float: right;
        background-color: #fff;
        cursor: pointer;
    }

    .direct-access img {
        width: 293px;
    }

    .direct-access:nth-child(3) {
        margin-left: 0;
    }

</style>

<div>

    @foreach($posters as $poster)
        <a class="direct-access" href="">
            <img src="{{ $poster->image }}">
        </a>
    @endforeach

</div>
