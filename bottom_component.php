<footer>
        <div>&copy; 2024 | e-commerce | All Rights Reserved</div>
        <div>
            <h5>Quick Links</h5>
            <a href="about_page.php">About</a>
            <a href="index.php">Home</a>
            <a href="products.php">products</a>
            <a href="#">Feedback</a>
        </div>
        <div>
            <h5>Socials</h5>
            <a href="https://x.com/Bobbiehex?s=08">Twitter</a>
            <a href="https://www.instagram.com/bobbie_hex?igsh=OGQ5ZDc2ODk2ZA==">Instagram</a>
            <a href="https://www.facebook.com/BobbiehexJnr?mibextid=ZbWKwL">Facebook</a>
            <a href="https://youtube.com/@bobbiehex?si=3KXSXCY6RpRLjhVa">Youtube</a>
        </div>
        <div>
            <h5>Contact</h5>
            <p>34 Alagbaka Road, Akure, Ondo State, Nigeria</p>
        </div>
    </footer>

    <style>
        footer{
            margin-top: 3em;
            padding: 3em;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, auto));
            gap: 2em;
            background-color: #333;
            color: #b6b6b6;
        }
        footer a{
            display: block;
            text-decoration: none;
            color: #b6b6b6;
        }
        footer a:hover{
            color: #fcfcfc;
        }
    </style>

<style>
    .slide_container{
        position: relative;
        width: 50%;
        height: 403px;
    }

    .p1, .p2{
        position: absolute;
        /* width: 455px; */
        height: 403px;
        right: 0;
        transition: .9s;
    }
    .p2{
        pointer-events: none;
        opacity: 0;
    }
    @media (max-width: 999px) {
        .slide_container{
            width: 50%;
        }
        .p1, .p2{
            width: 90%!important;
        }
    }
    @media (max-width: 830px) {
        .slide_container{
            width: 40%;
            height: auto;
        }
    }
</style>

<script>
    let p1 = document.querySelector(".p1"),
        p2 = document.querySelector(".p2");
        main_section = document.querySelector(".main_section");
        slide_monitor = 0;

    setInterval(() =>{
    slide_monitor += 1;
    console.log(slide_monitor);

    if(slide_monitor < 2){
        p1.style.pointerEvent="none";
        p1.style.opacity=0;

        p2.style.pointerEvent="fill";
        p2.style.opacity=1;

        main_section.classList.add("main_section2");

    }

    if(slide_monitor >=3){
            p2.style.pointerEvent="none";
            p2.style.opacity=0;

            p1.style.pointerEvent="fill";
            p1.style.opacity=1;

            main_section.classList.remove("main_section2");

            slide_monitor = 0;
    }
    },3000);
</script>

<script>
    // const notification = document.querySelector(".notification"),
    // dim_page = document.querySelector(".dim_page");
    // let btnClose = document.querySelector(".btnClose");

    // const closeFunction=()=>{
    //     notification.style.top="-500px";
    //     dim_page.style.pointerEvents = "none";
    //     dim_page.style.opacity = 0;
    // }

    // setTimeout(() =>{
    //     notification.style.top="5px";
    //     dim_page.style.pointerEvents = "fill";
    //     dim_page.style.opacity = .9;
    // }, 2000);

    // setTimeout(() =>{
    //     closeFunction();    
    // }, 7000);

    // btnClose.addEventListener("click", ()=>{
    //     closeFunction();    
    // });
  

</script>

</body>
</html>