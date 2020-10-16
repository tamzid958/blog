<footer id="footer">
    <div class="bg-dark text-white copyright-div" id="copyright-div">
        <div class="container">
            <p class="text-center">Copyright &#169; by Tamzid Ahmed </p>
        </div>
    </div>
    <!--
    <script type="text/javascript" src="/scripts/jquery.js"></script>
    <script type="text/javascript" src="/scripts/popper.min.js"></script>
    <script type="text/javascript" src="/scripts/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/scripts/chart.bundle.js"></script>
    <script type="text/javascript" src="/scripts/fontawesome.min.js"></script>
    <script type="text/javascript" src="/scripts/hashes.min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f6a2229f290dcba"></script>
    <script type="text/javascript" src="/scripts/app.js"></script>
-->
    <script src="/scripts/jquery.js" type="text/javascript" defer></script>
    <script src="https://cdn.tiny.cloud/1/e4f32vgxciwftxmzhe11ch7ruh2i0wyw6jrb0qh5v986h2xr/tinymce/5/tinymce.min.js" referrerpolicy="origin" defer></script>
</footer>

<script type="text/javascript">
    function parseJSAtOnload() {
        var links = ["/scripts/popper.min.js", "/scripts/bootstrap.bundle.min.js", "/scripts/chart.bundle.js", "/scripts/fontawesome.min.js", "/scripts/hashes.min.js", "//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f6a2229f290dcba", "/scripts/app.js"],
            headElement = document.getElementsByTagName("head")[0],
            linkElement, i;
        for (i = 0; i < links.length; i++) {
            linkElement = document.createElement("script");
            linkElement.src = links[i];
            headElement.appendChild(linkElement);
        }
    }
    if (window.addEventListener)
        window.addEventListener("load", parseJSAtOnload, false);
    else if (window.attachEvent)
        window.attachEvent("onload", parseJSAtOnload);
    else window.onload = parseJSAtOnload;
</script>
</body>


</html>