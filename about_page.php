<?php include_once "./top_component.php"; ?>
<center>
    <div class="about">
        <h1>COMING SOON</h1>
    </div>
</center>
<div class="area-to-dim">
<div class="dimmer"></div>


<style>
    .about h1{
        width: 440px;
        background-color: #000;
        border: 1px solid #555;
        border-radius: 7px;
        padding: 7px;
        color: #fcfcfc;
        margin: 5em;
        z-index: 100;
    }


    <style>
    .area-to-dim {
        position: relative;
    }
    .dimmer {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
        z-index: 80;
    }
</style>


<!-- <script>
    const dimEl = document.querySelector('.dimmer');
    function over() {
        dimEl.style.top = this.offsetTop + 'px';
        dimEl.style.left = this.offsetLeft + 'px';
        dimEl.style.height = this.offsetHeight + 'px';
        dimEl.style.width = this.offsetWidth + 'px';
        dimEl.style.display = 'block';
    }
    window.onload = function () {
        const elementsToDim = ['row1', 'row2', 'row3']; // IDs of elements to dim
        for (const id of elementsToDim) {
            const e = document.getElementById(id);
            if (e) {
                e.onmouseover = over;
            }
        }
    };
</script> -->

</style>
<?php include_once "./bottom_component.php"; ?>
